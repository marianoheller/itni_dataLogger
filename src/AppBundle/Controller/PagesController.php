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
        $session = new Session();
        if ( $session->get("username") )
            return $this->render("pages/homepage_base.html.twig");
        else
            return $this->redirectToRoute("login");
    }


    /**
     * @Route("/sensores", name="sensores")
     */
    public function sensoresAction(Request $request)
    {
        $session = new Session();
        if ( $session->get("username") )
            return $this->render("pages/sensores/sensores.html.twig");
        else
            return $this->redirectToRoute("login");
    }

    /**
     * @Route("/ensayo", name="ensayo")
     */
    public function ensayoAction(Request $request)
    {
        $session = new Session();
        if ( $session->get("username") )
            return $this->render("pages/ensayo/ensayo_config.html.twig");
        else
            return $this->redirectToRoute("login");
    }

    /**
     * @Route("/about", name="about")
     */
    public function aboutAction(Request $request)
    {
        $session = new Session();
        if ( $session->get("username") )
            return $this->render("pages/about_base.html.twig");
        else
            return $this->redirectToRoute("login");
    }

    /**
     * @Route("/ensayo/now", name="ensayoNow")
     */
    public function ensayoNowAction(Request $request)
    {
        $session = new Session();
        if ( $session->get("username") ) {
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
            //
            $success = true;
            if ( $success ) {
                return $this->render("pages/ensayo/ensayo.html.twig");
            }
            else {
                return $this->render("pages/ensayo/ensayo_config.html.twig");
            }
        }
        else {
            return $this->redirectToRoute("login");
        }
    }
}

