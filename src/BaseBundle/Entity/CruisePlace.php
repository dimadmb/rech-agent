<?php

namespace BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CruisePlace
 *
 * @ORM\Table(name="cruise_place", uniqueConstraints={@ORM\UniqueConstraint(name="cruise_place_url_type_uniq", columns={"url", "type"})})
 * @ORM\Entity
 */
class CruisePlace
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
     * @ORM\Column(name="type", type="string", length=3, nullable=false)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=false)
     */
    private $url;

    /**
     * @var boolean
     *
     * @ORM\Column(name="searcheable", type="boolean", nullable=false)
     */
    private $searcheable;

    /**
     * @var boolean
     *
     * @ORM\Column(name="pageable", type="boolean", nullable=false)
     */
    private $pageable;


}
