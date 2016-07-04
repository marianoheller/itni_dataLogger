<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

//use Symfony\Component\Validator\Constraints\DateTime;


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
            return $this->render("pages/ensayo_base.html.twig");
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
}

