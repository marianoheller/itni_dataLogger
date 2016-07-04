<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

//use Symfony\Component\Validator\Constraints\DateTime;


class AccountController extends Controller
{
    /**
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request)
    {
        $f_dataErronea=false;
        if ($request->isMethod("POST")) {
            $_POST=$request->request;
            if( ($_POST->get("password")== "admin") && ($_POST->get("username")== "admin") ) {
                $session = new Session();
                $session->set('username', $_POST->get("username"));
                $f_dataErronea=false;
                return $this->redirectToRoute("homepage");
            }
            else
                $f_dataErronea=true;
        }

        return $this->render("accounts/login/login.html.twig",
            array( "flagDataErronea" => $f_dataErronea));
    }

    /**
     * @Route("/register", name="register")
     */
    public function registerAction(Request $request)
    {
        //return $this->render("login.html.twig");
        return $this->redirectToRoute("login");
    }


    /**
     * @Route("/reset", name="reset")
     */
    public function resetAction(Request $request)
    {
        //return $this->render("login.html.twig");
        return $this->redirectToRoute("login");
    }


    /**
     * @Route("/logout", name="logout")
     */
    public function logoutAction(Request $request)
    {
        $session = new Session();
        $session->remove('username');
        return $this->redirectToRoute("login");
    }
}

