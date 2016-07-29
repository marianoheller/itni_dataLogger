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
        return $this->render("pages/homepage_base.html.twig");
        /*$session = new Session();
        if ( $session->get("username") )
            return $this->render("pages/homepage_base.html.twig");
        else
            return $this->redirectToRoute("login");*/
    }


    /**
     * @Route("/sensores", name="sensores")
     */
    public function sensoresAction(Request $request)
    {
        return $this->render("pages/sensores/sensores.html.twig");
    }

    /**
     * @Route("/ensayo", name="ensayo")
     */
    public function ensayoAction(Request $request)
    {
        //Check if ensayo is running
        $sqlCheckIfEnsayoIsRunning =   "SELECT *,TIMESTAMPDIFF(SECOND, lastPing, NOW()) as diff
                                                FROM ensayo
                                                HAVING diff = (
                                                    SELECT MIN(TIMESTAMPDIFF(SECOND, lastPing, NOW())) as diffAux
                                                    FROM ensayo
                                                    HAVING diffAux<(5*60)
                                                    AND diffAux>= 0
                                                    AND t_fin IS NULL
                                                    )";
        $em = $this->getDoctrine()->getManager();
        $stmt = $em->getConnection()->prepare($sqlCheckIfEnsayoIsRunning);
        $stmt->execute();
        $arrayQueryResult = $stmt->fetchAll();


        if ( !empty($arrayQueryResult) ) {
            $flagEnsayoRunning = true;
        }
        else {
            $flagEnsayoRunning = false;
        }
        return $this->render("pages/ensayo/ensayo_config.html.twig", array (
            "flagEnsayoRunning" => $flagEnsayoRunning,
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
                $sqlCheckIfEnsayoIsRunning =   "SELECT *,TIMESTAMPDIFF(SECOND, lastPing, NOW()) as diff
                                                FROM ensayo
                                                HAVING diff = (
                                                    SELECT MIN(TIMESTAMPDIFF(SECOND, lastPing, NOW())) as diffAux
                                                    FROM ensayo
                                                    HAVING diffAux<(5*60)
                                                    AND diffAux>= 0
                                                    AND t_fin IS NULL
                                                    )";
                $em = $this->getDoctrine()->getManager();
                $stmt = $em->getConnection()->prepare($sqlCheckIfEnsayoIsRunning);
                $stmt->execute();
                $arrayQueryResult = $stmt->fetchAll();
                //if NO hay ensayo andando
                if ( empty($arrayQueryResult)) {
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
            //TODO check if persisted data went OK
            $success = true; // <---- and affect success flag
            if ( $success ) {
                //TODO hacer select de ultimo ensayo y usear esa info para mandar al template
                return $this->render("pages/ensayo/ensayo.html.twig", array (
                    "lastPing" => $dateTimeInicio->format("Y-m-d H:i:s"),
                    "t_inicio" => $dateTimeInicio->format("Y-m-d H:i:s")
                ));
            }
            else {
                return $this->redirectToRoute("ensayo");
            }
        }
        else {
            return $this->redirectToRoute("ensayo");
        }
    }
}

