<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use AppBundle\Entity\User;

/**
 * UserRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserRepository extends EntityRepository
{
    public function findOneByUsername($username) {
        return $this->findOneBy(array("username" => $username));
    }

    public function getAllUsersNonAdmin() {
        $sqlGetAllNonAdmin = "SELECT * FROM `user` WHERE is_admin!=1";
        $em = $this->getEntityManager();
        $stmt = $em->getConnection()->prepare($sqlGetAllNonAdmin);
        $stmt->execute();
        $arrayQueryResult = $stmt->fetchAll();

        return $arrayQueryResult;
    }

    public function addUser($userObj) {
        $em = $this->getEntityManager();
        $em->persist($userObj);
        $em->flush();
    }

    public function deleteUser($userObj) {
        $em = $this->getEntityManager();
        $em->remove($userObj);
        $em->flush();
    }

}