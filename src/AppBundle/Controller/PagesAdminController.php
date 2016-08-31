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
        $logger = $this->get('logger');
        //Remove user
        $usernameDeleteTarget = $request->request->get("username-eliminar");
        $flagUserDeleted = false;
        $flagDeviceDeleted = false;
        $userDeletedName = "";
        if ( isset($usernameDeleteTarget) && $usernameDeleteTarget != "-1") {
            $em = $this->getDoctrine()->getManager();
            $repo = $em->getRepository('AppBundle:User');
            $userObj2Delete = $repo->findOneByUsername($usernameDeleteTarget);


            $isDevice = $request->request->get("is_device");
            if ($isDevice == "1") {
                $flagDeviceDeleted= true;
                $logger->info("Cuenta de dispositivo borrada", array (
                    "usernameDeleted" => $usernameDeleteTarget,
                    "userDeleter" => $this->getUser()
                ));
            }
            else {
                $logger->info("Cuenta de usuario borrada", array (
                    "usernameDeleted" => $usernameDeleteTarget,
                    "userDeleter" => $this->getUser()
                ));
                $flagUserDeleted = true;
            }

            $repo->deleteUser($userObj2Delete);
            $userDeletedName = $usernameDeleteTarget;
        }


        //Add user
        $add_username = $request->request->get("add-username");
        $add_password = $request->request->get("add-password");
        $flagUserAdded = false;
        $flagDeviceAdded = false;
        $userAddedName = "";
        if (  isset($add_username) && isset($add_password)) {
            $userObj = new User($add_username);
            $encoder = $this->container->get('security.password_encoder');
            $encoded = $encoder->encodePassword($userObj, $add_password);
            $userObj->setPassword($encoded);

            $isDevice = $request->request->get("is_device");
            if ($isDevice == "1") {
                $userObj->setDevice(true);
                $flagDeviceAdded = true;
                $logger->info("Cuenta de dispositivo agregada", array (
                    "usernameNuevo" => $usernameDeleteTarget,
                    "userCreador" => $this->getUser()
                ));
            }
            else {
                $flagUserAdded = true;
                $logger->info("Cuenta de usuario agregada", array (
                    "usernameNuevo" => $usernameDeleteTarget,
                    "userCreador" => $this->getUser()
                ));
            }
            $em = $this->getDoctrine()->getManager();
            $em->getRepository('AppBundle:User')->addUser($userObj);

            $userAddedName = $add_username;
        }



        //Get all for show
        $em = $this->getDoctrine()->getManager();
        $arrayUsers = $em->getRepository('AppBundle:User')->getAllUsersNonAdmin();
        $arrayDevices = $em->getRepository('AppBundle:User')->getAllDevices();

        return $this->render("admin/admin.html.twig", array(
            "arrayUsers" => $arrayUsers,
            "arrayDevices" => $arrayDevices,

            "flagUserAdded" => $flagUserAdded,
            "flagUserDeleted" => $flagUserDeleted,
            "flagDeviceAdded" => $flagDeviceAdded,
            "flagDeviceDeleted" => $flagDeviceDeleted,

            "userAddedName" => $userAddedName,
            "userDeletedName" => $userDeletedName
        ));
    }
}
