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
        $authenticationUtils = $this->get('security.authentication_utils');

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        $f_dataErronea=false;
        /*if ($request->isMethod("POST")) {
            $_POST=$request->request;
            if( ($_POST->get("_password")== "admin") && ($_POST->get("_username")== "admin") ) {
                $session = new Session();
                $session->set('username', $_POST->get("username"));
                $f_dataErronea=false;
                return $this->redirectToRoute("homepage");
            }
            else
                $f_dataErronea=true;
        }*/

        return $this->render("accounts/login/login.html.twig",
            array(
                "flagDataErronea" => $f_dataErronea,
                // last username entered by the user
                'last_username' => $lastUsername,
                'error'         => $error,
            ));
    }
}




