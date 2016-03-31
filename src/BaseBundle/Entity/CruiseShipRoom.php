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
     * @var \CruiseShipCabin
     *
     * @ORM\ManyToOne(targetEntity="CruiseShipCabin", inversedBy="rooms" )
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cabin_id", referencedColumnName="id" , onDelete="CASCADE" )
     * })
     */
    private $cabin;



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

    /**
     * Set cabin
     *
     * @param \BaseBundle\Entity\CruiseShipCabin $cabin
     * @return CruiseShipRoom
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
}
