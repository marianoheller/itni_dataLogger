<?php

namespace AppBundle\Controller;

use AppBundle\AppBundle;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\StreamedResponse;

use Symfony\Component\Validator\Constraints\DateTime;

use AppBundle\Entity\Ensayo;
use AppBundle\Entity\Datalog;
use AppBundle\Entity\Curva;


class PagesController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function homepageAction(Request $request)
    {
        $logger = $this->get('logger');
        $logger->debug("/ accesed");
        //Check if ensayo is running
        $em = $this->getDoctrine()->getManager();
        $isEnsayoRunning = $em->getRepository('AppBundle:Ensayo')->isEnsayoRunning();
        return $this->render("pages/homepage/homepage.html.twig", array (
            'isEnsayoRunning' =>  $isEnsayoRunning
        ));
    }


    /**
     * @Route("/sensores", name="sensores")
     */
    public function sensoresAction()
    {
        $logger = $this->get('logger');
        $logger->debug("/sensores accesed");
        //Check if ensayo is running
        $em = $this->getDoctrine()->getManager();
        $isEnsayoRunning = $em->getRepository('AppBundle:Ensayo')->isEnsayoRunning();
        return $this->render("pages/sensores/sensores.html.twig", array (
            'isEnsayoRunning' =>  $isEnsayoRunning
        ));
    }

    /**
     * @Route("/ensayo", name="ensayo")
     */
    public function ensayoAction()
    {
        $logger = $this->get('logger');
        $logger->debug("/ensayo accesed");
        //Check if ensayo is running
        $em = $this->getDoctrine()->getManager();
        $isEnsayoRunning = $em->getRepository('AppBundle:Ensayo')->isEnsayoRunning();
        $arrayQueryResult = $em->getRepository('AppBundle:Ensayo')->getEnsayoActual();
        $listadoCurvas = $em->getRepository('AppBundle:Curva')->getListadoCurvas();


        return $this->render("pages/ensayo/ensayo_config.html.twig", array (
            "flagEnsayoRunning" => $isEnsayoRunning,
            "arrayQueryResult" => $arrayQueryResult,
            "listadoCurvas" => $listadoCurvas
        ));
    }

    /**
     * @Route("/ensayo/{slug}", name="ensayoRun", defaults={"slug" = 1} )
     */
    public function ensayoNowAction(Request $request, $slug)
    {
        $logger = $this->get('logger');
        $logger->debug("/ensayo/$slug accesed");

        if ($slug == 2) {  //ENSAYO RESUMIDO
            //if there is POST data
            if ( $request->request->count() != 0) {
                $em = $this->getDoctrine()->getManager();
                $isEnsayoRunning = $em->getRepository('AppBundle:Ensayo')->isEnsayoRunning();
                $arrayQueryResult = $em->getRepository('AppBundle:Ensayo')->getEnsayoActual();

                //if NO hay ensayo andando
                if ( !$isEnsayoRunning) {
                    $logger->info("No hay ensayo andando" , array (
                        "isEnsayoRunning" => $isEnsayoRunning
                    ));
                    return $this->redirectToRoute("ensayo");
                }
                //else ALL GOOD
                else {

                    $em = $this->getDoctrine()->getManager();
                    /** @var Curva $curvaObj */
                    $curvaObj = $em->getRepository('AppBundle:Curva')->getCurvaWithID($arrayQueryResult[0]["curva_id"]);

                    $logger->info("Ensayo resumido", array (
                        "lastPing" => $arrayQueryResult[0]["lastPing"],
                        "t_inicio" => $arrayQueryResult[0]["t_inicio"],
                        "curvaObj" => $curvaObj
                    ));
                    return $this->render("pages/ensayo/ensayo.html.twig", array (
                        "lastPing" => $arrayQueryResult[0]["lastPing"],
                        "t_inicio" => $arrayQueryResult[0]["t_inicio"],
                        "curvaObj" => $curvaObj
                    ));
                }
            }
            //else probablemente se tipeo la url directamente
            else {
                $logger->info("\$_POST empty. Redirecting to ensayo.");
                return $this->redirectToRoute("ensayo");
            }
        }
        else if ( $slug == 1 ) { //ENSAYO NUEVO
            //if there is NO POST data -> redirect (tipeado  a mano)
            if ( $request->request->count() == 0 ) {
                $logger->info("\$_POST empty. Redirecting to ensayo.");
                //return $this->redirectToRoute("ensayo");
                return $this->createNotFoundException("Acceda correctamente al recurso.");
            }
            //Generate Ensayo for database % flush
            $ensayoObj = new Ensayo();
            $ensayoObj->setTitulo($request->request->get("Titulo"));
            $ensayoObj->setResponsable($request->request->get("Responsable"));
            $ensayoObj->setCliente($request->request->get("Cliente"));
            $ensayoObj->setOT($request->request->get("OT"));
            $ensayoObj->setSOT($request->request->get("SOT"));
            $ensayoObj->setDescripcion($request->request->get("Descripcion"));
            //$ensayoObj->setCurvaId(intval($request->request->get("curvaPatron")));
            $timezone = new \DateTimeZone("America/Argentina/Buenos_Aires");
            $dateTimeInicio = new \DateTime("now",$timezone);
            //echo $dateTimeInicio->format('Y-m-d H:i:s');  //Time debug
            $ensayoObj->setTInicio($dateTimeInicio);
            $ensayoObj->setTFin();
            $ensayoObj->setLastPing($dateTimeInicio);


            $em = $this->getDoctrine()->getManager();
            $curvaObj = $em->getRepository('AppBundle:Curva')->getCurvaWithID($request->request->get("curvaPatron"));
            $ensayoObj->setCurvaId($curvaObj);

            try {
                $em = $this->getDoctrine()->getManager();
                $em->persist($ensayoObj);
                $em->flush();

            } catch(\Exception $e) {
                $logger->critical("No se pudo hacer persist del ensayo", array (
                    "Exception" => $e->getMessage()
                ));
                //return $this->redirectToRoute("homepage");
                return $this->createNotFoundException("Error al persistir datos.");
            }

            $logger->info("Generando ensayo nuevo", array(
                "t_inicio" => $dateTimeInicio->format("Y-m-d H:i:s")
            ));

            return $this->render("pages/ensayo/ensayo.html.twig", array (
                "lastPing" => $dateTimeInicio->format("Y-m-d H:i:s"),
                "t_inicio" => $dateTimeInicio->format("Y-m-d H:i:s"),
                "curvaObj" => $curvaObj
            ));
        }
        else {
            $logger->info("Slug invalido", array(
                "slug" => $slug
            ));
            return $this->redirectToRoute("ensayo");
        }
    }

    /**
     * @Route("/historial", name="historial")
     */
    public function historialAction()
    {
        $logger = $this->get('logger');
        $logger->debug("/historial accesed");
        $em = $this->getDoctrine()->getManager();
        $ensayosAll = $em->getRepository('AppBundle:Ensayo')->getAllFinishedOrderedLastFirst();
        return $this->render("pages/historial/historial_select.html.twig", array(
            "ensayos" => $ensayosAll,
            "fErrorOcurred" => false
        ));
    }


    /**
     * @Route("/historial/ver", name="historialVer")
     */
    public function historialVerAction(Request $request)
    {
        $logger = $this->get('logger');
        $logger->debug("/historial/ver accesed");
        $dateFormat = "Y-m-d H:i:s";
        $idEnsayo = $request->request->get("ensayoID");
        if ( !isset($idEnsayo) ) {
            $logger->error("idEnsayo not set");
            return $this->redirectToRoute("historial");
        }
        $em = $this->getDoctrine()->getManager();
        /**@var $ensayoObj Ensayo*/
        $ensayoObj = $em->getRepository('AppBundle:Ensayo')->findOneByID($idEnsayo);

        $curvaObj = $em->getRepository('AppBundle:Curva')->getCurvaWithID($ensayoObj->getCurvaId());


        if ( isset($ensayoObj) ) {
            $logger->info("Ensayo ver succesful", array (
                "idRequested" => $idEnsayo
            ));
            return $this->render(":pages/historial:historial_ensayo.html.twig", array(
                "t_inicio" => $ensayoObj->getTInicio()->format($dateFormat),
                "t_fin" => $ensayoObj->getTFin()->format($dateFormat),
                "titulo" => $ensayoObj->getTitulo(),
                "curvaObj" => $curvaObj
            ));
        }
        else {
            $logger->error("Ensayo no encontrado", array (
                "idRequested" => $idEnsayo
            ));
            return $this->render("pages/historial/historial_select.html.twig", array(
                "fErrorOcurred" => true
            ));
        }

    }

    /**
     * @Route("/avanzado", name="avanzado")
     */
    public function exportarAction(Request $request)
    {
        $logger = $this->get('logger');
        $logger->debug("/avanzado accesed");
        $em = $this->getDoctrine()->getManager();
        $ensayosAll = $em->getRepository('AppBundle:Ensayo')->getAllFinishedOrderedLastFirst();
        return $this->render("pages/avanzado/avanzado.html.twig", array(
            "ensayos" => $ensayosAll,
        ));
    }

    /**
     * @Route("/generateCSV", name="generateCSV")
     */
    public function generateCsvAction(Request $request)
    {
        $logger = $this->get('logger');
        $logger->debug("/generateCSV accesed");
        $idEnsayo = $request->request->get("ensayoID");
        $intervalo = $request->request->get("intervalo");
        if ( !isset($idEnsayo) || !isset($intervalo)) {
            return $this->redirectToRoute("avanzado");
        }
        $em = $this->getDoctrine()->getManager();
        /**@var $ensayoObj Ensayo*/
        $ensayoObj = $em->getRepository('AppBundle:Ensayo')->findOneByID($idEnsayo);

        if (!isset($ensayoObj)) {
            $logger->error("Ensayo no encontrado", array (
                "idRequested" => $idEnsayo
            ));
            return $this->redirectToRoute("avanzado");
        }

        $t_inicio = $ensayoObj->getTInicio()->format('Y-m-d H:i:s');
        $t_fin = $ensayoObj->getTFin()->format('Y-m-d H:i:s');;

        $response = new StreamedResponse();
        $response->setCallback(function () use($t_inicio,$t_fin,$intervalo){
            $handle = fopen('php://output', 'w+');

            // Add the header of the CSV file
            fputcsv($handle, array('Canal', 'Medicion', 'Timestamp'), ';');
            // Query data from database
            $em = $this->getDoctrine()->getManager();
            if ($intervalo == 0) {
                $results = $em->getRepository('AppBundle:Datalog')->getDataInTimeRange($t_inicio, $t_fin);
            }
            else {
                $results = $em->getRepository('AppBundle:Datalog')->getDataInTimeRangeWithInterval($t_inicio, $t_fin,$intervalo);
            }

            // Add the data queried from database
            $timezoneArg = new \DateTimeZone("America/Argentina/Buenos_Aires");
            $timezoneGMT = new \DateTimeZone('GMT');
            $fechaInicio = new \DateTime("now", $timezoneArg);
            $timestampInicio = $fechaInicio->createFromFormat('Y-m-d H:i:s', $t_inicio,$timezoneArg)->getTimestamp();
            while ($row = $results->fetch()) {
                $fechaPunto = new \DateTime("now",$timezoneArg);
                $timestampPunto = $fechaPunto->createFromFormat('Y-m-d H:i:s', $row['fecha'],$timezoneArg)->getTimestamp();
                $row['fecha'] = $fechaPunto->setTimestamp($timestampPunto-$timestampInicio)->setTimezone($timezoneGMT)->format('H:i:s');
                fputcsv(
                    $handle, // The file pointer
                    array($row['sensor_id'], $row['medicion'], $row['fecha']), // The fields
                    ';' // The delimiter
                );
            }
            fclose($handle);
        });

        $filenameExport = $ensayoObj->getTFin()->format('Ymd_His');
        $response->setStatusCode(Response::HTTP_OK);
        $response->headers->set('Content-Type', 'text/csv; charset=utf-8');
        $response->headers->set('Content-Disposition', "attachment; filename=$filenameExport.csv");

        $logger->error("Ensayo exportado", array (
            "idRequested" => $idEnsayo,
            "t_inicio" => $t_inicio,
            "t_fin" => $t_fin,
            "intervalo" => $intervalo,
            "filename" => $filenameExport
        ));

        return $response;
    }
}


//TODO Agregar comentarios, norma, etc en tabla de curvas para mostrar en tooltip

//TODO Ver tema google charts api offline...(quizas pasar a CSV temporal para saltear DataTable)

//TODO 10 canales virtuales (q tmb se exporten)
/**
 * ServerSide:
 */

//TODO exportar solo canales seleccionados

//TODO Separar .js (assetic)




//TODO Generar user device solo con el username (q es la mac) y el password se genera automaticamente

//TODO no resume cuando paso mucho tiempo (ver tema del tiempo de lastPing)

//TODO retocar la migration q crea la tabla de curvas (esta comentada la creacion de la tabla) sino no va a andar en prod.

//TODO Status device???

//TODO Deployer bundle