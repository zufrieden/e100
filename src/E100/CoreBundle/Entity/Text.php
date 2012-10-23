<?php

namespace Derham\CoreBundle\Entity;

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

}
