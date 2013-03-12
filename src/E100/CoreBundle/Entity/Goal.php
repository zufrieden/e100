<?php

namespace E100\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Represents a goal
 *
 * @ORM\Table(name="goal")
 * @ORM\Entity
 */
class Goal
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
     * @var DateTime $startDateTime
     *
     * @ORM\Column(name="start_date_time", type="datetime")
     */

    private $startDateTime;

    /**
     * @var DateTime $endDateTime
     *
     * @ORM\Column(name="end_date_time", type="datetime")
     */

    private $endDateTime;

    /**
     * @var User $user
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="goals")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */

    private $user;    


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
     * Set startDateTime
     *
     * @param DateTime $startDateTime
     * @return Goal
     */
    public function setStartDateTime(\DateTime $startDateTime)
    {
        $this->startDateTime = $startDateTime;
    
        return $this;
    }

    /**
     * Get startDateTime
     *
     * @return DateTime 
     */
    public function getStartDateTime()
    {
        return $this->startDateTime;
    }

    /**
     * Set endDateTime
     *
     * @param DateTime $endDateTime
     * @return Goal
     */
    public function setEndDateTime(\DateTime $endDateTime)
    {
        $this->endDateTime = $endDateTime;
    
        return $this;
    }

    /**
     * Get endDateTime
     *
     * @return DateTime 
     */
    public function getEndDateTime()
    {
        return $this->endDateTime;
    }

    /**
     * Set user
     *
     * @param E100\CoreBundle\Entity\User $user
     * @return Goal
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

    public function isEndDateTimeLegal()
    {
        return ($this->startDateTime < $this->endDateTime);
    }
}