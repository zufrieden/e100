<?php

namespace Derham\CoreBundle\Entity;

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
     * @ORM\Column(name="start_date_time", type="DateTime")
     */

    private $startDateTime;

    /**
     * @var DateTime $endDateTime
     *
     * @ORM\Column(name="end_date_time", type="DateTime")
     */

    private $endDateTime;

    /**
     * @var User $user
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="goals")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */

    private $user;    

}
