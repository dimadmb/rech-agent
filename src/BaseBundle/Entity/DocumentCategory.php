<?php

namespace BaseBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DocumentCategory
 *
 * @ORM\Table(name="document_category", uniqueConstraints={@ORM\UniqueConstraint(name="ment_category_parent_id_level_title_uniq", columns={"parent_id", "level", "title"})}, indexes={@ORM\Index(name="IDX_898DE898727ACA70", columns={"parent_id"})})
 * @ORM\Entity
 */
class DocumentCategory
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
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\Column(name="level", type="integer", nullable=false)
     */
    private $level;

    /**
     * @var integer
     *
     * @ORM\Column(name="ord", type="integer", nullable=false)
     */
    private $ord;

    /**
     * @var string
     *
     * @ORM\Column(name="baseUrl", type="string", length=255, nullable=false)
     */
    private $baseurl;

    /**
     * @var boolean
     *
     * @ORM\Column(name="deletable", type="boolean", nullable=false)
     */
    private $deletable;

    /**
     * @var \DocumentCategory
     *
     * @ORM\ManyToOne(targetEntity="DocumentCategory")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     * })
     */
    private $parent;


}
