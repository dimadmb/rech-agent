<?php

namespace BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CruiseCruiseCategory
 *
 * @ORM\Table(name="cruise_cruise_category", indexes={@ORM\Index(name="parent_id", columns={"parent_id"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="BaseBundle\Entity\Repository\CruiseCruiseCategoryRepository")
 */
class CruiseCruiseCategory
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
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
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;
	
    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;


    /**
     * @var \CruiseCruiseCategory
     *
     * @ORM\ManyToOne(targetEntity="CruiseCruiseCategory")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parent_id", referencedColumnName="id", onDelete="CASCADE")
     * })
     */
    private $parent;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="CruiseCruise", mappedBy="category")
     */
    private $cruise;

	

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->cruise = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Get id
     *
     * @return string 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return CruiseCruiseCategory
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return CruiseCruiseCategory
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
     * Set parent
     *
     * @param \BaseBundle\Entity\CruiseCruiseCategory $parent
     * @return CruiseCruiseCategory
     */
    public function setParent(\BaseBundle\Entity\CruiseCruiseCategory $parent = null)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return \BaseBundle\Entity\CruiseCruiseCategory 
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Add cruise
     *
     * @param \BaseBundle\Entity\CruiseCruise $cruise
     * @return CruiseCruiseCategory
     */
    public function addCruise(\BaseBundle\Entity\CruiseCruise $cruise)
    {
        $this->cruise[] = $cruise;

        return $this;
    }

    /**
     * Remove cruise
     *
     * @param \BaseBundle\Entity\CruiseCruise $cruise
     */
    public function removeCruise(\BaseBundle\Entity\CruiseCruise $cruise)
    {
        $this->cruise->removeElement($cruise);
    }

    /**
     * Get cruise
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCruise()
    {
        return $this->cruise;
    }

    /**
     * Set code
     *
     * @param string $code
     * @return CruiseCruiseCategory
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
     * Set name
     *
     * @param string $name
     * @return CruiseCruiseCategory
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }
}
