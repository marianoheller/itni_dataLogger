<?php

namespace AppBundle\Controller;

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


class PagesController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function homepageAction(Request $request)
    {
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
        //Check if ensayo is running
        $em = $this->getDoctrine()->getManager();
        $isEnsayoRunning = $em->getRepository('AppBundle:Ensayo')->isEnsayoRunning();
        $arrayQueryResult = $em->getRepository('AppBundle:Ensayo')->getEnsayoActual();


        return $this->render("pages/ensayo/ensayo_config.html.twig", array (
            "flagEnsayoRunning" => $isEnsayoRunning,
            "arrayQueryResult" => $arrayQueryResult
        ));
    }

    /**
     * @Route("/ensayo/{slug}", name="ensayoRun", defaults={"slug" = 1} )
     */
    public function ensayoNowAction(Request $request, $slug)
    {
        //if resuming ensayo
        if ($slug == 2) {
            //if there is POST data
            if ( $request->request->count() != 0) {
                $em = $this->getDoctrine()->getManager();
                $isEnsayoRunning = $em->getRepository('AppBundle:Ensayo')->isEnsayoRunning();
                $arrayQueryResult = $em->getRepository('AppBundle:Ensayo')->getEnsayoActual();

                //if NO hay ensayo andando
                if ( !$isEnsayoRunning) {
                    return $this->redirectToRoute("ensayo");
                }
                //else ALL GOOD
                else {
                    return $this->render("pages/ensayo/ensayo.html.twig", array (
                        "lastPing" => $arrayQueryResult[0]["lastPing"],
                        "t_inicio" => $arrayQueryResult[0]["t_inicio"]
                    ));
                }
            }
            //else probablemente se tipeo la url directamente
            else {
                return $this->redirectToRoute("ensayo");
            }
        }
        //else if es ensayo nuevo
        else if ( $slug == 1 ) {
            //if there is NO POST data -> redirect (tipeado  a mano
            if ( $request->request->count() == 0 ) {
                return $this->redirectToRoute("ensayo");
            }
            //Generate Ensayo for database % flush
            $ensayoObj = new Ensayo();
            $ensayoObj->setTitulo($request->request->get("Titulo"));
            $ensayoObj->setResponsable($request->request->get("Responsable"));
            $ensayoObj->setCliente($request->request->get("Cliente"));
            $ensayoObj->setOT($request->request->get("OT"));
            $ensayoObj->setSOT($request->request->get("SOT"));
            $ensayoObj->setDescripcion($request->request->get("Descripcion"));
            $timezone = new \DateTimeZone("America/Argentina/Buenos_Aires");
            $dateTimeInicio = new \DateTime("now",$timezone);
            //echo $dateTimeInicio->format('Y-m-d H:i:s');  //Time debug
            $ensayoObj->setTInicio($dateTimeInicio);
            $ensayoObj->setTFin();
            $ensayoObj->setLastPing($dateTimeInicio);

            $em = $this->getDoctrine()->getManager();
            $em->persist($ensayoObj);
            $em->flush();

            return $this->render("pages/ensayo/ensayo.html.twig", array (
                "lastPing" => $dateTimeInicio->format("Y-m-d H:i:s"),
                "t_inicio" => $dateTimeInicio->format("Y-m-d H:i:s")
            ));
        }
        else {
            return $this->redirectToRoute("ensayo");
        }
    }

    /**
     * @Route("/historial", name="historial")
     */
    public function historialAction()
    {
        $em = $this->getDoctrine()->getManager();
        $ensayosAll = $em->getRepository('AppBundle:Ensayo')->getAllOrderedLastFirst();
        return $this->render("pages/historial/historial_select.html.twig", array(
            "ensayos" => $ensayosAll
        ));
    }


    /**
     * @Route("/historial/ver", name="historialVer")
     */
    public function historialVerAction(Request $request)
    {
        $dateFormat = "Y-m-d H:i:s";
        $idEnsayo = $request->request->get("ensayoID");
        if ( !isset($idEnsayo) ) {
            return $this->redirectToRoute("historial");
        }
        $em = $this->getDoctrine()->getManager();
        /**@var $ensayoObj Ensayo*/
        $ensayoObj = $em->getRepository('AppBundle:Ensayo')->findOneByID($idEnsayo);
        return $this->render(":pages/historial:historial_ensayo.html.twig", array(
            "t_inicio" => $ensayoObj->getTInicio()->format($dateFormat),
            "t_fin" => $ensayoObj->getTFin()->format($dateFormat),
            "titulo" => $ensayoObj->getTitulo()
        ));
    }

    /**
     * @Route("/avanzado", name="avanzado")
     */
    public function exportarAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $ensayosAll = $em->getRepository('AppBundle:Ensayo')->getAllOrderedLastFirst();
        return $this->render("pages/avanzado/avanzado.html.twig", array(
            "ensayos" => $ensayosAll
        ));
    }

    /**
     * @Route("/generateCSV", name="generateCSV")
     */
    public function generateCsvAction(Request $request)
    {
        $idEnsayo = $request->request->get("ensayoID");
        $intervalo = $request->request->get("intervalo");
        if ( !isset($idEnsayo) || !isset($intervalo)) {
            return $this->redirectToRoute("avanzado");
        }
        $em = $this->getDoctrine()->getManager();
        /**@var $ensayoObj Ensayo*/
        $ensayoObj = $em->getRepository('AppBundle:Ensayo')->findOneByID($idEnsayo);
        $t_inicio = $ensayoObj->getTInicio()->format('Y-m-d H:i:s');
        $t_fin = $ensayoObj->getTFin()->format('Y-m-d H:i:s');;

        $response = new StreamedResponse();
        $response->setCallback(function () use($t_inicio,$t_fin){
            $handle = fopen('php://output', 'w+');

            // Add the header of the CSV file
            fputcsv($handle, array('Canal', 'Medicion', 'Timestamp'), ';');
            // Query data from database
            $em = $this->getDoctrine()->getManager();
            $results = $em->getRepository('AppBundle:Datalog')->getDataInTimeRange($t_inicio, $t_fin);

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
        $response->setStatusCode(200);
        $response->headers->set('Content-Type', 'text/csv; charset=utf-8');
        $response->headers->set('Content-Disposition', "attachment; filename=$filenameExport.csv");

        return $response;
    }

}



//TODO canales virtuales
//TODO patron

//TODO server Validation on everything
//TODO lifecycle LOG
//TODO Deployer bundle (linux aparentemente)