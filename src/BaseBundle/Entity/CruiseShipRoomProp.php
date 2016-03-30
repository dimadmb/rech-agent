<?php

namespace BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CruiseShipRoomProp
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class CruiseShipRoomProp
{
    /**
     * @var integer
     *
     * @ORM\Column(name="room_id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $room_id;

    /**
     * @var integer
     *
     * @ORM\Column(name="specialOffer", type="integer")
     */
    private $specialOffer;





    /**
     * Set specialOffer
     *
     * @param integer $specialOffer
     * @return CruiseShipRoomProp
     */
    public function setSpecialOffer($specialOffer)
    {
        $this->specialOffer = $specialOffer;

        return $this;
    }

    /**
     * Get specialOffer
     *
     * @return integer 
     */
    public function getSpecialOffer()
    {
        return $this->specialOffer;
    }

    /**
     * Set room_id
     *
     * @param integer $roomId
     * @return CruiseShipRoomProp
     */
    public function setRoomId($roomId)
    {
        $this->room_id = $roomId;

        return $this;
    }

    /**
     * Get room_id
     *
     * @return integer 
     */
    public function getRoomId()
    {
        return $this->room_id;
    }
}
