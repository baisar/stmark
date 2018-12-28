<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pages
 *
 * @ORM\Table(name="pages", indexes={@ORM\Index(name="category", columns={"category"})})
 * @ORM\Entity
 */
class Pages
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
     * @var string
     *
     * @ORM\Column(name="title", type="text", length=65535, precision=0, scale=0, nullable=false, unique=false)
     */
    private $title;

    /**
     * @var string|null
     *
     * @ORM\Column(name="short", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $short;

    /**
     * @var string|null
     *
     * @ORM\Column(name="content", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $content;

    /**
     * @var string|null
     *
     * @ORM\Column(name="thumbnail", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $thumbnail;

    /**
     * @var \DateTime|null
     *
     * @ORM\Column(name="date", type="datetime", precision=0, scale=0, nullable=true, unique=false)
     */
    private $date;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="service", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $service;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="news", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $news;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="apply", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $apply;

    /**
     * @var bool|null
     *
     * @ORM\Column(name="hidden", type="boolean", precision=0, scale=0, nullable=true, unique=false)
     */
    private $hidden;

    /**
     * @var string|null
     *
     * @ORM\Column(name="text5", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $text5;

    /**
     * @var string|null
     *
     * @ORM\Column(name="text6", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $text6;

    /**
     * @var string|null
     *
     * @ORM\Column(name="text7", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $text7;

    /**
     * @var string|null
     *
     * @ORM\Column(name="tesxt8", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $tesxt8;

    /**
     * @var string|null
     *
     * @ORM\Column(name="text9", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $text9;

    /**
     * @var string|null
     *
     * @ORM\Column(name="text10", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $text10;

    /**
     * @var string|null
     *
     * @ORM\Column(name="text11", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $text11;

    /**
     * @var string|null
     *
     * @ORM\Column(name="text12", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $text12;

    /**
     * @var \Application\Entity\Categories
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\Categories")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="category", referencedColumnName="id", nullable=true)
     * })
     */
    private $category;


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
     * @param string $title
     *
     * @return Pages
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set short.
     *
     * @param string|null $short
     *
     * @return Pages
     */
    public function setShort($short = null)
    {
        $this->short = $short;

        return $this;
    }

    /**
     * Get short.
     *
     * @return string|null
     */
    public function getShort()
    {
        return $this->short;
    }

    /**
     * Set content.
     *
     * @param string|null $content
     *
     * @return Pages
     */
    public function setContent($content = null)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content.
     *
     * @return string|null
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set thumbnail.
     *
     * @param string|null $thumbnail
     *
     * @return Pages
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

    /**
     * Set date.
     *
     * @param \DateTime|null $date
     *
     * @return Pages
     */
    public function setDate($date = null)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date.
     *
     * @return \DateTime|null
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set service.
     *
     * @param bool|null $service
     *
     * @return Pages
     */
    public function setService($service = null)
    {
        $this->service = $service;

        return $this;
    }

    /**
     * Get service.
     *
     * @return bool|null
     */
    public function getService()
    {
        return $this->service;
    }

    /**
     * Set news.
     *
     * @param bool|null $news
     *
     * @return Pages
     */
    public function setNews($news = null)
    {
        $this->news = $news;

        return $this;
    }

    /**
     * Get news.
     *
     * @return bool|null
     */
    public function getNews()
    {
        return $this->news;
    }

    /**
     * Set apply.
     *
     * @param bool|null $apply
     *
     * @return Pages
     */
    public function setApply($apply = null)
    {
        $this->apply = $apply;

        return $this;
    }

    /**
     * Get apply.
     *
     * @return bool|null
     */
    public function getApply()
    {
        return $this->apply;
    }

    /**
     * Set hidden.
     *
     * @param bool|null $hidden
     *
     * @return Pages
     */
    public function setHidden($hidden = null)
    {
        $this->hidden = $hidden;

        return $this;
    }

    /**
     * Get hidden.
     *
     * @return bool|null
     */
    public function getHidden()
    {
        return $this->hidden;
    }

    /**
     * Set text5.
     *
     * @param string|null $text5
     *
     * @return Pages
     */
    public function setText5($text5 = null)
    {
        $this->text5 = $text5;

        return $this;
    }

    /**
     * Get text5.
     *
     * @return string|null
     */
    public function getText5()
    {
        return $this->text5;
    }

    /**
     * Set text6.
     *
     * @param string|null $text6
     *
     * @return Pages
     */
    public function setText6($text6 = null)
    {
        $this->text6 = $text6;

        return $this;
    }

    /**
     * Get text6.
     *
     * @return string|null
     */
    public function getText6()
    {
        return $this->text6;
    }

    /**
     * Set text7.
     *
     * @param string|null $text7
     *
     * @return Pages
     */
    public function setText7($text7 = null)
    {
        $this->text7 = $text7;

        return $this;
    }

    /**
     * Get text7.
     *
     * @return string|null
     */
    public function getText7()
    {
        return $this->text7;
    }

    /**
     * Set tesxt8.
     *
     * @param string|null $tesxt8
     *
     * @return Pages
     */
    public function setTesxt8($tesxt8 = null)
    {
        $this->tesxt8 = $tesxt8;

        return $this;
    }

    /**
     * Get tesxt8.
     *
     * @return string|null
     */
    public function getTesxt8()
    {
        return $this->tesxt8;
    }

    /**
     * Set text9.
     *
     * @param string|null $text9
     *
     * @return Pages
     */
    public function setText9($text9 = null)
    {
        $this->text9 = $text9;

        return $this;
    }

    /**
     * Get text9.
     *
     * @return string|null
     */
    public function getText9()
    {
        return $this->text9;
    }

    /**
     * Set text10.
     *
     * @param string|null $text10
     *
     * @return Pages
     */
    public function setText10($text10 = null)
    {
        $this->text10 = $text10;

        return $this;
    }

    /**
     * Get text10.
     *
     * @return string|null
     */
    public function getText10()
    {
        return $this->text10;
    }

    /**
     * Set text11.
     *
     * @param string|null $text11
     *
     * @return Pages
     */
    public function setText11($text11 = null)
    {
        $this->text11 = $text11;

        return $this;
    }

    /**
     * Get text11.
     *
     * @return string|null
     */
    public function getText11()
    {
        return $this->text11;
    }

    /**
     * Set text12.
     *
     * @param string|null $text12
     *
     * @return Pages
     */
    public function setText12($text12 = null)
    {
        $this->text12 = $text12;

        return $this;
    }

    /**
     * Get text12.
     *
     * @return string|null
     */
    public function getText12()
    {
        return $this->text12;
    }

    /**
     * Set category.
     *
     * @param \Application\Entity\Categories|null $category
     *
     * @return Pages
     */
    public function setCategory(\Application\Entity\Categories $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category.
     *
     * @return \Application\Entity\Categories|null
     */
    public function getCategory()
    {
        return $this->category;
    }
}
