<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

use AppBundle\Entity\Datalog;
use Symfony\Component\Validator\Constraints\DateTime;




class DataLoggerController extends Controller
{
    /**
     * @Route("/old_index", name="old_index")
     */
    public function indexAction(Request $request)
    {
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
        if ( $request->isXmlHttpRequest() ) {
            for ($i=0 ; $i<sizeof($datalogArray) ; $i++) {
                unset($datalogArray[$i]['id']);
            }
            $ret =  new JsonResponse(
                array ( 'datalogArray' => $datalogArray)
            );
        }
        else {
            $ret = $this->render('datalogger/data.html.twig',
                                array ( 'datalogArray' => $datalogArray));
        }
        return $ret;
    }


    /**
 * @Route("/old_homepage", name="main")
 */
    public function lastDataAction(Request $request){
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
        //Separo fecha y hora
        /*for ($i=0 ; $i< sizeof($arrayQueryResult) ; $i++) {
            $d1 = new \DateTime($arrayQueryResult[$i]['fecha']);
            $arrayQueryResult[$i]['hora'] = $d1->format('H:i:s');
            $arrayQueryResult[$i]['fecha'] = $d1->format('d-m-Y');
        }*/
        //Elimino id del array q voy a mandar
        for ($i=0 ; $i<sizeof($arrayQueryResult) ; $i++) {
            unset($arrayQueryResult[$i]['id']);
        }
        $jsonString = json_encode($arrayQueryResult);

        if ( $request->isXmlHttpRequest() ) {
            $ret =  new JsonResponse(
                array ( 'jsonStringAjax' => $jsonString)
            );
        }
        else {
            $ret = $this->render('datalogger/last_jquery.html.twig',
                array ( 'jsonString' => $jsonString));
        }
        return $ret;

    }


    /**
     * @Route("/promedio", name="promedio")
     */


    public function promedioAction(Request $request){
        $sql = "SELECT id, sensor_id, AVG(medicion)as promedio, fecha  FROM datalog GROUP BY sensor_id ORDER BY sensor_id ASC";
        $em = $this->getDoctrine()->getManager();
        $stmt = $em->getConnection()->prepare($sql);
        $stmt->execute();
        $arrayQueryResult = $stmt->fetchAll();
        //ReFormateo la fecha
        for ($i=0 ; $i< sizeof($arrayQueryResult) ; $i++) {
            $d1 = new \DateTime($arrayQueryResult[$i]['fecha']);
            $arrayQueryResult[$i]['fecha'] = $d1->format('H:i:s - d-m-Y');
        }
        //Separo fecha y hora
        /*for ($i=0 ; $i< sizeof($arrayQueryResult) ; $i++) {
            $d1 = new \DateTime($arrayQueryResult[$i]['fecha']);
            $arrayQueryResult[$i]['hora'] = $d1->format('H:i:s');
            $arrayQueryResult[$i]['fecha'] = $d1->format('d-m-Y');
        }*/
        //Elimino id del array q voy a mandar
        for ($i=0 ; $i<sizeof($arrayQueryResult) ; $i++) {
            unset($arrayQueryResult[$i]['id']);
        }
        $jsonString = json_encode($arrayQueryResult);

        if ( $request->isXmlHttpRequest() ) {
            $ret =  new JsonResponse(
                array ( 'jsonStringAjax' => $jsonString)
            );
        }
        else {
            $ret = $this->render('datalogger/prom_jquery.html.twig',
                array ( 'jsonString' => $jsonString) );
        }
        return $ret;
    }



    /**
     * @Route("/historial", name="historial")
     */


