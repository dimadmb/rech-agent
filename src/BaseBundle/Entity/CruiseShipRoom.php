<?php

namespace BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CruiseShipRoom
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class CruiseShipRoom
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
     * @ORM\ManyToOne(targetEntity="CruiseShipRoomProp")
     * @ORM\JoinColumn(name="room_id", referencedColumnName="room_id")
     */
    private $roomId;

    /**
     * @var string
     *
     * @ORM\Column(name="room_number", type="string", length=255)
     */
    private $roomNumber;

    /**
     * @ORM\ManyToOne(targetEntity="CruiseShipCabinType")
     * @ORM\JoinColumn(name="rt_id", referencedColumnName="id")	
     */
    private $rtId;

    /**
 
     * @ORM\ManyToOne(targetEntity="CruiseShipDeck")
     * @ORM\JoinColumn(name="deck_id", referencedColumnName="id")	
     */
    private $deckId;

    /**
     * @var integer
     *
     * @ORM\Column(name="ship_id", type="integer")
     */
    private $shipId;




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
     * Set roomNumber
     *
     * @param string $roomNumber
     * @return CruiseShipRoom
     */
    public function setRoomNumber($roomNumber)
    {
        $this->roomNumber = $roomNumber;

        return $this;
    }

    /**
     * Get roomNumber
     *
     * @return string 
     */
    public function getRoomNumber()
    {
        return $this->roomNumber;
    }

    /**
     * Set rtId
     *
     * @param integer $rtId
     * @return CruiseShipRoom
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
     * Set deckId
     *
     * @param integer $deckId
     * @return CruiseShipRoom
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

    /**
     * Set shipId
     *
     * @param integer $shipId
     * @return CruiseShipRoom
     */
    public function setShipId($shipId)
    {
        $this->shipId = $shipId;

        return $this;
    }

    /**
     * Get shipId
     *
     * @return integer 
     */
    public function getShipId()
    {
        return $this->shipId;
    }



    /**
     * Set roomId
     *
     * @param \BaseBundle\Entity\CruiseShipRoomProp $roomId
     * @return CruiseShipRoom
     */
    public function setRoomId(\BaseBundle\Entity\CruiseShipRoomProp $roomId = null)
    {
        $this->roomId = $roomId;

        return $this;
    }

    /**
     * Get roomId
     *
     * @return \BaseBundle\Entity\CruiseShipRoomProp 
     */
    public function getRoomId()
    {
        return $this->roomId;
    }
}
