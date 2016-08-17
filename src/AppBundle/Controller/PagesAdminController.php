<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

use Symfony\Component\Validator\Constraints\DateTime;

use AppBundle\Entity\User;


class PagesAdminController extends Controller
{
    /**
     * @Route("/admin", name="admin")
     */
    public function adminAction(Request $request)
    {

        //Remove user
        $usernameDeleteTarget = $request->request->get("username-eliminar");
        $flagUserDeleted = false;
        $userDeletedName = "";
        if ( isset($usernameDeleteTarget) && $usernameDeleteTarget != "-1") {
            $em = $this->getDoctrine()->getManager();
            $repo = $em->getRepository('AppBundle:User');
            $userObj2Delete = $repo->findOneByUsername($usernameDeleteTarget);
            $repo->deleteUser($userObj2Delete);

            $flagUserDeleted = true;
            $userDeletedName = $usernameDeleteTarget;
        }

        //Add user
        $add_username = $request->request->get("add-username");
        $add_password = $request->request->get("add-password");
        $add_email = $request->request->get("add-email");
        $flagUserAdded = false;
        $userAddedName = "";
        if (  isset($add_email) && isset($add_username) && isset($add_password)) {
            $userObj = new User($add_username,$add_email);
            $encoder = $this->container->get('security.password_encoder');
            $encoded = $encoder->encodePassword($userObj, $add_password);
            $userObj->setPassword($encoded);

            $em = $this->getDoctrine()->getManager();
            $em->getRepository('AppBundle:User')->addUser($userObj);

            $flagUserAdded = true;
            $userAddedName = $add_username;
        }



        //Get all for show
        $em = $this->getDoctrine()->getManager();
        $arrayResults = $em->getRepository('AppBundle:User')->getAllUsersNonAdmin();

        return $this->render("admin/admin.html.twig", array(
            "arrayUsers" => $arrayResults,
            "flagUserAdded" => $flagUserAdded,
            "userAddedName" => $userAddedName,
            "flagUserDeleted" => $flagUserDeleted,
            "userDeletedName" => $userDeletedName
        ));
    }
}
