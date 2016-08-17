<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * EnsayoRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class EnsayoRepository extends EntityRepository
{
    public function isEnsayoRunning() {
        $sqlCheckIfEnsayoIsRunning =   "SELECT *,TIMESTAMPDIFF(SECOND, lastPing, NOW()) as diff
                                                FROM ensayo
                                                HAVING diff = (
                                                    SELECT MIN(TIMESTAMPDIFF(SECOND, lastPing, NOW())) as diffAux
                                                    FROM ensayo
                                                    HAVING diffAux<(5*60)
                                                    AND diffAux>= 0
                                                    AND t_fin IS NULL
                                                    )";
        $em = $this->getEntityManager();
        $stmt = $em->getConnection()->prepare($sqlCheckIfEnsayoIsRunning);
        $stmt->execute();
        $arrayQueryResult = $stmt->fetchAll();

        return !empty($arrayQueryResult);
    }

    public function getEnsayoActual() {
        $sqlCheckIfEnsayoIsRunning =   "SELECT *,TIMESTAMPDIFF(SECOND, lastPing, NOW()) as diff
                                                FROM ensayo
                                                HAVING diff = (
                                                    SELECT MIN(TIMESTAMPDIFF(SECOND, lastPing, NOW())) as diffAux
                                                    FROM ensayo
                                                    HAVING diffAux<(5*60)
                                                    AND diffAux>= 0
                                                    AND t_fin IS NULL
                                                    )";
        $em = $this->getEntityManager();
        $stmt = $em->getConnection()->prepare($sqlCheckIfEnsayoIsRunning);
        $stmt->execute();
        $arrayQueryResult = $stmt->fetchAll();

        return $arrayQueryResult;
    }

    public function getAll() {
        $sqlGetAll =   "SELECT * from ensayo";
        $em = $this->getEntityManager();
        $stmt = $em->getConnection()->prepare($sqlGetAll);
        $stmt->execute();
        $arrayQueryResult = $stmt->fetchAll();

        return $arrayQueryResult;
    }

    public function getAllOrderedLastFirst() {
        $sqlGetAll =   "SELECT * from ensayo ORDER BY t_inicio DESC";
        $em = $this->getEntityManager();
        $stmt = $em->getConnection()->prepare($sqlGetAll);
        $stmt->execute();
        $arrayQueryResult = $stmt->fetchAll();

        return $arrayQueryResult;
    }

    public function updateLastPing() {
        $lastPingObj = new \DateTime("now",new \DateTimeZone("America/Argentina/Buenos_Aires"));
        $lastPingString = $lastPingObj->format("Y-m-d H:i:s");

        $sqlUpdateLastPing = "UPDATE ensayo a
                                    JOIN (
                                        SELECT *,TIMESTAMPDIFF(SECOND, lastPing, NOW()) as diff
                                        FROM ensayo
                                        HAVING diff = (
                                            SELECT MIN(TIMESTAMPDIFF(SECOND, lastPing, NOW())) as diffAux
                                            FROM ensayo
                                            HAVING diffAux<(5*60)
                                            AND diffAux>= 0
                                            AND t_fin IS NULL
                                            )
                                    ) b
                                    ON a.id = b.id
                                    SET a.lastPing = '$lastPingString'";
        $em = $this->getEntityManager();
        $count = $em->getConnection()->executeUpdate($sqlUpdateLastPing);

        //Affected rows
        return $count;
    }

    public function finishAllEnsayos() {
        $sqlCancelEnsayos = "UPDATE ensayo
                                SET t_fin = lastPing";
        $em = $this->getEntityManager();
        $count = $em->getConnection()->executeUpdate($sqlCancelEnsayos);

        //Affected rows
        return $count;
    }

    public function findOneByID($id) {
        return $this->findOneBy(array("id" => $id));
    }
}
