<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

use Symfony\Component\Validator\Constraints\DateTime;

use AppBundle\Entity\Ensayo;


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
    public function sensoresAction(Request $request)
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
    public function ensayoAction(Request $request)
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
     * @Route("/about", name="about")
     */
    public function aboutAction(Request $request)
    {
        return $this->render("pages/about_base.html.twig");
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
}

    /* TODO hacer Historial de ensayos page*/



//TODO FOSUser
//TODO Deployer bundle