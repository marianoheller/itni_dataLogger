<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

use AppBundle\Entity\Datalog;


const numeroDeCanales = 32;

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
            $sql = "select * from (
                        select * from (
                            select * from datalog order by hora desc
                            )horaOrdered order by fecha desc
                        ) fechaOrdered
                    group by sensor_id";
            $dql = "SELECT d FROM (
                      SELECT y FROM (
                        SELECT x FROM datalog x ORDER BY x.hora
                      )y  ORDER BY y.fecha DESC
                    ) d GROUP BY d.sensor_id";
            $em = $this->getDoctrine()->getManager();
            $query = $em->createQuery($dql);
            $datalogArray = $query->getResult();

            if (!empty($datalogArray)) {
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
        if (!empty($content)) {
            $paramsArray = json_decode($content, true);
            $params = $content;

            $datalog = new Datalog();
            $datalog->setSensorId(intval($paramsArray['sensor_id']));
            $datalog->setMedicion($paramsArray['medicion']);
            $newDate = date("m-d-Y", strtotime($paramsArray['fecha']));
            $fecha=new \DateTime($newDate);
            $datalog->setFecha($fecha);
            $hora=new \DateTime($paramsArray['hora']);
            $datalog->setHora($hora);

            $em = $this->getDoctrine()->getManager();
            $em->persist($datalog);
            $em->flush();
            $response->setContent('Saved new product with id '.$datalog->getId());
        }
        else {
            $params = "Params Empty";
            $response->setContent($params);
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
