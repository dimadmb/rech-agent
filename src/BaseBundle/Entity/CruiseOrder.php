<?php

namespace BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CruiseOrder
 *
 * @ORM\Table(name="cruise_order")
 * @ORM\Entity
 */
class CruiseOrder
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
     * @ORM\Column(name="phone", type="string", length=255, nullable=false)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="comments", type="string", length=255, nullable=false)
     */
    private $comments;

    /**
     * @var integer
     *
     * @ORM\Column(name="date", type="integer", nullable=false)
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="shipName", type="string", length=255, nullable=true)
     */
    private $shipname;

    /**
     * @var string
     *
     * @ORM\Column(name="shipCode", type="string", length=255, nullable=true)
     */
    private $shipcode;

    /**
     * @var string
     *
     * @ORM\Column(name="cruiseCode", type="string", length=255, nullable=true)
     */
    private $cruisecode;

    /**
     * @var integer
     *
     * @ORM\Column(name="startDate", type="integer", nullable=true)
     */
    private $startdate;

    /**
     * @var integer
     *
     * @ORM\Column(name="endDate", type="integer", nullable=true)
     */
    private $enddate;

    /**
     * @var string
     *
     * @ORM\Column(name="cruiseDescription", type="string", length=255, nullable=true)
     */
    private $cruisedescription;


}
