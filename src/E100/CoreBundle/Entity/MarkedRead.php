<?php

namespace Derham\CoreBundle\Entity;

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
     * @ORM\JoinColumn(name="user_id" referencedColumnName="id")
     */

    private $user;

    /**
     * @var Text $text
     *
     * @ORM\ManyToOne(targetEntity="Text")
     */

    private $text;

    /**
     * @var Date $date
     *
     * @ORM\ManyToOne(targetEntity="User", inversedBy="goals")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */

    private $date;    

}
