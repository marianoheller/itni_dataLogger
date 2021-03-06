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


    /**
     *
     * Adquiere la ultima data disponible de cada sensor (el ultimo input en datalog).
     *
     * @return array : Devuelve la data cruda.
     */

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



        try {
            $em = $this->getEntityManager();
            $stmt = $em->getConnection()->prepare($sqlSensoresStatus);
            $stmt->execute();
            $arrayQueryResult = $stmt->fetchAll();
        } catch (\Exception $e) {
            throw new NotFoundHttpException("Error al ejecutar query $sqlSensoresStatus.<br>$e->getMessage()");
        }

        return $arrayQueryResult;
    }


    /**
     *
     * Adquiere la ultima data disponible de cada sensor (el ultimo input en datalog) y reformatea algunos campos
     *
     * @return array : Devuelve la data reformateada.
     */

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


        try {
            $em = $this->getEntityManager();
            $stmt = $em->getConnection()->prepare($sqlSensoresStatus);
            $stmt->execute();
            $arrayQueryResult = $stmt->fetchAll();
        } catch (\Exception $e) {
            throw new NotFoundHttpException("Error al ejecutar query $sqlSensoresStatus.<br>$e->getMessage()");
        }

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


    /**
     *
     * Getea la data del datalog a partir de $lastTimeStamp
     *
     * @param string $lastTimeStamp : String con fecha. A partir de esta fecha se adquiriran los datos
     * @return array : Devuelve la data cruda. (NOT PACKETS)
     */

    public function getDataFromTimestamp($lastTimeStamp) {
        $lastFecha = new \DateTime();
        $lastFecha = $lastFecha->createFromFormat('Y-m-d H:i:s', $lastTimeStamp);
        $lastFechaString = $lastFecha->format('Y/m/d H:i:s');
        $sqlGetDataFromTimestamp = "SELECT * FROM datalog WHERE fecha>'$lastFechaString' ORDER BY sensor_id ASC, fecha ASC";


        try {
            $em = $this->getEntityManager();
            $stmt = $em->getConnection()->prepare($sqlGetDataFromTimestamp);
            $stmt->execute();
            $arrayQueryResult = $stmt->fetchAll();
        } catch (\Exception $e) {
            throw new NotFoundHttpException("Error al ejecutar query $sqlGetDataFromTimestamp.<br>$e->getMessage()");
        }

        return $arrayQueryResult;
    }


    /**
     *
     * Getea la data del datalog a partir de $lastTimeStamp y reformatea algunos campos por cuestiones de
     * compatibilidad.
     *
     * @param string $lastTimeStamp : String con fecha. A partir de esta fecha se adquiriran los datos
     * @return array : Devuelve la data formateada correctamente. (NOT PACKETS)
     */

    public function getDataFormated($lastTimeStamp)
    {
        $lastFecha = new \DateTime();
        $lastFecha = $lastFecha->createFromFormat('Y-m-d H:i:s', $lastTimeStamp);
        $lastFechaString = $lastFecha->format('Y/m/d H:i:s');
        $sqlGetDataFromTimestamp = "SELECT * FROM datalog WHERE fecha>'$lastFechaString' ORDER BY sensor_id ASC, fecha ASC";

        try {
            $em = $this->getEntityManager();
            $stmt = $em->getConnection()->prepare($sqlGetDataFromTimestamp);
            $stmt->execute();
            $arrayQueryResult = $stmt->fetchAll();
        } catch (\Exception $e) {
            throw new NotFoundHttpException("Error al ejecutar query $sqlGetDataFromTimestamp.<br>$e->getMessage()");
        }


        for ($i=0 ; $i< sizeof($arrayQueryResult) ; $i++) {
            $d1 = new \DateTime($arrayQueryResult[$i]['fecha'],new \DateTimeZone("America/Argentina/Buenos_Aires"));
            $arrayQueryResult[$i]['fecha'] = $d1->getTimestamp();
        }

        if (empty($arrayQueryResult)) {
            throw new NotFoundHttpException("No se encontraron registros en datalog con timestamp: $lastTimeStamp");
        }

        return $arrayQueryResult;
    }

    /**
     *
     * Genera packets a partir de $arrayQueryResult.
     *
     * @param array $arrayQueryResult : Array de datos correctamente formateados
     * @return array : Packets generados a partir de la data suministrada
     */


    public function generatePacketsFromDataFormatted($arrayQueryResult) {

        if (empty($arrayQueryResult)) {
            throw new NotFoundHttpException("Error al generar packets de data. Data vacia.");
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

    /**
     *
     * Getea la data del datalog a partir de $lastTimeStamp y genera los packets.
     *
     * @param string $lastTimeStamp : El timespamp del ultimo valor en clientSide
     * @return array : Devuelve los packets de data.
     */


    public function getPacketsData($lastTimeStamp) {
        $lastFecha = new \DateTime();
        $lastFecha = $lastFecha->createFromFormat('Y-m-d H:i:s', $lastTimeStamp);
        $lastFechaString = $lastFecha->format('Y/m/d H:i:s');
        $sqlGetDataFromTimestamp = "SELECT * FROM datalog WHERE fecha>'$lastFechaString' ORDER BY sensor_id ASC, fecha ASC";

        try {
            $em = $this->getEntityManager();
            $stmt = $em->getConnection()->prepare($sqlGetDataFromTimestamp);
            $stmt->execute();
            $arrayQueryResult = $stmt->fetchAll();
        } catch (\Exception $e) {
            throw new NotFoundHttpException("Error al ejecutar query $sqlGetDataFromTimestamp.<br>$e->getMessage()");
        }



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


    /**
     *
     * Getea la data del datalog dentro de un rango de tiempo.
     *
     * @param $t_inicio: Limite inferior del rango de tiempo
     * @param $t_fin: Limite superior del rango de tiempo
     * @return \Doctrine\DBAL\Driver\Statement : Retorna el resultado del query SIN fetchear
     */

    public function getDataInTimeRange($t_inicio, $t_fin) {
        $sqlGetEnsayosInTimeRange = "SELECT sensor_id, medicion, fecha FROM `datalog` WHERE `fecha`>'$t_inicio' AND `fecha`<'$t_fin' ORDER BY fecha, sensor_id ASC";

        try {
            $em = $this->getEntityManager();
            $stmt = $em->getConnection()->prepare($sqlGetEnsayosInTimeRange);
            $stmt->execute();
            //$arrayQueryResult = $stmt->fetchAll();
        } catch (\Exception $e) {
            throw new NotFoundHttpException("Error al ejecutar query $sqlGetEnsayosInTimeRange.<br>$e->getMessage()");
        }

        return $stmt;
    }

    /**
     *
     * Getea la data del datalog dentro de un rango de tiempo con un intervalo (interespaciado) entre cada dato de
     * sensor (es decir, GROUPED BY sensor_id)
     *
     * @param $t_inicio: Limite inferior del rango de tiempo
     * @param $t_fin: Limite superior del rango de tiempo
     * @param $intervalo: Interespaciado entre cada dato de sensor
     * @return \Doctrine\DBAL\Driver\Statement : Retorna el resultado del query SIN fetchear
     */

    public  function getDataInTimeRangeWithInterval($t_inicio, $t_fin, $intervalo) {
        $sqlGetEnsayosInTimeRange = " SELECT sensor_id, medicion, fecha
                                      FROM datalog
                                      WHERE fecha>'$t_inicio' and fecha<'$t_fin'
                                      GROUP BY UNIX_TIMESTAMP(fecha) DIV $intervalo, sensor_id
                                      ORDER BY `datalog`.`fecha`, `datalog`.`sensor_id` ASC ";

        try {
            $em = $this->getEntityManager();
            $stmt = $em->getConnection()->prepare($sqlGetEnsayosInTimeRange);
            $stmt->execute();
        } catch (\Exception $e) {
            throw new NotFoundHttpException("Error al ejecutar query $sqlGetEnsayosInTimeRange.<br>$e->getMessage()");
        }


        //$arrayQueryResult = $stmt->fetchAll();

        return $stmt;
    }


    /**
     *
     * Genera packets con la data del datalog dentro de un rango de tiempo.
     * Es decir no solo hace el query correspondiente sino que arma los packets (si se quisiera) listos para mandar.
     *
     * @param $t_inicio : Limite inferior del rango de tiempo
     * @param $t_fin : Limite superior del rango de tiempo
     * @return array : Devuelve los packets.
     */


    public function getPacketsInTimeRange($t_inicio, $t_fin) {
        $fechaInicio = new \DateTime();
        $fechaInicio = $fechaInicio->createFromFormat('Y-m-d H:i:s', $t_inicio);
        $fechaInicioString = $fechaInicio->format('Y/m/d H:i:s');

        $fechaFin = new \DateTime();
        $fechaFin = $fechaFin->createFromFormat('Y-m-d H:i:s', $t_fin);
        $fechaFinString = $fechaFin->format('Y/m/d H:i:s');


        $sqlGetEnsayosInTimeRange = "SELECT sensor_id, medicion, fecha FROM `datalog` WHERE `fecha`>'$fechaInicioString' AND `fecha`<'$fechaFinString' ";

        try {
            $em = $this->getEntityManager();
            $stmt = $em->getConnection()->prepare($sqlGetEnsayosInTimeRange);
            $stmt->execute();
            $arrayQueryResult = $stmt->fetchAll();
        } catch (\Exception $e) {
            throw new NotFoundHttpException("Error al ejecutar query $sqlGetEnsayosInTimeRange.<br>$e->getMessage()");
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


    /**
     *
     * Genera packets con los canales virtuales.
     * Es decir no solo hace el query correspondiente sino que arma los packets (si se quisiera) listos para mandar.
     *
     * @param string $lastTimeStamp : El timespamp del ultimo valor en clientSide
     *
     * @param array $canalesVirtuales : Array de cada canal virtual. Cada canal virtual, a su vez, consiste en un
     *                                  array con los sensores que lo comprenden
     *
     * @return array : devuelve un array con los packets de los canales virtuales
     */


    public function getCanalesVirtualesPackets( $lastTimeStamp, $canalesVirtuales )
    {


        $arrayRet = [];
        foreach ($canalesVirtuales as $keyCanalVirtual => $canalVirtual) {
            $sqlQueryCanalVirtualX =    "SELECT fecha, AVG(medicion) as promedio
                                        FROM datalog
                                        WHERE fecha>'$lastTimeStamp' AND (";


            $numItems = count($canalVirtual);
            $i = 0;
            foreach($canalVirtual as $keySensor=>$sensor) {
                $sqlQueryCanalVirtualX .= "sensor_id=$sensor";
                if(++$i === $numItems) {
                    $sqlQueryCanalVirtualX .= ") ";
                }
                else {
                    $sqlQueryCanalVirtualX .= " OR ";
                }
            }


            $sqlQueryCanalVirtualX .=   "GROUP BY fecha
                                        ORDER BY sensor_id ASC, fecha ASC";


            try {
                $em = $this->getEntityManager();
                $stmt = $em->getConnection()->prepare($sqlQueryCanalVirtualX);
                $stmt->execute();
            } catch (\Exception $e) {
                throw new NotFoundHttpException("Error al ejecutar query $sqlQueryCanalVirtualX.<br>$e->getMessage()");
            }

            $arrayQueryResult = $stmt->fetchAll();

            if (empty($arrayQueryResult)) {
                throw new NotFoundHttpException("No se encontraron registros en datalog con timestamp: $lastTimeStamp");
            }

            for ($i=0 ; $i< sizeof($arrayQueryResult) ; $i++) {
                $d1 = new \DateTime($arrayQueryResult[$i]['fecha'],new \DateTimeZone("America/Argentina/Buenos_Aires"));
                $arrayQueryResult[$i]['fecha'] = $d1->getTimestamp();
            }


            $arrayChannel = [];
            //Init arrays per channel
            $arrayChannel["packets_v_".$keyCanalVirtual] = [];

            //Push data
            foreach ($arrayQueryResult as $item) {
                $arrayAux = [];
                foreach ($item as $key => $value) {
                    if ( $key == "fecha")
                        $arrayAux["timestamp"] = $value;
                    elseif ( $key == "promedio" )
                        $arrayAux["payloadString"] = $value;
                }
                array_push($arrayChannel["packets_v_".$keyCanalVirtual],$arrayAux);
            }


            $arrayRet = array_merge($arrayRet, $arrayChannel);
        }
        return $arrayRet;
    }
}
