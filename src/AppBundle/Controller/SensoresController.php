<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Validator\Constraints\DateTime;

use AppBundle\Entity\Ensayo;


class SensoresController extends Controller
{
    /**
     * @Route("/getSensoresStatus", name="getSensoresStatus")
     */
    public function getSensoresStatusAction(Request $request)
    {
        $logger = $this->get('logger');
        $em = $this->getDoctrine()->getManager();
        $arrayQueryResult = $em->getRepository('AppBundle:Datalog')->getSensoresStatusFormated();

        if ( $request->isXmlHttpRequest() ) {
            $logger->info("Sensores status getted");
            $jsonString = json_encode($arrayQueryResult);
            return new JsonResponse(
                array ( 'jsonStringAjax' => $jsonString)
            );
        }
        else {
            return $this->redirectToRoute("homepage");
        }
    }


    /**
     * @Route("/getGraphData", name="getGraphData")
     */
    public function getGraphDataAction(Request $request)
    {
        $logger = $this->get('logger');
        $contentType = $request->getContentType();
        if ( $contentType != "json" ) {
            $logger->error("Content type incorrecto.", array(
                "contentType" => $contentType
            ));
            throw $this->createAccessDeniedException('Acceso prohibido');
        }
        else {
            //First get json data
            $content = $request->getContent();
            $data = json_decode($content);

            //Get params
            $canalesVirtuales = [];
            $params=[];
            $params["lastTimeStamp"] = $data->graphData->lastTimeStamp;
            $params["firstTimeStamp"] = $data->graphData->firstTimeStamp;
            $params["curvaID"] = $data->graphData->curvaID;
            $params["cantCanalesVirtuales"] = $data->graphData->cantCanalesVirtuales;
            foreach ($data->graphData->canalesVirtuales as $key => $canalVirtual) {
                $canalesVirtuales[$canalVirtual->id] = [];
                foreach ($canalVirtual->sensores as $sensor) {
                    array_push($canalesVirtuales[$canalVirtual->id], $sensor);
                }
            }

            //Check if everything is set
            foreach ($params as $param) {
                if ( !isset($param) ) {
                    throw new NotFoundHttpException("Error al parsear json de de ajax request");
                }
            }

            $em = $this->getDoctrine()->getManager();

            //UPDATE lastPing
            $count = $em->getRepository('AppBundle:Ensayo')->updateLastPing();

            ///Data Original
            // Get datalog data to send (as packets)
            /*//Dividido en dos partes asi tengo $arrayDataFormatted y es mas facil mas adelante
            $arrayDataFormatted = $em->getRepository('AppBundle:Datalog')->getDataFormated();
            $arrayPacketsDatalog = $em->getRepository('AppBundle:Datalog')->generatePacketsFromDataFormatted($arrayDataFormatted);*/
            $arrayPacketsDatalog = $em->getRepository('AppBundle:Datalog')->getPacketsData($params["lastTimeStamp"]);

            // Append campo patron en cada packet
            $arrayPacketsDatalog_c_Patron = $em->getRepository('AppBundle:Curva')->generateCurvaPackets($params["curvaID"],$arrayPacketsDatalog, $params["firstTimeStamp"]);

            //Generate packets virtuales
            $arrayPacketsVirtuales = $em->getRepository('AppBundle:Datalog')->getCanalesVirtualesPackets($params["lastTimeStamp"],$canalesVirtuales);

            // Append campo patron en cada packet
            $arrayPacketsVirtuales_c_Patron = $em->getRepository('AppBundle:Curva')->generateCurvaPackets($params["curvaID"],$arrayPacketsVirtuales, $params["firstTimeStamp"]);

            //Junto Canales virtuales con los originales
            $arrayReturn = array_merge($arrayPacketsDatalog_c_Patron,$arrayPacketsVirtuales_c_Patron);

            //Ready to send
            $ret = new JsonResponse( $arrayReturn );
            return $ret;
        }
    }

    /**
     * @Route("/ensayo/cancel/all", name="cancelEnsayo")
     */
    public function cancelEnsayoAction()
    {
        $logger = $this->get('logger');
        $logger->info("Cancel ALL ensayos");
        $em = $this->getDoctrine()->getManager();
        $count = $em->getRepository('AppBundle:Ensayo')->finishAllEnsayos();
        return new JsonResponse( array(
            "count" => $count
        ));
    }



    /**
     * @Route("/getHistGraphData", name="getHistGraphData")
     */
    public function getHistGraphDataAction(Request $request)
    {
        $logger = $this->get('logger');
        if ( $request->getContentType() != "json" ) {
            $logger->error("Content type incorrecto. Given \"$request->getContentType()\"", array(
                "contentType" => $request->getContentType()
            ));
            throw $this->createAccessDeniedException('Acceso prohibido');
        }
        else {
            //First get json data
            $content = $request->getContent();
            $data = json_decode($content);


            //Get params
            $canalesVirtuales = [];
            $params=[];
            $params["firstTimeStamp"] = $data->graphData->firstTimeStamp;
            $params["curvaID"] = $data->graphData->curvaID;
            $params["t_inicio"] = $data->graphData->t_inicio;
            $params["t_fin"] = $data->graphData->t_fin;

            $params["cantCanalesVirtuales"] = $data->graphData->cantCanalesVirtuales;
            foreach ($data->graphData->canalesVirtuales as $key => $canalVirtual) {
                $canalesVirtuales[$canalVirtual->id] = [];
                foreach ($canalVirtual->sensores as $sensor) {
                    array_push($canalesVirtuales[$canalVirtual->id], $sensor);
                }
            }


            //Check if everything is set
            foreach ($params as $param) {
                if ( !isset($param) ) {
                    throw new NotFoundHttpException("Error al parsear json de de ajax request");
                }
            }


            $em = $this->getDoctrine()->getManager();
            $logger->info("Sending data to Hist graph");

            /*********************************************************************************************
             *  Get data
             */

            /*
             * Data original de los sensores
             */

            //GET DATA to send
            $arrayPacketsDatalog = $em->getRepository('AppBundle:Datalog')->getPacketsInTimeRange($params["t_inicio"], $params["t_fin"]);
            // Append Curva packets
            $arrayPacketsDatalog_c_Patron = $em->getRepository('AppBundle:Curva')->generateCurvaPackets($params["curvaID"],$arrayPacketsDatalog, $params["firstTimeStamp"]);

            /*
             * Data de canales virtuales
             */

            //Generate packets virtuales
            $arrayPacketsVirtuales = $em->getRepository('AppBundle:Datalog')->getCanalesVirtualesPackets($params["t_inicio"],$canalesVirtuales);
            // Append campo patron en cada packet
            $arrayPacketsVirtuales_c_Patron = $em->getRepository('AppBundle:Curva')->generateCurvaPackets($params["curvaID"],$arrayPacketsVirtuales, $params["firstTimeStamp"]);



            //Junto Canales virtuales con los originales
            $arrayReturn = array_merge($arrayPacketsDatalog_c_Patron,$arrayPacketsVirtuales_c_Patron);
            //Ready to send
            $ret = new JsonResponse( $arrayReturn );
            return $ret;
        }
    }
}

