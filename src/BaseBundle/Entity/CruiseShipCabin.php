<?php

namespace BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CruiseShipCabin
 *
 * @ORM\Table(name="cruise_ship_cabin", indexes={@ORM\Index(name="ship_id", columns={"ship_id"})})
 * @ORM\Entity
 */
class CruiseShipCabin
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var \CruiseShip
     *
     * @ORM\ManyToOne(targetEntity="CruiseShip")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ship_id", referencedColumnName="id")
     * })
     */
    private $ship;



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
     * Set title
     *
     * @param string $title
     * @return CruiseShipCabin
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return CruiseShipCabin
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set ship
     *
     * @param \BaseBundle\Entity\CruiseShip $ship
     * @return CruiseShipCabin
     */
    public function setShip(\BaseBundle\Entity\CruiseShip $ship = null)
    {
        $this->ship = $ship;

        return $this;
    }

    /**
     * Get ship
     *
     * @return \BaseBundle\Entity\CruiseShip 
     */
    public function getShip()
    {
        return $this->ship;
    }
}
