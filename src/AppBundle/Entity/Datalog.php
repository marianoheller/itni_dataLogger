<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Datalog
 *
 * @ORM\Table(name="datalog")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DatalogRepository")
 */
class Datalog
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="sensor_id", type="integer")
     */
    private $sensorId;

    /**
     * @var string
     *
     * @ORM\Column(name="medicion", type="decimal", precision=10, scale=5)
     */
    private $medicion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date")
     */
    private $fecha;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="hora", type="time")
     */
    private $hora;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set sensorId
     *
     * @param integer $sensorId
     * @return Datalog
     */
    public function setSensorId($sensorId)
    {
        $this->sensorId = $sensorId;

        return $this;
    }

    /**
     * Get sensorId
     *
     * @return integer 
     */
    public function getSensorId()
    {
        return $this->sensorId;
    }

    /**
     * Set medicion
     *
     * @param string $medicion
     * @return Datalog
     */
    public function setMedicion($medicion)
    {
        $this->medicion = $medicion;

        return $this;
    }

    /**
     * Get medicion
     *
     * @return string 
     */
    public function getMedicion()
    {
        return $this->medicion;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     * @return Datalog
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime 
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set hora
     *
     * @param \DateTime $hora
     * @return Datalog
     */
    public function setHora($hora)
    {
        $this->hora = $hora;

        return $this;
    }

    /**
     * Get hora
     *
     * @return \DateTime 
     */
    public function getHora()
    {
        return $this->hora;
    }
}
