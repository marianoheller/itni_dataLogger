<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

//use Symfony\Component\Validator\Constraints\DateTime;


class SensoresController extends Controller
{
    /**
     * @Route("/getSensoresStatus", name="getSensoresStatus")
     */
    public function getSensoresStatusAction(Request $request)
    {
        $ret = new Response("Error...");
        $session = new Session();
        if ( $session->get("username") ) {
            $sql = "SELECT  a.*
                    FROM    datalog a
                            INNER JOIN
                            (
                                SELECT sensor_id, MAX(fecha)as max_fecha
                                FROM    datalog
                                GROUP BY sensor_id
                            ) b ON a.sensor_id = b.sensor_id AND
                                    a.fecha = b.max_fecha
                    GROUP BY sensor_id ORDER BY a.sensor_id  ASC";
            $em = $this->getDoctrine()->getManager();
            $stmt = $em->getConnection()->prepare($sql);
            $stmt->execute();
            $arrayQueryResult = $stmt->fetchAll();
            //ReFormateo la fecha
            for ($i=0 ; $i< sizeof($arrayQueryResult) ; $i++) {
                $d1 = new \DateTime($arrayQueryResult[$i]['fecha']);
                $arrayQueryResult[$i]['fecha'] = $d1->format('H:i:s - d-m-Y');
            }
            //Elimino id (id de la base de datos, NO DEL SENSOR) del array q voy a mandar
            for ($i=0 ; $i<sizeof($arrayQueryResult) ; $i++) {
                unset($arrayQueryResult[$i]['id']);
            }
            $jsonString = json_encode($arrayQueryResult);


            if ( $request->isXmlHttpRequest() ) {
                return new JsonResponse(
                    array ( 'jsonStringAjax' => $jsonString)
                );
            }
            else {
                return $this->redirectToRoute("homepage");
            }
        }
        else
            return $this->redirectToRoute("login");
    }


    /**
     * @Route("/getGraphData", name="getGraphData")
     */
    public function getGraphDataAction(Request $request)
    {
        $session = new Session();
        if ( $session->get("username") ) {
            if ( !$request->isXmlHttpRequest() ) {
                echo "asdad";
                throw $this->createAccessDeniedException(
                    'Acceso prohibido');
            }
            else {
                //First get json data
                $content = $request->getContent();
                $data = json_decode($content);

                foreach ($data as $name => $value) {
                    if ($name == "timeStamp") {
                        foreach ($value as $entry) {
                            $lastTimeStamp = $entry->lastTimeStamp;
                            $firstTimeStamp = $entry->firstTimeStamp;
                            $currentTime = $entry->currentTime;
                        }
                    }
                }

                $sqlGetDataFromTimestamp = "SELECT * FROM datalog WHERE fecha>'$lastTimeStamp' ORDER BY fecha DESC ";
                $em = $this->getDoctrine()->getManager();
                $stmt = $em->getConnection()->prepare($sqlGetDataFromTimestamp);
                $stmt->execute();
                $arrayQueryResult = $stmt->fetchAll();
                for ($i=0 ; $i< sizeof($arrayQueryResult) ; $i++) {
                    $d1 = new \DateTime($arrayQueryResult[$i]['fecha']);
                    $arrayQueryResult[$i]['fecha'] = $d1->format('H:i:s - d-m-Y');
                }

                $ret = new JsonResponse();
                return $ret;
            }
        }
        else
            return $this->redirectToRoute("login");
    }

}

