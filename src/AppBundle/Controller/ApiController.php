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
use AppBundle\Entity\User;
use AppBundle\Entity\Datalog;
use Symfony\Component\Validator\Constraints\DateTime;
use JWT;


class ApiController extends Controller
{
    /**
     * @Route("/api/token", name="api_token")
     */
    public function tokenAction(Request $request) {
        $username = $request->request->get("_username");
        $password = $request->request->get("_password");
        if ( !isset($username) || !isset($password) ) {
            throw $this->createAccessDeniedException("Acceso denegado");
        }
        $em = $this->getDoctrine()->getManager();
        /**@var $userObj User*/
        $userObj = $em->getRepository('AppBundle:User')->findOneByUsername($username);
        if ( !isset($userObj)) {
            throw $this->createAccessDeniedException("Acceso denegado");
        }
        $encoder = $this->container->get('security.password_encoder');

        if ( !$encoder->isPasswordValid($userObj,$password) ) {
            throw $this->createAccessDeniedException("Acceso denegado");
        }
        $token = array(
            "sub" => "$username",
            "aud" => "device"
        );
        $jwt = JWT::encode($token, User::JWT_SECRET_KEY);
        return new JsonResponse(array (
            "token" => $jwt));
    }




    /**
     * @Route("/api/checkEnsayoStart", name="api_checkEnsayoStart")
     */
    public function checkEnsayoStartAction(Request $request)
    {
        $response = new JsonResponse();
        $logger = $this->get('logger');

        $content = $request->getContent();
        $contentType = $request->getContentType();

        if ( $contentType != "json" || empty($content) ) {          //CONTENIDO NOT JSON
            $stringError = "Wrong content type request or empty content. Given \"$contentType\".";
            $logger->error($stringError, array (
                "contentType" => $contentType,
                "content" => $content
            ));

            $response->setData( array(
                "status" => $stringError
            ));
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
                $stringError = "Password device incorrecto. Checkear estructura de $contentType";
                $logger->error($stringError, array (
                    "contentType" => $contentType,
                    "content" => $content
                ));
                $response->setStatusCode(Response::HTTP_FORBIDDEN);
                $response->setData( array(
                    "status" => $stringError
                ));
            }
            else {                    //ELSE -> PARSEO LA DATA

                $em = $this->getDoctrine()->getManager();
                $isEnsayoRunning = $em->getRepository('AppBundle:Ensayo')->isEnsayoRunning();

                if ( $isEnsayoRunning ) {
                    $timezone = new \DateTimeZone("America/Argentina/Buenos_Aires");
                    $now = new \DateTime("now",$timezone);

                    $logger->info("Dispositivo informado de ensayo iniciado.", array (
                        "fechaActualAnswered" =>  $now->format('H:i:s d-m-Y')
                    ));
                    $response->setStatusCode(Response::HTTP_OK);
                    $response->setData(array (
                        "status" => "OK",
                        "now" => $now->format('H:i:s d-m-Y')
                    ));
                }
                else {
                    $response->setStatusCode(Response::HTTP_PRECONDITION_FAILED);
                    $response->setData( array(
                        "status" => "Ensayo no iniciado"
                    ));
                }
            }
        }
        return $response;
    }



    /**
     * @Route("/api/logdata", name="api_logData")
     */

    public function logDataAction(Request $request)
    {
        $logger = $this->get('logger');
        //Respuesta
        $response = new JsonResponse();

        $content = $request->getContent();
        $contentType = $request->getContentType();

        if ($contentType != "json" || empty($content)) {          //CONTENIDO NOT JSON
            $stringError = "Wrong content type request or empty content. Given \"$contentType\".";
            $response->setData( array(
                "status" => $stringError,
                "contentType" => $contentType,
                "content" => $content
            ));
            $response->setStatusCode(Response::HTTP_FORBIDDEN);
            $logger->error($stringError, array (
                "contentType" => $contentType,
                "content" => $content
            ));

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
                $stringError = "Password device incorrecto. Checkear estructura de $contentType";
                $response->setData( array(
                    "status" => $stringError,
                    "contentType" => $contentType,
                    "content" => $content
                ));
                $response->setStatusCode(Response::HTTP_FORBIDDEN);
                $logger->error($stringError, array (
                    "contentType" => $contentType,
                    "content" => $content
                ));
            }
            else {
                //ELSE -> checkeo si hay ensayo running
                $em = $this->getDoctrine()->getManager();
                $isEnsayoRunning = $em->getRepository('AppBundle:Ensayo')->isEnsayoRunning();

                //SI HAY ENSAYO CORRIENDO
                $stringResponse = "";
                $arrayResponse = array();
                if ( $isEnsayoRunning ) {
                    $contItemsAdded = 0;
                    foreach ($data as $name => $value) {
                        if ($name == "CANALES") {
                            foreach ($value as $entry) {

                                $datalog = new Datalog();
                                $datalog->setSensorId(intval($entry->canal));
                                $datalog->setMedicion($entry->temperatura);

                                $arrayAuxResponse = array (
                                  "fecha" =>  $entry->fecha,
                                  "canal" => $entry->canal,
                                  "temperatura" => $entry->temperatura
                                );
                                array_push($arrayResponse,$arrayAuxResponse);

                                $fecha = new \DateTime();
                                $fecha = $fecha->createFromFormat('d/m/Y H:i:s', $entry->fecha);
                                $date_errors = \DateTime::getLastErrors();
                                if ($date_errors['warning_count'] + $date_errors['error_count'] > 0) {
                                    $responseError =  new JsonResponse( array(
                                        "status" => 'Fecha invalida',
                                        "stringCausante" => $entry->fecha
                                    ));
                                    $responseError->setStatusCode(Response::HTTP_CONFLICT);
                                }
                                $datalog->setFecha($fecha);

                                $contItemsAdded++;
                                try {
                                    $em->persist($datalog);
                                    $em->flush();
                                } catch(\Exception $e) {
                                    $logger->critical("No se pudo hacer persist de la data recibida", array (
                                        "Exception" => $e
                                    ));
                                    return $this->createNotFoundException($e->getMessage());
                                }
                            }
                        }
                    }
                    $arrayResponse["status"] = 'Recibidas ' . $contItemsAdded . ' mediciones nuevas.';

                    $response->setData($arrayResponse);
                    $logger->info("Recibidas $contItemsAdded mediciones nuevas", array (
                        "cantMedicionesRecibidas" => $contItemsAdded
                    ));
                }
                else {
                    $response->setStatusCode(Response::HTTP_PRECONDITION_FAILED);
                    $response->setData( array(
                        "status" => "Ensayo no iniciado."
                    ));
                    $logger->info("Dispositivo tratando de loguear data. Ensayo no iniciado");
                }
            }
        }
        return $response;
    }
}

