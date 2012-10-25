<?php

namespace E100\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Represents a read text
 *
 * @ORM\Table(name="read_text")
 * @ORM\Entity
 */
class ReadText
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
     * @ORM\ManyToOne(targetEntity="User", inversedBy="readTexts")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */

    private $user;

    /**
     * @var Text $text
     *
     * @ORM\ManyToOne(targetEntity="Text")
     */

    private $text;

    /**
     * @var DateTime $date
     *
     * @ORM\Column(name="read_date", type="datetime")
     */

    private $date;    


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
     * Set user
     *
     * @param E100\CoreBundle\Entity\User $user
     * @return ReadText
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
     * @return ReadText
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

    /**
     * Set date
     *
     * @param E100\CoreBundle\Entity\User $date
     * @return ReadText
     */
    public function setDate($date = null)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *
     * @return E100\CoreBundle\Entity\User 
     */
    public function getDate()
    {
        return $this->date;
    }
}