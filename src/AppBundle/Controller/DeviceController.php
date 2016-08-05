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
        $response = new Response();

        $content = $request->getContent();
        $contentType = $request->getContentType();

        if ( $contentType != "json" || empty($content) ) {          //CONTENIDO NOT JSON
            $response->setContent("Params Empty or not json. Content type: ".$contentType);
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
                $response->setContent("Params Empty or not json. Content type: " . $contentType);
            }
            else {                    //ELSE -> PARSEO LA DATA

                $em = $this->getDoctrine()->getManager();
                $isEnsayoRunning = $em->getRepository('AppBundle:Ensayo')->isEnsayoRunning();

                if ( $isEnsayoRunning ) {

                    $timezone = new \DateTimeZone("America/Argentina/Buenos_Aires");
                    $now = new \DateTime("now",$timezone);

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
                $em = $this->getDoctrine()->getManager();
                $isEnsayoRunning = $em->getRepository('AppBundle:Ensayo')->isEnsayoRunning();

                //SI HAY ENSAYO CORRIENDO
                $stringResponse = "";
                if ( $isEnsayoRunning ) {
                    $contItemsAdded = 0;
                    foreach ($data as $name => $value) {
                        if ($name == "CANALES") {
                            $stringResponse .= "<table border='1' style='text-align: center;'>";
                            $stringResponse .= "<thead>";
                            $stringResponse .= "<tr>";
                            $stringResponse .= "<th>";
                            $stringResponse .= "Fecha";
                            $stringResponse .= "</th>";
                            $stringResponse .= "<th>";
                            $stringResponse .= "Canal";
                            $stringResponse .= "</th>";
                            $stringResponse .= "<th>";
                            $stringResponse .= "Medicion";
                            $stringResponse .= "</th>";
                            $stringResponse .= "</tr>";
                            $stringResponse .= "</thead>";
                            $stringResponse .= "<tbody>";
                            foreach ($value as $entry) {
                                $datalog = new Datalog();
                                $datalog->setSensorId(intval($entry->canal));
                                $datalog->setMedicion($entry->temperatura);

                                $stringResponse .= "<tr>";
                                $stringResponse .= "<td>";
                                $stringResponse .=  $entry->fecha;
                                $stringResponse .= "</td>";
                                $stringResponse .= "<td>";
                                $stringResponse .= $entry->canal;
                                $stringResponse .= "</td>";
                                $stringResponse .= "<td>";
                                $stringResponse .= $entry->temperatura;
                                $stringResponse .= "</td>";
                                $stringResponse .= "</tr>";

                                $fecha = new \DateTime();
                                $fecha = $fecha->createFromFormat('d/m/Y H:i:s', $entry->fecha);
                                $datalog->setFecha($fecha);

                                $contItemsAdded++;
                                $em->persist($datalog);
                                $em->flush();
                            }
                        }
                    }
                    $stringResponse .= "</tbody>";
                    $stringResponse .= "</table>";
                    $stringResponse .= "<p>";
                    $stringResponse .= 'Recibidas ' . $contItemsAdded . ' mediciones nuevas.';
                    $stringResponse .= "</p>";
                    $response->setContent($stringResponse);
                }
                else {
                    $response->setStatusCode(Response::HTTP_PRECONDITION_FAILED);
                    $response->setContent("Ensayo no iniciado.");
                }
            }
        }
        return $response;
    }
}

