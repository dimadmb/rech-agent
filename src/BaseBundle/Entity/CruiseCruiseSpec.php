<?php

namespace BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CruiseCruiseSpec
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class CruiseCruiseSpec
{
    /**
     * @ORM\Id 
     * @ORM\Column(name="code",type="integer")
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $code;

    /**
     * @var integer
     *
     * @ORM\Column(name="specialOffer", type="integer")
     */
    private $specialOffer;

    /**
     * @var integer
     *
     * @ORM\Column(name="burningCruise", type="integer")
     */
    private $burningCruise;

    /**
     * @var integer
     *
     * @ORM\Column(name="reductionPrice", type="integer")
     */
    private $reductionPrice;



    /**
     * Set code
     *
     * @param integer $code
     * @return CruiseCruiseSpec
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return integer 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set specialOffer
     *
     * @param integer $specialOffer
     * @return CruiseCruiseSpec
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
     * Set burningCruise
     *
     * @param integer $burningCruise
     * @return CruiseCruiseSpec
     */
    public function setBurningCruise($burningCruise)
    {
        $this->burningCruise = $burningCruise;

        return $this;
    }

    /**
     * Get burningCruise
     *
     * @return integer 
     */
    public function getBurningCruise()
    {
        return $this->burningCruise;
    }

    /**
     * Set reductionPrice
     *
     * @param integer $reductionPrice
     * @return CruiseCruiseSpec
     */
    public function setReductionPrice($reductionPrice)
    {
        $this->reductionPrice = $reductionPrice;

        return $this;
    }

    /**
     * Get reductionPrice
     *
     * @return integer 
     */
    public function getReductionPrice()
    {
        return $this->reductionPrice;
    }
}
