<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categories
 *
 * @ORM\Table(name="categories")
 * @ORM\Entity
 */
class Categories
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="title", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $title;

    /**
     * @var string|null
     *
     * @ORM\Column(name="thumbnail", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $thumbnail;


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title.
     *
     * @param string|null $title
     *
     * @return Categories
     */
    public function setTitle($title = null)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title.
     *
     * @return string|null
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set thumbnail.
     *
     * @param string|null $thumbnail
     *
     * @return Categories
     */
    public function setThumbnail($thumbnail = null)
    {
        $this->thumbnail = $thumbnail;

        return $this;
    }

    /**
     * Get thumbnail.
     *
     * @return string|null
     */
    public function getThumbnail()
    {
        return $this->thumbnail;
    }
}
