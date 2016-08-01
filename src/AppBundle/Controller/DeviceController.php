<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

//use Symfony\Component\Validator\Constraints\DateTime;

use AppBundle\Entity\Ensayo;
use AppBundle\Entity\Datalog;
use Symfony\Component\Validator\Constraints\DateTime;



class DeviceController extends Controller
{
    /**
     * @Route("/checkEnsayoStart", name="checkEnsayoStart")
     */
    public function checkEnsayoStartAction(Request $request)
    {
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
            $response->setStatusCode(Response::HTTP_FORBIDDEN);
        }
        else {
            $data = json_decode($content);
            $password = "";

            foreach ($data as $name => $value) {
                if ($name == "LOGIN") {
                    foreach ($value as $entry) {
                        if (isset($entry->password)) {
                            $password = $entry->password;
                        }
                    }
                }
            }
            if ($password != passwordDevice) {          //PASSWORD ERRONEO
                $response->setStatusCode(Response::HTTP_FORBIDDEN);
                $params = "Params Empty or not json. Content type: " . $contentType;
                $response->setContent($params);
            }
            else {                    //ELSE -> PARSEO LA DATA

                $sqlCheckIfEnsayoIsRunning =   "SELECT *,TIMESTAMPDIFF(SECOND, lastPing, NOW()) as diff
                                                FROM ensayo
                                                HAVING diff = (
                                                    SELECT MIN(TIMESTAMPDIFF(SECOND, lastPing, NOW())) as diffAux
                                                    FROM ensayo
                                                    HAVING diffAux<(5*60)
                                                    AND diffAux>= 0
                                                    AND t_fin IS NULL
                                                    )";

                $em = $this->getDoctrine()->getManager();
                $stmt = $em->getConnection()->prepare($sqlCheckIfEnsayoIsRunning);
                $stmt->execute();
                $arrayQueryResult = $stmt->fetchAll();

                $timezone = new \DateTimeZone("America/Argentina/Buenos_Aires");
                $now = new \DateTime("now",$timezone);


                if ( !empty($arrayQueryResult) ) {
                    $response->setStatusCode(Response::HTTP_OK);
                    $response->setContent($now->format('H:i:s d-m-Y'));
                }
                else {
                    $response->setStatusCode(Response::HTTP_PRECONDITION_FAILED);
                    $response->setContent("Ensayo no iniciado.");
                }
            }
        }
        return $response;
    }



    /**
     * @Route("/logdata", name="logData")
     */

    public function logDataAction(Request $request)
    {
        //Respuesta
        $response = new Response(
            'Content',
            Response::HTTP_OK,
            array('content-type' => 'text/html')
        );

        $content = $request->getContent();
        $contentType = $request->getContentType();

        if ($contentType != "json" || empty($content)) {          //CONTENIDO NOT JSON
            $params = "Params Empty or not json. Content type: " . $contentType;
            $response->setContent($params);
            $response->setStatusCode(Response::HTTP_FORBIDDEN);

        } else {
            $em = $this->getDoctrine()->getManager();
            $data = json_decode($content);
            $password = "";

            foreach ($data as $name => $value) {
                if ($name == "LOGIN") {
                    foreach ($value as $entry) {
                        if (isset($entry->password)) {
                            $password = $entry->password;
                        }
                    }
                }
            }
            if ($password != passwordDevice) {          //PASSWORD ERRONEO
                $params = "Params Empty or not json. Content type: " . $contentType;
                $response->setContent($params);
                $response->setStatusCode(Response::HTTP_FORBIDDEN);
            }
            else {
                //ELSE -> checkeo si hay ensayo running
                $sqlCheckIfEnsayoIsRunning =   "SELECT *,TIMESTAMPDIFF(SECOND, lastPing, NOW()) as diff
                                                FROM ensayo
                                                HAVING diff = (
                                                    SELECT MIN(TIMESTAMPDIFF(SECOND, lastPing, NOW())) as diffAux
                                                    FROM ensayo
                                                    HAVING diffAux<(5*60)
                                                    AND diffAux>= 0
                                                    AND t_fin IS NULL
                                                    )";

                $em = $this->getDoctrine()->getManager();
                $stmt = $em->getConnection()->prepare($sqlCheckIfEnsayoIsRunning);
                $stmt->execute();
                $arrayQueryResult = $stmt->fetchAll();

                //SI HAY ENSAYO CORRIENDO
                if ( !empty($arrayQueryResult) ) {
                    $contItemsAdded = 0;
                    foreach ($data as $name => $value) {
                        if ($name == "CANALES") {
                            foreach ($value as $entry) {
                                $datalog = new Datalog();
                                $datalog->setSensorId(intval($entry->canal));
                                $datalog->setMedicion($entry->temperatura);

                                echo "$contItemsAdded)Nuevo registro";
                                echo "<br>";
                                echo "Fecha: " . $entry->fecha;
                                echo "<br>";
                                echo "Canal: " . $entry->canal;
                                echo "<br>";
                                echo "Medicion: " . $entry->temperatura;
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
                    $stringResponse = 'Recibidas ' . $contItemsAdded . ' mediciones nuevas<br/>';
                    $response->setContent($stringResponse);
                }
                else {
                    $response->setStatusCode(Response::HTTP_PRECONDITION_FAILED);
                    $response->setContent("Ensayo no iniciado.");
                }
            }
            //TODO Mejor respuesta al recibir datos. Por ej una tabla con la data recibida.
        }
        return $response;
    }
}

