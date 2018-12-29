<?php

namespace Application\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Config
 *
 * @ORM\Table(name="config")
 * @ORM\Entity
 */
class Config
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
     * @var string
     *
     * @ORM\Column(name="description", type="text", length=65535, precision=0, scale=0, nullable=false, unique=false)
     */
    private $description;

    /**
     * @var bool
     *
     * @ORM\Column(name="siteon", type="boolean", precision=0, scale=0, nullable=false, options={"default"="1"}, unique=false)
     */
    private $siteon = '1';

    /**
     * @var string|null
     *
     * @ORM\Column(name="main_page_text", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $mainPageText;

    /**
     * @var string|null
     *
     * @ORM\Column(name="trusted", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $trusted;

    /**
     * @var string|null
     *
     * @ORM\Column(name="trusted_text", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $trustedText;

    /**
     * @var string|null
     *
     * @ORM\Column(name="email", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $email;

    /**
     * @var string|null
     *
     * @ORM\Column(name="email2", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $email2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="email3", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $email3;

    /**
     * @var string|null
     *
     * @ORM\Column(name="email4", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $email4;

    /**
     * @var string|null
     *
     * @ORM\Column(name="phone1", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $phone1;

    /**
     * @var string|null
     *
     * @ORM\Column(name="phone2", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $phone2;

    /**
     * @var string|null
     *
     * @ORM\Column(name="phone3", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $phone3;

    /**
     * @var string|null
     *
     * @ORM\Column(name="phone4", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $phone4;

    /**
     * @var string|null
     *
     * @ORM\Column(name="phone5", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $phone5;

    /**
     * @var string|null
     *
     * @ORM\Column(name="address", type="text", length=65535, precision=0, scale=0, nullable=true, unique=false)
     */
    private $address;


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
     * @return Config
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
     * Set description.
     *
     * @param string $description
     *
     * @return Config
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set siteon.
     *
     * @param bool $siteon
     *
     * @return Config
     */
    public function setSiteon($siteon)
    {
        $this->siteon = $siteon;

        return $this;
    }

    /**
     * Get siteon.
     *
     * @return bool
     */
    public function getSiteon()
    {
        return $this->siteon;
    }

    /**
     * Set mainPageText.
     *
     * @param string|null $mainPageText
     *
     * @return Config
     */
    public function setMainPageText($mainPageText = null)
    {
        $this->mainPageText = $mainPageText;

        return $this;
    }

    /**
     * Get mainPageText.
     *
     * @return string|null
     */
    public function getMainPageText()
    {
        return $this->mainPageText;
    }

    /**
     * Set trusted.
     *
     * @param string|null $trusted
     *
     * @return Config
     */
    public function setTrusted($trusted = null)
    {
        $this->trusted = $trusted;

        return $this;
    }

    /**
     * Get trusted.
     *
     * @return string|null
     */
    public function getTrusted()
    {
        return $this->trusted;
    }

    /**
     * Set trustedText.
     *
     * @param string|null $trustedText
     *
     * @return Config
     */
    public function setTrustedText($trustedText = null)
    {
        $this->trustedText = $trustedText;

        return $this;
    }

    /**
     * Get trustedText.
     *
     * @return string|null
     */
    public function getTrustedText()
    {
        return $this->trustedText;
    }

    /**
     * Set email.
     *
     * @param string|null $email
     *
     * @return Config
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
     * Set email2.
     *
     * @param string|null $email2
     *
     * @return Config
     */
    public function setEmail2($email2 = null)
    {
        $this->email2 = $email2;

        return $this;
    }

    /**
     * Get email2.
     *
     * @return string|null
     */
    public function getEmail2()
    {
        return $this->email2;
    }

    /**
     * Set email3.
     *
     * @param string|null $email3
     *
     * @return Config
     */
    public function setEmail3($email3 = null)
    {
        $this->email3 = $email3;

        return $this;
    }

    /**
     * Get email3.
     *
     * @return string|null
     */
    public function getEmail3()
    {
        return $this->email3;
    }

    /**
     * Set email4.
     *
     * @param string|null $email4
     *
     * @return Config
     */
    public function setEmail4($email4 = null)
    {
        $this->email4 = $email4;

        return $this;
    }

    /**
     * Get email4.
     *
     * @return string|null
     */
    public function getEmail4()
    {
        return $this->email4;
    }

    /**
     * Set phone1.
     *
     * @param string|null $phone1
     *
     * @return Config
     */
    public function setPhone1($phone1 = null)
    {
        $this->phone1 = $phone1;

        return $this;
    }

    /**
     * Get phone1.
     *
     * @return string|null
     */
    public function getPhone1()
    {
        return $this->phone1;
    }

    /**
     * Set phone2.
     *
     * @param string|null $phone2
     *
     * @return Config
     */
    public function setPhone2($phone2 = null)
    {
        $this->phone2 = $phone2;

        return $this;
    }

    /**
     * Get phone2.
     *
     * @return string|null
     */
    public function getPhone2()
    {
        return $this->phone2;
    }

    /**
     * Set phone3.
     *
     * @param string|null $phone3
     *
     * @return Config
     */
    public function setPhone3($phone3 = null)
    {
        $this->phone3 = $phone3;

        return $this;
    }

    /**
     * Get phone3.
     *
     * @return string|null
     */
    public function getPhone3()
    {
        return $this->phone3;
    }

    /**
     * Set phone4.
     *
     * @param string|null $phone4
     *
     * @return Config
     */
    public function setPhone4($phone4 = null)
    {
        $this->phone4 = $phone4;

        return $this;
    }

    /**
     * Get phone4.
     *
     * @return string|null
     */
    public function getPhone4()
    {
        return $this->phone4;
    }

    /**
     * Set phone5.
     *
     * @param string|null $phone5
     *
     * @return Config
     */
    public function setPhone5($phone5 = null)
    {
        $this->phone5 = $phone5;

        return $this;
    }

    /**
     * Get phone5.
     *
     * @return string|null
     */
    public function getPhone5()
    {
        return $this->phone5;
    }

    /**
     * Set address.
     *
     * @param string|null $address
     *
     * @return Config
     */
    public function setAddress($address = null)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address.
     *
     * @return string|null
     */
    public function getAddress()
    {
        return $this->address;
    }
}
