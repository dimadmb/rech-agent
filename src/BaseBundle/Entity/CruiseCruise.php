<?php

namespace BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;  //необязательно

/**
 * CruiseCruise
 *
 * @ORM\Table(name="cruise_cruise", uniqueConstraints={@ORM\UniqueConstraint(name="cruise_cruise_ship_id_code_uniq", columns={"ship_id", "code"})}, indexes={ @ORM\Index(name="IDX_7D5C275BC256317D", columns={"ship_id"}), @ORM\Index(name="code", columns={"code"})})
 * @ORM\Entity(repositoryClass="BaseBundle\Entity\Repository\CruiseCruiseRepository")
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
     * @ORM\OneToOne(targetEntity="CruiseCruiseSpec")
     * @ORM\JoinColumn(name="code", referencedColumnName="code", nullable=true)
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
     * @var string
     *
     * @ORM\Column(name="tur_operator", type="string", length=255, nullable=true)
     */
    private $turOperator;

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
     * @var \CruiseShip
     *
     * @ORM\ManyToOne(targetEntity="CruiseShip" , inversedBy="cruises")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ship_id", onDelete="CASCADE", referencedColumnName="id")
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
	 
	/**
	 * @ORM\OneToMany(targetEntity="CruiseShipCabinCruisePrice", mappedBy="cruise")
	 */
	private $prices;	 


	/**
     * @ORM\OneToMany(targetEntity="CruiseCruiseProgramItem", mappedBy="cruise")
     */
	private $programItems;	

	/**
	 * @ORM\ManyToMany(targetEntity="CruiseCruiseCategory", inversedBy="cruise")
	 * @ORM\JoinTable(name="cruise_cruises_categories", joinColumns={@ORM\JoinColumn(name="cruise_id",
		referencedColumnName="id", onDelete="CASCADE")},
	 * inverseJoinColumns={@ORM\JoinColumn(name="category_id",
	referencedColumnName="id")})
	 */	
    private $category;
	
	
	


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->category = new ArrayCollection();
		$this->programItems = new ArrayCollection();
    }

	public function init(CruiseShip $ship, ArrayCollection $categories) {
		$this->ship = $ship;
		$this->category = $categories;
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
     * Set code
     *
     * @param string $code
     * @return CruiseCruise
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return CruiseCruise
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set route
     *
     * @param string $route
     * @return CruiseCruise
     */
    public function setRoute($route)
    {
        $this->route = $route;

        return $this;
    }

    /**
     * Get route
     *
     * @return string 
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * Set startdate
     *
     * @param integer $startdate
     * @return CruiseCruise
     */
    public function setStartdate($startdate)
    {
        $this->startdate = $startdate;

        return $this;
    }

    /**
     * Get startdate
     *
     * @return integer 
     */
    public function getStartdate()
    {
        return $this->startdate;
    }

    /**
     * Set enddate
     *
     * @param integer $enddate
     * @return CruiseCruise
     */
    public function setEnddate($enddate)
    {
        $this->enddate = $enddate;

        return $this;
    }

    /**
     * Get enddate
     *
     * @return integer 
     */
    public function getEnddate()
    {
        return $this->enddate;
    }

    /**
     * Set daycount
     *
     * @param integer $daycount
     * @return CruiseCruise
     */
    public function setDaycount($daycount)
    {
        $this->daycount = $daycount;

        return $this;
    }

    /**
     * Get daycount
     *
     * @return integer 
     */
    public function getDaycount()
    {
        return $this->daycount;
    }


    /**
     * Set ship
     *
     * @param \BaseBundle\Entity\CruiseShip $ship
     * @return CruiseCruise
     */
    public function setShip(\BaseBundle\Entity\CruiseShip $ship = null)
    {
        $this->ship = $ship;

        return $this;
    }

    /**
     * Get ship
     *
     * @return \BaseBundle\Entity\CruiseShip 
     */
    public function getShip()
    {
        return $this->ship;
    }

	public function getMinPrice() {
		$res = 0;
		foreach ($this->prices as $price) {
			$pr = $price->getPrice();
			if ($res == 0 || ($pr != 0 && $pr < $res)) {
				$res = $pr;
			}
		}
		return $res;
	}	
	
    /**
     * Add category
     *
     * @param \BaseBundle\Entity\CruiseCruiseCategory $category
     * @return CruiseCruise
     */
    public function addCategory(\BaseBundle\Entity\CruiseCruiseCategory $category)
    {
        $this->category[] = $category;

        return $this;
    }

    /**
     * Remove category
     *
     * @param \BaseBundle\Entity\CruiseCruiseCategory $category
     */
    public function removeCategory(\BaseBundle\Entity\CruiseCruiseCategory $category)
    {
        $this->category->removeElement($category);
    }

    /**
     * Get category
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Add prices
     *
     * @param \BaseBundle\Entity\CruiseShipCabinCruisePrice $prices
     * @return CruiseCruise
     */
    public function addPrice(\BaseBundle\Entity\CruiseShipCabinCruisePrice $prices)
    {
        $this->prices[] = $prices;

        return $this;
    }

    /**
     * Remove prices
     *
     * @param \BaseBundle\Entity\CruiseShipCabinCruisePrice $prices
     */
    public function removePrice(\BaseBundle\Entity\CruiseShipCabinCruisePrice $prices)
    {
        $this->prices->removeElement($prices);
    }

	
    /**
     * Get prices
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPrices()
    {
        return $this->prices;
    }

	
	
	/**
	 * @param $programItems the $programItems to set
	 */
	public function addProgramItem(CruisePlace $place = null) {
		$programItem = new CruiseCruiseProgramItem();
		$programItem->init($this, $place);
		$this->programItems->add($programItem);
		return $programItem;
	}	
	

    /**
     * Remove programItems
     *
     * @param \BaseBundle\Entity\CruiseCruiseProgramItem $programItems
     */
    public function removeProgramItem(\BaseBundle\Entity\CruiseCruiseProgramItem $programItems)
    {
        $this->programItems->removeElement($programItems);
    }

    /**
     * Get programItems
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProgramItems()
    {
        return $this->programItems;
    }





    /**
     * Set turOperator
     *
     * @param string $turOperator
     * @return CruiseCruise
     */
    public function setTurOperator($turOperator)
    {
        $this->turOperator = $turOperator;

        return $this;
    }

    /**
     * Get turOperator
     *
     * @return string 
     */
    public function getTurOperator()
    {
        return $this->turOperator;
    }
}
