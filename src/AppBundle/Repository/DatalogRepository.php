<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * DatalogRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class DatalogRepository extends EntityRepository
{
    public function getSensoresStatus()
    {
        $sqlSensoresStatus = "SELECT  a.*
                    FROM    datalog a
                            INNER JOIN
                            (
                                SELECT sensor_id, MAX(fecha)as max_fecha
                                FROM    datalog
                                GROUP BY sensor_id
                            ) b ON a.sensor_id = b.sensor_id AND
                                    a.fecha = b.max_fecha
                    GROUP BY sensor_id ORDER BY a.sensor_id  ASC";

        $em = $this->getEntityManager();
        $stmt = $em->getConnection()->prepare($sqlSensoresStatus);
        $stmt->execute();
        $arrayQueryResult = $stmt->fetchAll();

        return $arrayQueryResult;
    }

    public function getSensoresStatusFormated()
    {
        $sqlSensoresStatus = "SELECT  a.*
                    FROM    datalog a
                            INNER JOIN
                            (
                                SELECT sensor_id, MAX(fecha)as max_fecha
                                FROM    datalog
                                GROUP BY sensor_id
                            ) b ON a.sensor_id = b.sensor_id AND
                                    a.fecha = b.max_fecha
                    GROUP BY sensor_id ORDER BY a.sensor_id  ASC";

        $em = $this->getEntityManager();
        $stmt = $em->getConnection()->prepare($sqlSensoresStatus);
        $stmt->execute();
        $arrayQueryResult = $stmt->fetchAll();

        //ReFormateo la fecha
        for ($i=0 ; $i< sizeof($arrayQueryResult) ; $i++) {
            $d1 = new \DateTime($arrayQueryResult[$i]['fecha']);
            $arrayQueryResult[$i]['fecha'] = $d1->format('H:i:s - d-m-Y');
        }
        //Elimino id (id de la base de datos, NO DEL SENSOR) del array q voy a mandar
        for ($i=0 ; $i<sizeof($arrayQueryResult) ; $i++) {
            unset($arrayQueryResult[$i]['id']);
        }

        return $arrayQueryResult;
    }

    public function getDataFromTimestamp($lastTimeStamp) {
        $lastFecha = new \DateTime();
        $lastFecha = $lastFecha->createFromFormat('Y-m-d H:i:s', $lastTimeStamp);
        $lastFechaString = $lastFecha->format('Y/m/d H:i:s');
        $sqlGetDataFromTimestamp = "SELECT * FROM datalog WHERE fecha>'$lastFechaString' ORDER BY sensor_id ASC, fecha ASC";
        $em = $this->getEntityManager();
        $stmt = $em->getConnection()->prepare($sqlGetDataFromTimestamp);
        $stmt->execute();
        $arrayQueryResult = $stmt->fetchAll();

        return $arrayQueryResult;
    }

    public function getDataFormated($lastTimeStamp)
    {
        $lastFecha = new \DateTime();
        $lastFecha = $lastFecha->createFromFormat('Y-m-d H:i:s', $lastTimeStamp);
        $lastFechaString = $lastFecha->format('Y/m/d H:i:s');
        $sqlGetDataFromTimestamp = "SELECT * FROM datalog WHERE fecha>'$lastFechaString' ORDER BY sensor_id ASC, fecha ASC";
        $em = $this->getEntityManager();
        $stmt = $em->getConnection()->prepare($sqlGetDataFromTimestamp);
        $stmt->execute();
        $arrayQueryResult = $stmt->fetchAll();

        for ($i=0 ; $i< sizeof($arrayQueryResult) ; $i++) {
            $d1 = new \DateTime($arrayQueryResult[$i]['fecha'],new \DateTimeZone("America/Argentina/Buenos_Aires"));
            $arrayQueryResult[$i]['fecha'] = $d1->getTimestamp();
        }

        return $arrayQueryResult;
    }

    public function getPacketsData($lastTimeStamp) {
        $lastFecha = new \DateTime();
        $lastFecha = $lastFecha->createFromFormat('Y-m-d H:i:s', $lastTimeStamp);
        $lastFechaString = $lastFecha->format('Y/m/d H:i:s');
        $sqlGetDataFromTimestamp = "SELECT * FROM datalog WHERE fecha>'$lastFechaString' ORDER BY sensor_id ASC, fecha ASC";
        $em = $this->getEntityManager();
        $stmt = $em->getConnection()->prepare($sqlGetDataFromTimestamp);
        $stmt->execute();
        $arrayQueryResult = $stmt->fetchAll();

        if (empty($arrayQueryResult)) {
            throw new NotFoundHttpException("No se encontraron registros en datalog con timestamp: $lastTimeStamp");
        }

        for ($i=0 ; $i< sizeof($arrayQueryResult) ; $i++) {
            $d1 = new \DateTime($arrayQueryResult[$i]['fecha'],new \DateTimeZone("America/Argentina/Buenos_Aires"));
            $arrayQueryResult[$i]['fecha'] = $d1->getTimestamp();
        }

        $arrayReturn = [];
        $arrayPerChannel = [];
        //Init arrays per channel
        foreach ($arrayQueryResult as $item) {
            $arrayPerChannel[$item["sensor_id"]] = [];
        }
        //Push data
        foreach ($arrayQueryResult as $item) {
            $arrayAux = [];
            foreach ($item as $key => $value) {
                if ( $key == "fecha")
                    $arrayAux["timestamp"] = $value;
                elseif ( $key == "medicion" )
                    $arrayAux["payloadString"] = $value;
            }
            array_push($arrayPerChannel[$item["sensor_id"]],$arrayAux);
        }
        //Final parse of array
        foreach ($arrayPerChannel as $keyAux => $itemsPerChannel) {
            $arrayReturn["packets_".$keyAux] = $itemsPerChannel;
        }

        return $arrayReturn;
    }


    public function getDataInTimeRange($t_inicio, $t_fin) {
        $sqlGetEnsayosInTimeRange = "SELECT sensor_id, medicion, fecha FROM `datalog` WHERE `fecha`>'$t_inicio' AND `fecha`<'$t_fin' ";
        $em = $this->getEntityManager();
        $stmt = $em->getConnection()->prepare($sqlGetEnsayosInTimeRange);
        $stmt->execute();
        //$arrayQueryResult = $stmt->fetchAll();

        return $stmt;
    }

    public  function getDataInTimeRangeWithInterval($t_inicio, $t_fin, $intervalo) {
        $sqlGetEnsayosInTimeRange = " SELECT sensor_id, medicion, fecha
                                      FROM datalog
                                      WHERE fecha>'$t_inicio' and fecha<'$t_fin'
                                      GROUP BY UNIX_TIMESTAMP(fecha) DIV $intervalo, sensor_id
                                      ORDER BY `datalog`.`fecha` ASC ";
        $em = $this->getEntityManager();
        $stmt = $em->getConnection()->prepare($sqlGetEnsayosInTimeRange);
        $stmt->execute();
        //$arrayQueryResult = $stmt->fetchAll();

        return $stmt;
    }



    public function getPacketsInTimeRange($t_inicio, $t_fin) {
        $fechaInicio = new \DateTime();
        $fechaInicio = $fechaInicio->createFromFormat('Y-m-d H:i:s', $t_inicio);
        $fechaInicioString = $fechaInicio->format('Y/m/d H:i:s');

        $fechaFin = new \DateTime();
        $fechaFin = $fechaFin->createFromFormat('Y-m-d H:i:s', $t_fin);
        $fechaFinString = $fechaFin->format('Y/m/d H:i:s');


        $sqlGetEnsayosInTimeRange = "SELECT sensor_id, medicion, fecha FROM `datalog` WHERE `fecha`>'$fechaInicioString' AND `fecha`<'$fechaFinString' ";
        $em = $this->getEntityManager();
        $stmt = $em->getConnection()->prepare($sqlGetEnsayosInTimeRange);
        $stmt->execute();
        $arrayQueryResult = $stmt->fetchAll();

        for ($i=0 ; $i< sizeof($arrayQueryResult) ; $i++) {
            $d1 = new \DateTime($arrayQueryResult[$i]['fecha'],new \DateTimeZone("America/Argentina/Buenos_Aires"));
            $arrayQueryResult[$i]['fecha'] = $d1->getTimestamp();
        }

        $arrayReturn = [];
        $arrayPerChannel = [];
        //Init arrays per channel
        foreach ($arrayQueryResult as $item) {
            $arrayPerChannel[$item["sensor_id"]] = [];
        }
        //Push data
        foreach ($arrayQueryResult as $item) {
            $arrayAux = [];
            foreach ($item as $key => $value) {
                if ( $key == "fecha")
                    $arrayAux["timestamp"] = $value;
                elseif ( $key == "medicion" )
                    $arrayAux["payloadString"] = $value;
            }
            array_push($arrayPerChannel[$item["sensor_id"]],$arrayAux);
        }
        //Final parse of array
        foreach ($arrayPerChannel as $keyAux => $itemsPerChannel) {
            $arrayReturn["packets_".$keyAux] = $itemsPerChannel;
        }

        return $arrayReturn;
    }

}
