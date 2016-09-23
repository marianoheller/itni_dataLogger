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

            foreach ($data as $name => $value) {
                if ($name == "graphData") {
                    foreach ($value as $entry) {
                        $lastTimeStamp = $entry->lastTimeStamp;
                        $firstTimeStamp = $entry->firstTimeStamp;
                        $curvaID = $entry->curvaID;
                    }
                }
            }
            if ( !isset($curvaID) || !isset($lastTimeStamp) ||!isset($firstTimeStamp)) {
                throw new NotFoundHttpException("Error al parsear json de de ajax request");
            }

            $em = $this->getDoctrine()->getManager();

            //UPDATE lastPing
            $count = $em->getRepository('AppBundle:Ensayo')->updateLastPing();

            // GET datalog data to send (as packets)
            $arrayPacketsDatalog = $em->getRepository('AppBundle:Datalog')->getPacketsData($lastTimeStamp);

            // Append Curva packets
            $arrayReturn = $em->getRepository('AppBundle:Curva')->generateCurvaPackets($curvaID,$arrayPacketsDatalog, $firstTimeStamp);


            //Ready to send
            $ret = new JsonResponse($arrayReturn);
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

            foreach ($data as $name => $value) {
                if ($name == "timeStamp") {
                    foreach ($value as $entry) {
                        $curvaID = $entry->curvaID;
                        $t_inicio = $entry->t_inicio;
                        $t_fin = $entry->t_fin;
                        $firstTimeStamp = $entry->firstTimeStamp;
                    }
                }
            }

            if ( !isset($curvaID) || !isset($t_inicio) ||!isset($t_fin) ||!isset($firstTimeStamp)) {
                throw new NotFoundHttpException("Error al parsear json de de ajax request");
            }

            $em = $this->getDoctrine()->getManager();
            $logger->info("Sending data to Hist graph");

            // GET DATA to send
            $arrayPacketsDatalog = $em->getRepository('AppBundle:Datalog')->getPacketsInTimeRange($t_inicio, $t_fin);

            // Append Curva packets
            $arrayReturn = $em->getRepository('AppBundle:Curva')->generateCurvaPackets($curvaID,$arrayPacketsDatalog, $firstTimeStamp);

            //Ready to send
            $ret = new JsonResponse($arrayReturn);
            return $ret;
        }
    }
}

