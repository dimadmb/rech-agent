<?php

namespace BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CruiseShipCabinPlace
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class CruiseShipCabinPlace
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
     * @var integer
     *
     * @ORM\Column(name="rp_id", type="integer")
     */
    private $rpId;

    /**
     * @var string
     *
     * @ORM\Column(name="rp_name", type="string", length=255)
     */
    private $rpName;

	/**
	 * @ORM\OneToMany(targetEntity="CruiseShipCabinCruisePrice", mappedBy="rp_id")
	 */	
	private $prices;
	
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
     * Set rpId
     *
     * @param integer $rpId
     * @return CruiseShipCabinPlace
     */
    public function setRpId($rpId)
    {
        $this->rpId = $rpId;

        return $this;
    }

    /**
     * Get rpId
     *
     * @return integer 
     */
    public function getRpId()
    {
        return $this->rpId;
    }

    /**
     * Set rpName
     *
     * @param string $rpName
     * @return CruiseShipCabinPlace
     */
    public function setRpName($rpName)
    {
        $this->rpName = $rpName;

        return $this;
    }

    /**
     * Get rpName
     *
     * @return string 
     */
    public function getRpName()
    {
        return $this->rpName;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->prices = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add prices
     *
     * @param \BaseBundle\Entity\CruiseShipCabinCruisePrice $prices
     * @return CruiseShipCabinPlace
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

    /**
     * Get prices
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPrices()
    {
        return $this->prices;
    }
}
