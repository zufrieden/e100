<?php

namespace E100\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Represents a text
 *
 * @ORM\Table(name="text")
 * @ORM\Entity
 */
class Text
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
     * @var integer $textNumber
     *
     * @ORM\Column(name="text_number", type="integer", unique=true)
     */
    private $textNumber;

    /**
     * @var string $title
     *
     * @ORM\Column(name="title", type="string", length=255)
     */

    private $title;

    /**
     * @var string $bibleRef
     *
     * @ORM\Column(name="bible_reference", type="string", length=255)
     */

    private $bibleRef;

    /**
     * @var text $bibleText
     *
     * @ORM\Column(name="bible_text", type="text")
     */

    private $bibleText;

    /**
     * @var text $comment
     *
     * @ORM\Column(name="comment", type="text")
     */

    private $comment;

    /**
     * @var Theme $theme
     *
     * @ORM\ManyToOne(targetEntity="Theme", inversedBy="texts")
     * @ORM\JoinColumn(name="theme_id", referencedColumnName="id")
     */

    private $theme;

    /**
     * @var Note[] $note
     *
     * Bidirectional
     *
     * @ORM\OneToMany(targetEntity="Note", mappedBy="text")
     */

    private $notes;

    /**
     * @var text $actionText
     *
     * @ORM\Column(name="action_text", type="text")
     */

    private $actionText;

    /**
     * @var text $teaserQuestion
     *
     * @ORM\Column(name="teaser_question", type="text")
     */

    private $teaserQuestion;

    /**
     * @var text $link
     *
     * @ORM\Column(name="link", type="text")
     */

    private $link;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->notes = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set title
     *
     * @param string $title
     * @return Text
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
     * Set teaserQuestion
     *
     * @param string $teaserQuestion
     * @return Text
     */
    public function setTeaserQuestion($teaserQuestion)
    {
        $this->teaserQuestion = $teaserQuestion;

        return $this;
    }

    /**
     * Get teaserQuestion
     *
     * @return string
     */
    public function getTeaserQuestion()
    {
        return $this->teaserQuestion;
    }

    /**
     * Set link
     *
     * @param string $link
     * @return Text
     */
    public function setLink($link)
    {
        $this->link = $link;

        return $this;
    }

    /**
     * Get link
     *
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set bibleRef
     *
     * @param string $bibleRef
     * @return Text
     */
    public function setBibleRef($bibleRef)
    {
        $this->bibleRef = $bibleRef;

        return $this;
    }

    /**
     * Get bibleRef
     *
     * @return string
     */
    public function getBibleRef()
    {
        return $this->bibleRef;
    }

    /**
     * Set bibleText
     *
     * @param string $bibleText
     * @return Text
     */
    public function setBibleText($bibleText)
    {
        $this->bibleText = $bibleText;

        return $this;
    }

    /**
     * Get bibleText
     *
     * @return string
     */
    public function getBibleText()
    {
        return $this->bibleText;
    }

    /**
     * Set comment
     *
     * @param string $comment
     * @return Text
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set theme
     *
     * @param E100\CoreBundle\Entity\Theme $theme
     * @return Text
     */
    public function setTheme(\E100\CoreBundle\Entity\Theme $theme = null)
    {
        $this->theme = $theme;

        return $this;
    }

    /**
     * Get theme
     *
     * @return E100\CoreBundle\Entity\Theme
     */
    public function getTheme()
    {
        return $this->theme;
    }

    /**
     * Add notes
     *
     * @param E100\CoreBundle\Entity\Note $notes
     * @return Text
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
     * Set action_text
     *
     * @param text $actionText
     * @return Note
     */
    public function setActionText($actionText)
    {
        $this->actionText = $actionText;

        return $this;
    }

    /**
     * Get action_text
     *
     * @return text
     */
    public function getActionText()
    {
        return $this->actionText;
    }

    /**
     * Set textNumber
     *
     * @param integer $textNumber
     * @return Text
     */
    public function setTextNumber($textNumber)
    {
        $this->textNumber = $textNumber;
    
        return $this;
    }

    /**
     * Get textNumber
     *
     * @return integer 
     */
    public function getTextNumber()
    {
        return $this->textNumber;
    }
}