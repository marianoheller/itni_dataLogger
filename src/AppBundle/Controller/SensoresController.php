<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

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
                        $lastTimeStamp = $entry->lastTimeStamp;
                        $firstTimeStamp = $entry->firstTimeStamp;   //unused -> its initial t_inicio
                        $currentTime = $entry->currentTime;     //unused
                    }
                }
            }

            $em = $this->getDoctrine()->getManager();

            //UPDATE lastPing
            $count = $em->getRepository('AppBundle:Ensayo')->updateLastPing();

            // GET DATA to send
            $arrayReturn = $em->getRepository('AppBundle:Datalog')->getPacketsData($lastTimeStamp);

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
                        $t_inicio = $entry->t_inicio;
                        $t_fin = $entry->t_fin;
                    }
                }
            }

            $em = $this->getDoctrine()->getManager();
            $logger->info("Sending data to Hist graph");

            // GET DATA to send
            $arrayReturn = $em->getRepository('AppBundle:Datalog')->getPacketsInTimeRange($t_inicio, $t_fin);

            //Ready to send
            $ret = new JsonResponse($arrayReturn);
            return $ret;
        }
    }
}

