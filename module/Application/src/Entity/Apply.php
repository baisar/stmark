<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Apply
 *
 * @ORM\Table(name="apply", indexes={@ORM\Index(name="cat", columns={"cat"})})
 * @ORM\Entity
 */
class Apply
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
     * @ORM\Column(name="name", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $name;

    /**
     * @var string|null
     *
     * @ORM\Column(name="last_name", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $lastName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="cell", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $cell;

    /**
     * @var string|null
     *
     * @ORM\Column(name="email", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $email;

    /**
     * @var string|null
     *
     * @ORM\Column(name="resume", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $resume;

    /**
     * @var \Application\Entity\JobCategory
     *
     * @ORM\ManyToOne(targetEntity="Application\Entity\JobCategory")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="cat", referencedColumnName="id", nullable=true)
     * })
     */
    private $cat;


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
     * Set name.
     *
     * @param string|null $name
     *
     * @return Apply
     */
    public function setName($name = null)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name.
     *
     * @return string|null
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set lastName.
     *
     * @param string|null $lastName
     *
     * @return Apply
     */
    public function setLastName($lastName = null)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName.
     *
     * @return string|null
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set cell.
     *
     * @param string|null $cell
     *
     * @return Apply
     */
    public function setCell($cell = null)
    {
        $this->cell = $cell;

        return $this;
    }

    /**
     * Get cell.
     *
     * @return string|null
     */
    public function getCell()
    {
        return $this->cell;
    }

    /**
     * Set email.
     *
     * @param string|null $email
     *
     * @return Apply
     */
    public function setEmail($email = null)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email.
     *
     * @return string|null
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set resume.
     *
     * @param string|null $resume
     *
     * @return Apply
     */
    public function setResume($resume = null)
    {
        $this->resume = $resume;

        return $this;
    }

    /**
     * Get resume.
     *
     * @return string|null
     */
    public function getResume()
    {
        return $this->resume;
    }

    /**
     * Set cat.
     *
     * @param \Application\Entity\JobCategory|null $cat
     *
     * @return Apply
     */
    public function setCat(\Application\Entity\JobCategory $cat = null)
    {
        $this->cat = $cat;

        return $this;
    }

    /**
     * Get cat.
     *
     * @return \Application\Entity\JobCategory|null
     */
    public function getCat()
    {
        return $this->cat;
    }
}
