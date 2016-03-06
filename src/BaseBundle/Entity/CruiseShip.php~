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
     * @ORM\ManyToOne(targetEntity="CruiseShipClass" , inversedBy="ships")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="class", referencedColumnName="id")
     * })
     */
    private $class;



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
     * Set title
     *
     * @param string $title
     * @return CruiseShip
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
     * Set code
     *
     * @param string $code
     * @return CruiseShip
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
     * Set properties
     *
     * @param string $properties
     * @return CruiseShip
     */
    public function setProperties($properties)
    {
        $this->properties = $properties;
		
        return $this;
    }

    /**
     * Get properties
     *
     * @return string 
     */
    public function getProperties()
    {
        //return $this->properties;
		return json_decode($this->properties);
    }

    /**
     * Set imgurl
     *
     * @param string $imgurl
     * @return CruiseShip
     */
    public function setImgurl($imgurl)
    {
        $this->imgurl = $imgurl;

        return $this;
    }

    /**
     * Get imgurl
     *
     * @return string 
     */
    public function getImgurl()
    {
        return $this->imgurl;
    }

    /**
     * Set class
     *
     * @param \BaseBundle\Entity\CruiseShipClass $class
     * @return CruiseShip
     */
    public function setClass(\BaseBundle\Entity\CruiseShipClass $class = null)
    {
        $this->class = $class;

        return $this;
    }

    /**
     * Get class
     *
     * @return \BaseBundle\Entity\CruiseShipClass 
     */
    public function getClass()
    {
        return $this->class;
    }
}
