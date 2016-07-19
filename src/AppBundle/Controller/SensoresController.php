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

    /*
     * TODO agregar boton de ensayo andando y cancelar ensayo
    */

    /**
     * @Route("/getGraphData", name="getGraphData")
     */
    public function getGraphDataAction(Request $request)
    {
        $session = new Session();
        if ( $session->get("username") ) {
            if ( $request->getContentType() != "json" ) {
                throw $this->createAccessDeniedException('Acceso prohibido');
                //return new JsonResponse( array( "Content type sent" => $request->getContentType()));
            }
            else {
                //First get json data
                $content = $request->getContent();
                $data = json_decode($content);

                foreach ($data as $name => $value) {
                    if ($name == "timeStamp") {
                        foreach ($value as $entry) {
                            $lastTimeStamp = $entry->lastTimeStamp;
                            $firstTimeStamp = $entry->firstTimeStamp;   //unused -> sends initial t_inicio
                            $currentTime = $entry->currentTime;     //unused
                        }
                    }
                }
                /*
                 * TODO actualizar lastPing on ajax call
                 */
                //UPDATE lastPing
                $lastPingObj = new \DateTime("now",new \DateTimeZone("America/Argentina/Buenos_Aires"));
                $lastPingString = $lastPingObj->format("Y-m-d H:i:s");
                $qlUpdateLastPing = "UPDATE ensayo a
                                    JOIN (
                                        SELECT *,TIMESTAMPDIFF(SECOND, lastPing, NOW()) as diff
                                        FROM ensayo
                                        HAVING diff = (
                                            SELECT MIN(TIMESTAMPDIFF(SECOND, lastPing, NOW())) as diffAux
                                            FROM ensayo
                                            HAVING diffAux<(5*60)
                                            AND diffAux>= 0
                                            AND t_fin IS NULL
                                            )
                                    ) b
                                    ON a.id = b.id
                                    SET a.lastPing = '$lastPingString'";
                $em = $this->getDoctrine()->getManager();
                $count = $em->getConnection()->executeUpdate($qlUpdateLastPing);


                // GET DATA
                $lastFecha = new \DateTime();
                $lastFecha = $lastFecha->createFromFormat('Y-m-d H:i:s', $lastTimeStamp);
                $lastFechaString = $lastFecha->format('Y/m/d H:i:s');
                $sqlGetDataFromTimestamp = "SELECT * FROM datalog WHERE fecha>'$lastFechaString' ORDER BY fecha DESC, sensor_id ASC";
                $em = $this->getDoctrine()->getManager();
                $stmt = $em->getConnection()->prepare($sqlGetDataFromTimestamp);
                $stmt->execute();
                $arrayQueryResult = $stmt->fetchAll();
                for ($i=0 ; $i< sizeof($arrayQueryResult) ; $i++) {
                    $d1 = new \DateTime($arrayQueryResult[$i]['fecha'],new \DateTimeZone("America/Argentina/Buenos_Aires"));
                    //$arrayQueryResult[$i]['fecha'] = $d1->format('H:i:s - d-m-Y');        //Comment to disable reformateo de fecha
                    $arrayQueryResult[$i]['fecha'] = $d1->getTimestamp();        //Comment to disable reformateo de fecha
                }

                // Parse to packets per channel
                usort($arrayQueryResult, function ($i, $j) {
                    $a = ($i['sensor_id']);
                    $b = ($j['sensor_id']);
                    if ($a == $b) {
                        return 0;
                    }
                    return ($a < $b) ? -1 : 1;
                });

                $arrayReturn = [];
                $arrayPerChannel = [];
                foreach ($arrayQueryResult as $item) {
                    $arrayPerChannel[$item["sensor_id"]] = [];
                }
                foreach ($arrayQueryResult as $item) {
                    $arrayAux = [];
                    foreach ($item as $key => $value) {
                        if ( $key == "fecha")
                            $arrayAux["timestamp"] = $value;
                        elseif ( $key == "medicion" )
                            $arrayAux["payloadString"] = $value;
                    }
                    array_push($arrayPerChannel[$item["sensor_id"]],$arrayAux);
                }
                foreach ($arrayPerChannel as $keyAux => $itemsPerChannel) {
                    $arrayReturn["packets_".$keyAux] = $itemsPerChannel;
                }


                //Ready to send
                $ret = new JsonResponse($arrayReturn);
                return $ret;
            }
        }
        else
            return $this->redirectToRoute("login");
    }

    /**
     * @Route("/ensayo/cancel/all", name="cancelEnsayo")
     */
    public function cancelEnsayoAction(Request $request)
    {
        $session = new Session();
        if ( $session->get("username") ) {
            $sqlCancelEnsayos = "UPDATE ensayo
                                SET t_fin = lastPing";
            $em = $this->getDoctrine()->getManager();
            $count = $em->getConnection()->executeUpdate($sqlCancelEnsayos);
            return new JsonResponse( array(
                "count" => $count
            ));
        }
        else
            return $this->redirectToRoute("login");
    }

}

