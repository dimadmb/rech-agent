<?php

namespace BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * ShipCabinType
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class CruiseShipCabinType
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
     * @ORM\Column(name="rt_id", type="integer")
     */
    private $rtId;

    /**
     * @var string
     *
     * @ORM\Column(name="rt_name", type="string", length=255)
     */
    private $rtName;

    /**
     * @var string
     *
     * @ORM\Column(name="rt_comment", type="string", length=255)
     */
    private $rtComment;

	
	/**
	 * @ORM\OneToMany(targetEntity="CruiseShipCabin", mappedBy="rtId")
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
     * Set rtId
     *
     * @param integer $rtId
     * @return ShipCabinType
     */
    public function setRtId($rtId)
    {
        $this->rtId = $rtId;

        return $this;
    }

    /**
     * Get rtId
     *
     * @return integer 
     */
    public function getRtId()
    {
        return $this->rtId;
    }

    /**
     * Set rtName
     *
     * @param string $rtName
     * @return ShipCabinType
     */
    public function setRtName($rtName)
    {
        $this->rtName = $rtName;

        return $this;
    }

    /**
     * Get rtName
     *
     * @return string 
     */
    public function getRtName()
    {
        return $this->rtName;
    }

    /**
     * Set rtComment
     *
     * @param string $rtComment
     * @return ShipCabinType
     */
    public function setRtComment($rtComment)
    {
        $this->rtComment = $rtComment;

        return $this;
    }

    /**
     * Get rtComment
     *
     * @return string 
     */
    public function getRtComment()
    {
        return $this->rtComment;
    }

    /**
     * Add cabins
     *
     * @param \BaseBundle\Entity\CruiseShipCabin $cabins
     * @return CruiseShipCabinType
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
}