<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

use AppBundle\Entity\Datalog;
use Symfony\Component\Validator\Constraints\DateTime;


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
                                SELECT sensor_id, MAX(fecha)as max_fecha
                                FROM    datalog
                                GROUP BY sensor_id
                            ) b ON a.sensor_id = b.sensor_id AND
                                    a.fecha = b.max_fecha
                    GROUP BY sensor_id ORDER BY a.sensor_id  ASC";

            $dqlSimpificada = "SELECT d FROM AppBundle:Datalog d ORDER BY d.fecha DESC ";

            $em = $this->getDoctrine()->getManager();

            $stmt = $em->getConnection()->prepare($sql);
            $stmt->execute();
            $arrayQueryResult = $stmt->fetchAll();


            //$query = $em->createQuery($dqlSimpificada);
            //$datalogArray = $query->getResult();
            $datalogArray = [];
            foreach ($arrayQueryResult as $item) {
                $dataAux = new Datalog();
                $dataAux->setSensorId($item['sensor_id']);
                $dataAux->setMedicion($item['medicion']);
                $d1 = new \DateTime($item['fecha']);
                $dataAux->setFecha($d1);
                array_push($datalogArray,$dataAux);
            }

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
     * @Route("/testing", name="testing")
     */


    public function updateDataAction(Request $request){
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
        for ($i=0 ; $i< sizeof($arrayQueryResult) ; $i++) {
            $d1 = new \DateTime($arrayQueryResult[$i]['fecha']);
            $arrayQueryResult[$i]['hora'] = $d1->format('H:i:s');
            $arrayQueryResult[$i]['fecha'] = $d1->format('d-m-Y');
        }
        $jsonString = json_encode($arrayQueryResult);

        return $this->render('datalogger/data_jquery.html.twig',
                    array ( 'jsonString' => $jsonString));
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
                            $newDate = date("m-d-Y H:i:s", strtotime($entry->fecha));
                            $fecha=new \DateTime($newDate);
                            $datalog->setFecha($fecha);

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
