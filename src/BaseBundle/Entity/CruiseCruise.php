<?php

namespace BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CruiseCruise
 *
 * @ORM\Table(name="cruise_cruise", uniqueConstraints={@ORM\UniqueConstraint(name="cruise_cruise_ship_id_code_uniq", columns={"ship_id", "code"})}, indexes={@ORM\Index(name="cruise_cruise_specialOffer_idx", columns={"specialOffer"}), @ORM\Index(name="IDX_7D5C275BC256317D", columns={"ship_id"})})
 * @ORM\Entity
 */
class CruiseCruise
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
     * @ORM\Column(name="code", type="string", length=255, nullable=false)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="route", type="string", length=255, nullable=false)
     */
    private $route;

    /**
     * @var integer
     *
     * @ORM\Column(name="startDate", type="integer", nullable=false)
     */
    private $startdate;

    /**
     * @var integer
     *
     * @ORM\Column(name="endDate", type="integer", nullable=false)
     */
    private $enddate;

    /**
     * @var integer
     *
     * @ORM\Column(name="dayCount", type="integer", nullable=false)
     */
    private $daycount;

    /**
     * @var boolean
     *
     * @ORM\Column(name="specialOffer", type="boolean", nullable=false)
     */
    private $specialoffer;

    /**
     * @var \CruiseShip
     *
     * @ORM\ManyToOne(targetEntity="CruiseShip")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ship_id", referencedColumnName="id")
     * })
     */
    private $ship;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="CruiseCruiseCategory", inversedBy="cruise")
     * @ORM\JoinTable(name="cruise_cruises_categories",
     *   joinColumns={
     *     @ORM\JoinColumn(name="cruise_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="category_id", referencedColumnName="id")
     *   }
     * )
     */
    private $category;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->category = new \Doctrine\Common\Collections\ArrayCollection();
    }

}
