<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

//use Symfony\Component\Validator\Constraints\DateTime;

require_once("../config.php");


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
                        $password = $entry->password;
                    }
                }
            }
            if ($password != passwordDevice) {          //PASSWORD ERRONEO
                $response->setStatusCode(Response::HTTP_FORBIDDEN);
                $params = "Params Empty or not json. Content type: " . $contentType;
                $response->setContent($params);
            } else {                    //ELSE -> PARSEO LA DATA
                $success = false;
                $flagEnsayoStart = apc_fetch(EnsayoStartAPC, $success);
                if ($success && $flagEnsayoStart) {
                    $response->setStatusCode(Response::HTTP_OK);
                    $response->setContent("Ensayo iniciado!");
                }
                else {
                    $response->setStatusCode(Response::HTTP_PRECONDITION_FAILED);
                    $response->setContent("Ensayo no iniciado...");
                }
            }
        }
        return $response;
    }
}

