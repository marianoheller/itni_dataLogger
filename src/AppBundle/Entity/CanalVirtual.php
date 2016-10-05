<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Canal Virtual
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CanalVirtualRepository")
 */
class CanalVirtual
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
     * @ORM\ManyToOne(targetEntity="Ensayo", inversedBy="canalVirtual")
     * @ORM\JoinColumn(name="ensayo_id", referencedColumnName="id")
     */
    private $ensayo;


    /**
     * @ORM\ManyToMany(targetEntity="Sensor", inversedBy="canalesVirtuales")
     * @ORM\JoinTable(name="canalesVirtuales_sensores")
     */
    private $sensores;

    public function __construct() {
        $this->sensores = new \Doctrine\Common\Collections\ArrayCollection();
    }




    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

}

