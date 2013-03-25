<?php

namespace E100\CoreBundle\Entity;

use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Translatable\Translatable;

/**
 * Represents a theme
 *
 * @ORM\Table(name="theme")
 * @ORM\Entity(repositoryClass="E100\CoreBundle\Entity\ThemeRepository")
 */
class Theme implements Translatable
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $testament
     *
     * @ORM\Column(name="testament", type="string", length=255)
     */

    private $testament;

    /**
     * @var string $title
     *
     * @Gedmo\Translatable
     * @ORM\Column(name="title", type="string", length=255)
     */

    private $title;

    /**
     * @var string $description
     *
     * @Gedmo\Translatable
     * @ORM\Column(name="description", type="text")
     */

    private $description;

    /**
     * @var Text[] $texts
     *
     * @ORM\OneToMany(targetEntity="Text", mappedBy="theme")
     */

    private $texts;

    /**
     * @var string $image
     *
     * @ORM\Column(name="image", type="string", length=255)
     */

    private $image;

    /**
     * @Gedmo\Locale
     * Used locale to override Translation listener`s locale
     * this is not a mapped field of entity metadata, just a simple property
     */
    private $locale;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->texts = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set testament
     *
     * @param string $testament
     * @return Theme
     */
    public function setTestament($testament)
    {
        $this->testament = $testament;

        return $this;
    }

    /**
     * Get testament
     *
     * @return string
     */
    public function getTestament()
    {
        return $this->testament;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Theme
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
     * Set image
     *
     * @param string $image
     * @return Theme
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Add texts
     *
     * @param E100\CoreBundle\Entity\Text $texts
     * @return Theme
     */
    public function addText(\E100\CoreBundle\Entity\Text $texts)
    {
        $this->texts[] = $texts;

        return $this;
    }

    /**
     * Remove texts
     *
     * @param E100\CoreBundle\Entity\Text $texts
     */
    public function removeText(\E100\CoreBundle\Entity\Text $texts)
    {
        $this->texts->removeElement($texts);
    }

    /**
     * Get texts
     *
     * @return Doctrine\Common\Collections\Collection
     */
    public function getTexts()
    {
        return $this->texts;
    }

    /**
     * Get locale
     *
     * @return integer
     */
    public function getTranslatableLocale()
    {
        return $this->locale;
    }

    /**
     * Set locale
     *
     * @param locale $locale
     * @return Theme
     */
    public function setTranslatableLocale($locale)
    {
        $this->locale = $locale;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Theme
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