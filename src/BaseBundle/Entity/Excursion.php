<?php

namespace BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Excursion
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Excursion
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
     * @var integer
     *
     * @ORM\Column(name="excursion_id", type="integer")
     */
    private $excursionId;

    /**
     * @var integer
     *
     * @ORM\Column(name="port_id", type="integer")
     */
    private $portId;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;


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
     * Set excursionId
     *
     * @param integer $excursionId
     * @return Excursion
     */
    public function setExcursionId($excursionId)
    {
        $this->excursionId = $excursionId;

        return $this;
    }

    /**
     * Get excursionId
     *
     * @return integer 
     */
    public function getExcursionId()
    {
        return $this->excursionId;
    }

    /**
     * Set portId
     *
     * @param integer $portId
     * @return Excursion
     */
    public function setPortId($portId)
    {
        $this->portId = $portId;

        return $this;
    }

    /**
     * Get portId
     *
     * @return integer 
     */
    public function getPortId()
    {
        return $this->portId;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Excursion
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

    /**
     * Set description
     *
     * @param string $description
     * @return Excursion
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
}
