<?php

namespace E100\CoreBundle\Entity;

use FOS\UserBundle\Entity\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @var integer $id
     *
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var Text[] $favorites
     *
     * Unidirectional - Many users have Many favorite textes (OWNING SIDE)
     *
     * @ORM\ManyToMany(targetEntity="Text")
     * @ORM\JoinTable(name="user_favorite_texts",
     *   joinColumns={@ORM\JoinColumn(name="user_id", referencedColumnName="id")},
     *   inverseJoinColumns={@ORM\JoinColumn(name="favorite_text_id", referencedColumnName="id")}
     * )
     */
    private $favorites;

    /**
     * @var Text[] $textsRead
     *
     * Unidirectional - A user has read many texts (INVERSE SIDE)
     *
     * @ORM\OneToMany(targetEntity="ReadText", mappedBy="user")
     * @ORM\OrderBy({"date" = "ASC"})
     */
    private $readTexts;

    /**
     * @var Text $lastRead
     *
     * Unidirectional
     *
     * @ORM\ManyToOne(targetEntity="Text")
     */
    private $lastRead;

    /**
     * @var string $language
     *
     * @ORM\Column(name="language", type="string", length=2)
     */
    private $language;

    /**
     * @var Note[] $goal
     *
     * Bidirectional - A users can write multiple notes  (INVERSE SIDE)
     *
     * @ORM\OneToMany(targetEntity="Note", mappedBy="user")
     */
    private $notes;

    /**
     * @var Goal[] $goal
     *
     * Bidirectional - A users can have multiple goal (INVERSE SIDE)
     *
     * @ORM\OneToMany(targetEntity="Goal", mappedBy="user")
     */
    private $goals;


    public function __construct()
    {
        parent::__construct();
        // your own logic
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
     * Set language
     *
     * @param string $language
     * @return User
     */
    public function setLanguage($language)
    {
        $this->language = $language;
    
        return $this;
    }

    /**
     * Get language
     *
     * @return string 
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Add favorites
     *
     * @param E100\CoreBundle\Entity\Text $favorites
     * @return User
     */
    public function addFavorite(\E100\CoreBundle\Entity\Text $favorites)
    {
        if ($this->favorites->contains($favorites)) {
            throw new \Exception('Already favorited');
        }

        $this->favorites[] = $favorites;
        
        return $this;
    }

    /**
     * Remove favorites
     *
     * @param E100\CoreBundle\Entity\Text $favorites
     */
    public function removeFavorite(\E100\CoreBundle\Entity\Text $favorites)
    {
        if (!$this->favorites->contains($favorites)) {
            throw new \Exception('This text is not a favorit');
        }

        $this->favorites->removeElement($favorites);

        return $this;
    }

    /**
     * Get favorites
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getFavorites()
    {
        return $this->favorites;
    }

    /**
     * Add readTexts
     *
     * @param E100\CoreBundle\Entity\MarkedRead $readTexts
     * @return User
     */
    public function addReadText(ReadText $readTexts)
    {
        $this->readTexts[] = $readTexts;
    
        return $this;
    }

    /**
     * Remove readTexts
     *
     * @param E100\CoreBundle\Entity\MarkedRead $readTexts
     */
    public function removeReadText(ReadText $readTexts)
    {
        $this->readTexts->removeElement($readTexts);
    }

    /**
     * Get readTexts
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getReadTexts()
    {
        return $this->readTexts;
    }

    /**
     * Set lastRead
     *
     * @param E100\CoreBundle\Entity\Text $lastRead
     * @return User
     */
    public function setLastRead(\E100\CoreBundle\Entity\Text $lastRead = null)
    {
        $this->lastRead = $lastRead;
    
        return $this;
    }

    /**
     * Get lastRead
     *
     * @return E100\CoreBundle\Entity\Text 
     */
    public function getLastRead()
    {
        return $this->lastRead;
    }

    /**
     * Add notes
     *
     * @param E100\CoreBundle\Entity\Note $notes
     * @return User
     */
    public function addNote(\E100\CoreBundle\Entity\Note $notes)
    {
        $this->notes[] = $notes;
    
        return $this;
    }

    /**
     * Remove notes
     *
     * @param E100\CoreBundle\Entity\Note $notes
     */
    public function removeNote(\E100\CoreBundle\Entity\Note $notes)
    {
        $this->notes->removeElement($notes);
    }

    /**
     * Get notes
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Add goals
     *
     * @param E100\CoreBundle\Entity\Goal $goals
     * @return User
     */
    public function addGoal(\E100\CoreBundle\Entity\Goal $goals)
    {
        $this->goals[] = $goals;
    
        return $this;
    }

    /**
     * Remove goals
     *
     * @param E100\CoreBundle\Entity\Goal $goals
     */
    public function removeGoal(\E100\CoreBundle\Entity\Goal $goals)
    {
        $this->goals->removeElement($goals);
    }

    /**
     * Get goals
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getGoals()
    {
        return $this->goals;
    }
}