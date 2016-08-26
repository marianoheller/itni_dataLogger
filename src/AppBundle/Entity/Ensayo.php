<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Ensayo
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EnsayoRepository")
 */
class Ensayo
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titulo", type="string", length=100)
     * @Assert\NotBlank()
     */
    private $titulo;

    /**
     * @var string
     *
     * @ORM\Column(name="responsable", type="string", length=100)
     * @Assert\NotBlank()
     */
    private $responsable;

    /**
     * @var string
     *
     * @ORM\Column(name="cliente", type="string", length=100)
     */
    private $cliente;

    /**
     * @var integer
     *
     * @ORM\Column(name="OT", type="integer")
     */
    private $oT;

    /**
     * @var integer
     *
     * @ORM\Column(name="SOT", type="integer")
     */
    private $sOT;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="text")
     */
    private $descripcion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="t_inicio", type="datetime", unique=true)
     */
    private $tInicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="t_fin", type="datetime", nullable=true,  options={"default":NULL} )
     */
    private $tFin;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="lastPing", type="datetime")
     */
    private $lastPing;


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
     * Set titulo
     *
     * @param string $titulo
     *
     * @return Ensayo
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get titulo
     *
     * @return string
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set responsable
     *
     * @param string $responsable
     *
     * @return Ensayo
     */
    public function setResponsable($responsable)
    {
        $this->responsable = $responsable;

        return $this;
    }

    /**
     * Get responsable
     *
     * @return string
     */
    public function getResponsable()
    {
        return $this->responsable;
    }

    /**
     * Set cliente
     *
     * @param string $cliente
     *
     * @return Ensayo
     */
    public function setCliente($cliente)
    {
        $this->cliente = $cliente;

        return $this;
    }

    /**
     * Get cliente
     *
     * @return string
     */
    public function getCliente()
    {
        return $this->cliente;
    }

    /**
     * Set oT
     *
     * @param integer $oT
     *
     * @return Ensayo
     */
    public function setOT($oT)
    {
        $this->oT = $oT;

        return $this;
    }

    /**
     * Get oT
     *
     * @return integer
     */
    public function getOT()
    {
        return $this->oT;
    }

    /**
     * Set sOT
     *
     * @param integer $sOT
     *
     * @return Ensayo
     */
    public function setSOT($sOT)
    {
        $this->sOT = $sOT;

        return $this;
    }

    /**
     * Get sOT
     *
     * @return integer
     */
    public function getSOT()
    {
        return $this->sOT;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Ensayo
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set tInicio
     *
     * @param \DateTime $tInicio
     *
     * @return Ensayo
     */
    public function setTInicio($tInicio)
    {
        $this->tInicio = $tInicio;

        return $this;
    }

    /**
     * Get tInicio
     *
     * @return \DateTime
     */
    public function getTInicio()
    {
        return $this->tInicio;
    }

    /**
     * Set tFin
     *
     * @param \DateTime $tFin
     *
     * @return Ensayo
     */
    public function setTFin($tFin = null)
    {
        $this->tFin = $tFin;

        return $this;
    }

    /**
     * Get tFin
     *
     * @return \DateTime
     */
    public function getTFin()
    {
        return $this->tFin;
    }

    /**
     * Set lastPing
     *
     * @param \DateTime $lastPing
     *
     * @return Ensayo
     */
    public function setLastPing($lastPing)
    {
        $this->lastPing = $lastPing;

        return $this;
    }

    /**
     * Get lastPing
     *
     * @return \DateTime
     */
    public function getLastPing()
    {
        return $this->lastPing;
    }


}

