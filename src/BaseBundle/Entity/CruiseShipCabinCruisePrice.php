<?php

namespace BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CruiseShipCabinCruisePrice
 *
 * @ORM\Table(name="cruise_ship_cabin_cruise_price", indexes={@ORM\Index(name="cabin_id", columns={"cabin_id"}), @ORM\Index(name="cruise_id", columns={"cruise_id"})})
 * @ORM\Entity
 */
class CruiseShipCabinCruisePrice
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
     * @ORM\Column(name="price", type="decimal", precision=10, scale=0, nullable=false)
     */
    private $price;
	

	
    /**
     * @var \CruiseShipCabinPlace
	 * 
	 * @ORM\ManyToOne(targetEntity="CruiseShipCabinPlace", inversedBy="prices" )
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="rp_id", referencedColumnName="id"  )
     * })	 
     */	
	private $rp_id;

    /**
     * @var \CruiseShipCabin
     *
     * @ORM\ManyToOne(targetEntity="CruiseShipCabin", inversedBy="prices" )
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cabin_id", referencedColumnName="id" , onDelete="CASCADE" )
     * })
     */
    private $cabin;

    /**
     * @var \CruiseCruise
     *
     * @ORM\ManyToOne(targetEntity="CruiseCruise", inversedBy="prices")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cruise_id", referencedColumnName="id" , onDelete="CASCADE" )
     * })
     */
    private $cruise;

	/**
	* @var \CruiseTariff
	* @ORM\ManyToOne(targetEntity="CruiseTariff", inversedBy="prices")
	* @ORM\JoinColumn(name="tariff_id", referencedColumnName="id")
	*/
	private $tariff;
	
	public function init(CruiseShipCabin $cabin, CruiseCruise $cruise) {
		$this->cabin = $cabin;
		$this->cruise = $cruise;
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
     * Set price
     *
     * @param string $price
     * @return CruiseShipCabinCruisePrice
     */
    public function setPrice($price)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * Get price
     *
     * @return string 
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Set cabin
     *
     * @param \BaseBundle\Entity\CruiseShipCabin $cabin
     * @return CruiseShipCabinCruisePrice
     */
    public function setCabin(\BaseBundle\Entity\CruiseShipCabin $cabin = null)
    {
        $this->cabin = $cabin;

        return $this;
    }

    /**
     * Get cabin
     *
     * @return \BaseBundle\Entity\CruiseShipCabin 
     */
    public function getCabin()
    {
        return $this->cabin;
    }

    /**
     * Set cruise
     *
     * @param \BaseBundle\Entity\CruiseCruise $cruise
     * @return CruiseShipCabinCruisePrice
     */
    public function setCruise(\BaseBundle\Entity\CruiseCruise $cruise = null)
    {
        $this->cruise = $cruise;

        return $this;
    }

    /**
     * Get cruise
     *
     * @return \BaseBundle\Entity\CruiseCruise 
     */
    public function getCruise()
    {
        return $this->cruise;
    }

    /**
     * Set tariff
     *
     * @param \BaseBundle\Entity\CruiseTariff $tariff
     * @return CruiseShipCabinCruisePrice
     */
    public function setTariff(\BaseBundle\Entity\CruiseTariff $tariff = null)
    {
        $this->tariff = $tariff;

        return $this;
    }

    /**
     * Get tariff
     *
     * @return \BaseBundle\Entity\CruiseTariff 
     */
    public function getTariff()
    {
        return $this->tariff;
    }







    /**
     * Set rp_id
     *
     * @param integer $rpId
     * @return CruiseShipCabinCruisePrice
     */
    public function setRpId($rpId)
    {
        $this->rp_id = $rpId;

        return $this;
    }

    /**
     * Get rp_id
     *
     * @return integer 
     */
    public function getRpId()
    {
        return $this->rp_id;
    }
}
