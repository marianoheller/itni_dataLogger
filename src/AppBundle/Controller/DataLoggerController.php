<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

use AppBundle\Entity\Datalog;


const numeroDeCanales = 32;
const passwordDevice = "INTI1957";

class DataLoggerController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        if ( $request->isXmlHttpRequest() ) {
            $ret = new Response("Ajax request");
        }
        else {
            $sql = "SELECT  a.*
                    FROM    datalog a
                            INNER JOIN
                            (
                                SELECT sensor_id, MAX(hora) max_date
                                FROM    datalog
                                GROUP BY sensor_id
                            ) b ON a.sensor_id = b.sensor_id AND
                    a.hora = b.max_date
                    ORDER BY sensor_id ASC";


            $dql = "SELECT a, b
                    FROM AppBundle:Datalog a
                    JOIN
                    (
                        SELECT b.sensorId, MAX(hora) max_date
                        FROM AppBundle:Datalog b
                        GROUP BY b.sensorId
                    ) b ON a.sensorId = b=sensorId AND
                    a.hora = b.max_date
                    ORDER BY d.sensorId ASC";

            $dqlSimpificada = "SELECT d FROM AppBundle:Datalog d ORDER BY d.hora DESC";

            $em = $this->getDoctrine()->getManager();

/*            $subquery = $em->createQueryBuilder()
                ->select('b.sensorId', 'MAX(b.hora) as max_date')
                ->from('AppBundle:Datalog', 'b')
                ->groupBy('b.sensorId')
                ->getDQL();
            $qb = $em->createQueryBuilder();
            $qb->select('a')
                ->from('AppBundle:Datalog', 'a')
                ->where($qb->expr()->notIn('a.id', $subquery));*/


            $query = $em->createQuery($dqlSimpificada);
            $datalogArray = $query->getResult();

            if (empty($datalogArray)) {
                throw $this->createNotFoundException(
                    'No data found'
                );
            }
            $ret = $this->render('datalogger/data.html.twig',
                                array ( 'datalogArray' => $datalogArray));
        }
        return $ret;
    }

    /**
     * @Route("/update", name="update")
     */


    public function updateDataAction(Request $request){
        $param1 = $request->query->get('param1');
        $param2 = $request->query->get('param2');


        $response = new JsonResponse();
        $response->setData(array(
            'param1' => $param1,
            'param2' => $param2
        ));
        return $response;
    }

    /**
     * @Route("/logdata", name="logData")
     */

    public function logDataAction(Request $request) {
        //Respuesta
        $response = new Response(
            'Content',
            Response::HTTP_OK,
            array('content-type' => 'text/html')
        );

        $content = $request->getContent();
        $contentType = $request->getContentType();

        if ( $contentType != "json" || empty($content) ) {          //CONTENIDO NOT JSON
            $params = "Params Empty or not json. Content type: ".$contentType;
            $response->setContent($params);

        }
        else {
            $em = $this->getDoctrine()->getManager();
            $data = json_decode($content);

            foreach ($data as $name => $value) {
                if ( $name == "LOGIN") {
                    foreach ($value as $entry) {
                        $password = $entry->password;
                    }
                }
            }
            if ($password != passwordDevice) {          //PASSWORD ERRONEO
                $params = "Params Empty or not json. Content type: ".$contentType;
                $response->setContent($params);
            }
            else {                                        //ELSE -> PARSEO LA DATA
                $contItemsAdded = 0;
                foreach ($data as $name => $value) {
                    if ( $name == "CANALES") {
                        foreach ($value as $entry) {
                            $datalog = new Datalog();
                            $datalog->setSensorId(intval($entry->canal));
                            $datalog->setMedicion($entry->temperatura);
                            $newDate = date("m-d-Y", strtotime($entry->fecha));
                            $fecha=new \DateTime($newDate);
                            $datalog->setFecha($fecha);
                            $hora=new \DateTime($entry->hora);
                            $datalog->setHora($hora);

                            $contItemsAdded++;
                            $em->persist($datalog);
                            $em->flush();
                        }
                    }
                }
                $stringResponse = 'Recibidas '.$contItemsAdded.' mediciones nuevas<br/>';
                $response->setContent($stringResponse);
            }

            //TODO Mejor respuesta al recibir datos. Por ej una tabla con la data recibida.

/*
            $datalog = new Datalog();
            $datalog->setSensorId(intval($paramsArray['canal']));
            $datalog->setMedicion($paramsArray['temperatura']);
            $newDate = date("m-d-Y", strtotime($paramsArray['fecha']));
            $fecha=new \DateTime($newDate);
            $datalog->setFecha($fecha);
            $hora=new \DateTime($paramsArray['hora']);
            $datalog->setHora($hora);

            $em->persist($datalog);
            $em->flush();
            $response->setContent('Saved new data with id '.$datalog->getId()); */
        }

        return $response;
    }
}




/*$listParams = [];
if ( $request->isXmlHttpRequest() ) {
    //$listParams["param1"] = $request->request->get("param1",'default value if does not exist');
    $listParams["param1"] = $request->query->get('param1');
    $listParams["param2"] = $request->request->get("param2",'default value if does not exist');
    return $this->render('datalogger/data.html.twig',
        array( "listParams" => $listParams));
}
return $this->render('datalogger/data.html.twig');*/
