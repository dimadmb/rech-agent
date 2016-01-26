<?php

namespace BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

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
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=false)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var \CruiseShip
     *
     * @ORM\ManyToOne(targetEntity="CruiseShip")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ship_id", referencedColumnName="id")
     * })
     */
    private $ship;


}
