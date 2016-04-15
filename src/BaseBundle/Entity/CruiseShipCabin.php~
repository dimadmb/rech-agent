<?php

namespace BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Doctrine\Common\Collections\ArrayCollection;

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
     * @var \CruiseShip
     *
     * @ORM\ManyToOne(targetEntity="CruiseShip", inversedBy="cabins")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ship_id", onDelete="CASCADE", referencedColumnName="id")
     * })
     */
    private $ship;



	/**
     * @ORM\ManyToOne(targetEntity="CruiseShipCabinType", inversedBy="cabins")
     * @ORM\JoinColumn(name="rt_id", referencedColumnName="id")	 
     */	
    private $rtId;

	
	/**
     * @ORM\ManyToOne(targetEntity="CruiseShipDeck", inversedBy="cabins")
     * @ORM\JoinColumn(name="deck_id", referencedColumnName="id")	 
     */	
    private $deckId;
	

	/**
	 * @ORM\OneToMany(targetEntity="CruiseShipCabinCruisePrice", mappedBy="cabin")
	 */
	private $prices;
	
	
	/**
	 * @ORM\OneToMany(targetEntity="CruiseShipRoom", mappedBy="cabin")
	 */
	private $rooms;	
	
	
	public function __construct() {
		$this->prices = new ArrayCollection();
		$this->rooms = new ArrayCollection();
	}

	public function init(CruiseShip $ship) {
		$this->ship = $ship;
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

    /**
     * Add prices
     *
     * @param \BaseBundle\Entity\CruiseShipCabinCruisePrice $prices
     * @return CruiseShipCabin
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
	 * @return the $prices
	 */
	public function getPrice(CruiseCruise $cruise) {
		return $this->getPriceInternal($cruise);
	}
	
	/**
	 * @return the $prices
	 */
	private function getPriceInternal(CruiseCruise $cruise) {
		foreach ($this->prices as $price) {
			if ($price->getCruise() == $cruise) {
				return $price;
			}
		}
		$price = new CruiseShipCabinCruisePrice();
		$price->init($this, $cruise);
		$this->prices->add($price);
		return $price;
	}	
	
	
	/**
	 * @param $prices the $prices to set
	 */
	public function setPrice(CruiseCruise $cruise, $price) {
		$cruisePrice = $this->getPrice($cruise);
		$cruisePrice->setPrice($price);
		return $cruisePrice;
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









    /**
     * Set rtId
     *
     * @param \BaseBundle\Entity\CruiseShipCabinType $rtId
     * @return CruiseShipCabin
     */
    public function setRtId(\BaseBundle\Entity\CruiseShipCabinType $rtId = null)
    {
        $this->rtId = $rtId;

        return $this;
    }

    /**
     * Get rtId
     *
     * @return \BaseBundle\Entity\CruiseShipCabinType 
     */
    public function getRtId()
    {
        return $this->rtId;
    }

    /**
     * Set deckId
     *
     * @param \BaseBundle\Entity\CruiseShipDeck $deckId
     * @return CruiseShipCabin
     */
    public function setDeckId(\BaseBundle\Entity\CruiseShipDeck $deckId = null)
    {
        $this->deckId = $deckId;

        return $this;
    }

    /**
     * Get deckId
     *
     * @return \BaseBundle\Entity\CruiseShipDeck 
     */
    public function getDeckId()
    {
        return $this->deckId;
    }

    /**
     * Add rooms
     *
     * @param \BaseBundle\Entity\CruiseShipRoom $rooms
     * @return CruiseShipCabin
     */
    public function addRoom(\BaseBundle\Entity\CruiseShipRoom $rooms)
    {
        $rooms->setCabin($this);
		
		$this->rooms[] = $rooms;
		
        return $this;
    }

    /**
     * Remove rooms
     *
     * @param \BaseBundle\Entity\CruiseShipRoom $rooms
     */
    public function removeRoom(\BaseBundle\Entity\CruiseShipRoom $rooms)
    {
        $this->rooms->removeElement($rooms);
    }

    /**
     * Get rooms
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getRooms()
    {
        return $this->rooms;
    }
}
