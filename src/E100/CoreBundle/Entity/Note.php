<?php

namespace E100\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Represents a note
 *
 * @ORM\Table(name="note")
 * @ORM\Entity
 */
class Note
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
     * @var User $user
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="notes")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */

    private $user;

    /**
     * @var DateTime $created_at
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=true)
     */

    private $created_at;

    /**
     * @var DateTime $updated_at
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */

    private $updated_at;

    /**
     * @var text $note
     *
     * @ORM\Column(name="note_text", type="text")
     */

    private $note_text;

    /**
     * @var Text $text
     *
     * @ORM\ManyToOne(targetEntity="Text", inversedBy="notes")
     * @ORM\JoinColumn(name="text_id", referencedColumnName="id")
     */

    private $text;

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
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Note
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
    
        return $this;
    }

    /**
     * Get created_at
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updated_at
     *
     * @param \DateTime $updatedAt
     * @return Note
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;
    
        return $this;
    }

    /**
     * Get updated_at
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Set note_text
     *
     * @param string $noteText
     * @return Note
     */
    public function setNoteText($noteText)
    {
        $this->note_text = $noteText;
    
        return $this;
    }

    /**
     * Get note_text
     *
     * @return string 
     */
    public function getNoteText()
    {
        return $this->note_text;
    }

    /**
     * Set user
     *
     * @param E100\CoreBundle\Entity\User $user
     * @return Note
     */
    public function setUser(\E100\CoreBundle\Entity\User $user = null)
    {
        $this->user = $user;
    
        return $this;
    }

    /**
     * Get user
     *
     * @return E100\CoreBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set text
     *
     * @param E100\CoreBundle\Entity\Text $text
     * @return Note
     */
    public function setText(\E100\CoreBundle\Entity\Text $text = null)
    {
        $this->text = $text;
    
        return $this;
    }

    /**
     * Get text
     *
     * @return E100\CoreBundle\Entity\Text 
     */
    public function getText()
    {
        return $this->text;
    }
}