    public function histDataAction(Request $request){
        $sql = "SELECT  * FROM datalog ORDER BY sensor_id  ASC";
        $em = $this->getDoctrine()->getManager();
        $stmt = $em->getConnection()->prepare($sql);
        $stmt->execute();
        $arrayQueryResult = $stmt->fetchAll();
        //ReFormateo la fecha
        for ($i=0 ; $i< sizeof($arrayQueryResult) ; $i++) {
            $d1 = new \DateTime($arrayQueryResult[$i]['fecha']);
            $arrayQueryResult[$i]['fecha'] = $d1->format('H:i:s - d-m-Y');
        }
        //Separo fecha y hora
        /*for ($i=0 ; $i< sizeof($arrayQueryResult) ; $i++) {
            $d1 = new \DateTime($arrayQueryResult[$i]['fecha']);
            $arrayQueryResult[$i]['hora'] = $d1->format('H:i:s');
            $arrayQueryResult[$i]['fecha'] = $d1->format('d-m-Y');
        }*/
        //Elimino id del array q voy a mandar
        for ($i=0 ; $i<sizeof($arrayQueryResult) ; $i++) {
            unset($arrayQueryResult[$i]['id']);
        }
        $jsonString = json_encode($arrayQueryResult);

        if ( $request->isXmlHttpRequest() ) {
            $ret =  new JsonResponse(
                array ( 'jsonStringAjax' => $jsonString)
            );
        }
        else {
            $ret = $this->render('datalogger/hist_jquery.html.twig',
                array ( 'jsonString' => $jsonString));
        }
        return $ret;

    }

    /**
     * @Route("/hist_update", name="historial_update")
     */


    public function histUpdateDataAction(Request $request){
        $ret = new Response("Error en controlador");



        if ( !$request->isXmlHttpRequest() ) {
            throw $this->createNotFoundException(
                'No data found');
        }
        else {
            //First get json data
            $content = $request->getContent();
            $data = json_decode($content);
            var_dump($data);

            /*foreach ($data as $name => $value) {
                if ( $name == "data") {
                    foreach ($value as $entry) {
                        $datalog = new Datalog();
                        $datalog->setSensorId(intval($entry->canal));
                        $datalog->setMedicion($entry->temperatura);


                        $fecha = new \DateTime();
                        $fecha = $fecha->createFromFormat('d/m/Y H:i:s', $entry->fecha);
                        $datalog->setFecha($fecha);

                        $contItemsAdded++;
                        $em->persist($datalog);
                        $em->flush();
                    }
                }
            }*/


            //==================================================================
            $jsonTest = [];
            $jsonTest["draw"]=1;
            $jsonTest["recordsTotal"]=5;
            $jsonTest["recordsFiltered"]=3;
            $data = [];
            for( $i=0 ; $i<3 ;$i++) {
                $item = [];
                $item["fecha"]="15/06/2016 11:37:48";
                $item["temperatura"]="3.23";
                $item["canal"]="2";
                array_push($data,$item);
            }
            $jsonTest["data"]=$data;
            $ret = new JsonResponse();
            $ret->setData($jsonTest);



            //Now do the queries
            /*$sql = "SELECT  * FROM datalog ORDER BY sensor_id  ASC";
            $sqlTotalRegistros = "SELECT  COUNT(*) FROM datalog";
            $em = $this->getDoctrine()->getManager();
            $stmt = $em->getConnection()->prepare($sql);
            $stmt->execute();
            $arrayQueryResult = $stmt->fetchAll();
            //ReFormateo la fecha
            for ($i=0 ; $i< sizeof($arrayQueryResult) ; $i++) {
                $d1 = new \DateTime($arrayQueryResult[$i]['fecha']);
                $arrayQueryResult[$i]['fecha'] = $d1->format('H:i:s - d-m-Y');
            }
            //Elimino id del array q voy a mandar
            for ($i=0 ; $i<sizeof($arrayQueryResult) ; $i++) {
                unset($arrayQueryResult[$i]['id']);
            }
            $jsonString = json_encode($arrayQueryResult);

            $ret =  new JsonResponse(
                array ( 'jsonStringAjax' => $jsonString)
            );*/
        }
        return $ret;
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
            $password = "";

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

                            echo "$contItemsAdded)Nuevo registro";
                            echo "<br>";
                            echo "Fecha: ".$entry->fecha;
                            echo "<br>";
                            echo "Canal: ".$entry->canal;
                            echo "<br>";
                            echo "Medicion: ".$entry->temperatura;
                            echo "<br>";
                            echo "==================================================";
                            echo "<br>";

                            $fecha = new \DateTime();
                            $fecha = $fecha->createFromFormat('d/m/Y H:i:s', $entry->fecha);
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
