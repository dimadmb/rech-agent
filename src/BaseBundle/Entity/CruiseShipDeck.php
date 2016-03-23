<?php

namespace BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Doctrine\Common\Collections\ArrayCollection;


/**
 * CruiseShipDeck
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class CruiseShipDeck
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
     * @var integer
     * 
     * @ORM\Column(name="deck_id", type="integer")
     */	
	private $deckId;


	/**
	 * @ORM\OneToMany(targetEntity="CruiseShipCabin", mappedBy="deckId")
	 */
	private $cabins;	

	public function __construct() {
		$this->cabins = new ArrayCollection();
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
     * @return CruiseShipDeck
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
     * Add cabins
     *
     * @param \BaseBundle\Entity\CruiseShipCabin $cabins
     * @return CruiseShipDeck
     */
    public function addCabin(\BaseBundle\Entity\CruiseShipCabin $cabins)
    {
        $this->cabins[] = $cabins;

        return $this;
    }

    /**
     * Remove cabins
     *
     * @param \BaseBundle\Entity\CruiseShipCabin $cabins
     */
    public function removeCabin(\BaseBundle\Entity\CruiseShipCabin $cabins)
    {
        $this->cabins->removeElement($cabins);
    }

    /**
     * Get cabins
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCabins()
    {
        return $this->cabins;
    }



    /**
     * Set deckId
     *
     * @param integer $deckId
     * @return CruiseShipDeck
     */
    public function setDeckId($deckId)
    {
        $this->deckId = $deckId;

        return $this;
    }

    /**
     * Get deckId
     *
     * @return integer 
     */
    public function getDeckId()
    {
        return $this->deckId;
    }
}
