<?php

namespace Derham\CoreBundle\Entity;

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
}
