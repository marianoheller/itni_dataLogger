<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;


class DataLoggerController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        /*if ( $request->isXmlHttpRequest() ) {
            $ret = new Response("OK");
        }
        else {
            $ret = $this->redirectToRoute('homepage');
        }
        return $ret;*/
        $listParams["param1"] = $request->query->get('param1');
        $listParams["param2"] = $request->request->get("param2",'default value if does not exist');
        return $this->render('datalogger/data.html.twig',
            array( "listParams" => $listParams));
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

        $content = $request->getContent();
        if (!empty($content)) {
            //$params = json_decode($content, true); // 2nd param to get as array
            $params = $content;
        }
        else {
            $params = "Params Empty";
        }


        //Respuesta
        $response = new Response(
            'Content',
            Response::HTTP_OK,
            array('content-type' => 'text/html')
        );
        $response->setStatusCode(Response::HTTP_OK);
        $response->setContent($params);
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
