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
     * @var string
	 * 
	 * @ORM\Column(name="deck_name", type="string", length=255)
     */	
	private $deck_name	;	
	
	
    /**
     * @var string
	 * 
	 * @ORM\Column(name="rt_name", type="string", length=255)
     */	
	private $rt_name	;
	
    /**
     * @var string
	 * 
	 * @ORM\Column(name="rp_name", type="string", length=255)
     */	
	private $rp_name;

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
     * Set rt_name
     *
     * @param string $rtName
     * @return CruiseShipCabinCruisePrice
     */
    public function setRtName($rtName)
    {
        $this->rt_name = $rtName;

        return $this;
    }

    /**
     * Get rt_name
     *
     * @return string 
     */
    public function getRtName()
    {
        return $this->rt_name;
    }

    /**
     * Set rp_name
     *
     * @param string $rpName
     * @return CruiseShipCabinCruisePrice
     */
    public function setRpName($rpName)
    {
        $this->rp_name = $rpName;

        return $this;
    }

    /**
     * Get rp_name
     *
     * @return string 
     */
    public function getRpName()
    {
        return $this->rp_name;
    }

    /**
     * Set deck_name
     *
     * @param string $deckName
     * @return CruiseShipCabinCruisePrice
     */
    public function setDeckName($deckName)
    {
        $this->deck_name = $deckName;

        return $this;
    }

    /**
     * Get deck_name
     *
     * @return string 
     */
    public function getDeckName()
    {
        return $this->deck_name;
    }
}
