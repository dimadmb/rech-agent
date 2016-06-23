<?php

namespace BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * CruiseMeals
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class CruiseMeals
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="CruiseShipCabinCruisePrice", mappedBy="meals")
     */
    protected $prices;

    public function __construct()
    {
        $this->prices = new ArrayCollection();
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

    /**
     * Set name
     *
     * @param string $name
     * @return CruiseMeals
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set prices
     *
     * @param integer $prices
     * @return CruiseMeals
     */
    public function setPrices($prices)
    {
        $this->prices = $prices;

        return $this;
    }

    /**
     * Get prices
     *
     * @return integer 
     */
    public function getPrices()
    {
        return $this->prices;
    }

    /**
     * Add prices
     *
     * @param \BaseBundle\Entity\CruiseShipCabinCruisePrice $prices
     * @return CruiseMeals
     */
    public function addPrice(\BaseBundle\Entity\CruiseShipCabinCruisePrice $prices)
    {
        $this->prices[] = $prices;

        return $this;
    }

    /**
     * Remove prices
     *
     * @param \BaseBundle\Entity\CruiseShipCabinCruisePrice $prices
     */
    public function removePrice(\BaseBundle\Entity\CruiseShipCabinCruisePrice $prices)
    {
        $this->prices->removeElement($prices);
    }
}
