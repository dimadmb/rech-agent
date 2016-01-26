<?php

namespace BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CruiseShip
 *
 * @ORM\Table(name="cruise_ship", uniqueConstraints={@ORM\UniqueConstraint(name="cruise_ship_code_uniq", columns={"code"})}, indexes={@ORM\Index(name="cruise_ship_class_idx", columns={"class"})})
 * @ORM\Entity
 */
class CruiseShip
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
     * @ORM\Column(name="code", type="string", length=255, nullable=false)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="properties", type="text", nullable=false)
     */
    private $properties;

    /**
     * @var string
     *
     * @ORM\Column(name="imgUrl", type="string", length=255, nullable=false)
     */
    private $imgurl;

    /**
     * @var \CruiseShipClass
     *
     * @ORM\ManyToOne(targetEntity="CruiseShipClass")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="class", referencedColumnName="id")
     * })
     */
    private $class;


}
