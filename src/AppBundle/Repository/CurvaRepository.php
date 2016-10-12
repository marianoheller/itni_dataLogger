<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use AppBundle\Entity\Curva;
use Herrera\Json\Exception\Exception;

/**
 * CurvaRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CurvaRepository extends EntityRepository
{

    public function getListadoCurvas()  {
        $sqlListadoCurvas = "SELECT * FROM curva GROUP BY nombre ORDER BY id ASC";

        $em = $this->getEntityManager();
        $stmt = $em->getConnection()->prepare($sqlListadoCurvas);
        $stmt->execute();
        $arrayQueryResult = $stmt->fetchAll();

        return $arrayQueryResult;
    }

    public function getCurvaWithID($id) {
        $curvaObj = $this->findOneBy(array("id" => $id));

        if (!isset($curvaObj)) {
            throw new NotFoundHttpException("No se pudo encontrar la curva con id: $id");
        }
        return $curvaObj;
    }

    public function generateCurvaPackets($id, $arrayPackets, $firstTimeStamp) {
        /** @var Curva $curvaObj */
        $curvaObj = $this->findOneBy(array("id" => $id));
        if (!isset($curvaObj)) {
            throw new NotFoundHttpException("Generando data patrón. No se pudo encontrar la curva con id: $id");
        }

        //$json_a = json_decode($arrayPackets, true);
        $arrayPacketsCompleto = $arrayPackets;
        if ($curvaObj->getNombre() != "Sin Curva") {
            foreach ($arrayPacketsCompleto as $packet_ID => $dataArray) {
                foreach ($dataArray as $key => $data) {
                    $tiempoEnMinutos = (floatval($data["timestamp"]) - floatval($firstTimeStamp)) / 60;
                    $stringEvaluar = str_replace("t", strval($tiempoEnMinutos), $curvaObj->getFormula());
                    eval("\$auxVal = $stringEvaluar;");
                    //$arrayPacketsCompleto[$packet_ID][$key]["timestamp"] = strval(floatval($data["timestamp"]));
                    //$arrayPacketsCompleto[$packet_ID][$key]["t_inicial"] = strval(floatval($firstTimeStamp));
                    //$arrayPacketsCompleto[$packet_ID][$key]["minutos"] = $tiempoEnMinutos;
                    $arrayPacketsCompleto[$packet_ID][$key]["curvaPatron"] = $auxVal;
                }
            }
        }
        return $arrayPacketsCompleto;
    }

}
