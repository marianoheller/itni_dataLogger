<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use AppBundle\Entity\User;

/**
 * UserRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserRepository extends EntityRepository
{
    /**
     *
     * Overload de findOneBy=>username
     *
     * @param $username : username a buscar
     * @return null|object : Devuelve el null o el objecto encontrado
     */

    public function findOneByUsername($username) {
        return $this->findOneBy(array("username" => $username));
    }


    /**
     * @return array : Devuelve todos los users que no son admin
     */

    public function getAllUsersNonAdmin() {
        $sqlGetAllNonAdmin = "SELECT * FROM `user` WHERE is_admin!=1 AND is_device!=1";

        try {
            $em = $this->getEntityManager();
            $stmt = $em->getConnection()->prepare($sqlGetAllNonAdmin);
            $stmt->execute();
            $arrayQueryResult = $stmt->fetchAll();
        } catch (\Exception $e) {
            throw new NotFoundHttpException("Error al ejecutar query $sqlGetAllNonAdmin.<br>$e->getMessage()");
        }

        return $arrayQueryResult;
    }

    public function getAllDevices() {
        $sqlGet = "SELECT * FROM `user` WHERE is_device=1";

        try {
            $em = $this->getEntityManager();
            $stmt = $em->getConnection()->prepare($sqlGet);
            $stmt->execute();
            $arrayQueryResult = $stmt->fetchAll();
        } catch (\Exception $e) {
            throw new NotFoundHttpException("Error al ejecutar query $sqlGet.<br>$e->getMessage()");
        }


        return $arrayQueryResult;
    }

    public function addUser($userObj) {
        try {
            $em = $this->getEntityManager();
            $em->persist($userObj);
            $em->flush();
        } catch(\Exception $e) {
            throw new NotFoundHttpException("Error al ejecutar query de usuario.<br>$e->getMessage()");
        }
    }

    public function deleteUser($userObj) {
        try {
            $em = $this->getEntityManager();
            $em->remove($userObj);
            $em->flush();
        } catch(\Exception $e) {
            throw new NotFoundHttpException("Error al ejecutar query de usuario.<br>$e->getMessage()");
        }
    }

}
