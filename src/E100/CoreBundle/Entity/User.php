<?php
// src/Acme/UserBundle/Entity/User.php

namespace Acme\UserBundle\Entity;

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
     * @ManyToMany(targetEntity="Text")
     * @JoinTable(name="user_favorite_texts",
     *   joinColumns={@JoinColumn(name="user_id", referencedColumnName="id")},
     *   inverseJoinColumns={@JoinColumn(name="favorite_text_id", referencedColumnName="id")}
     * )
     */
    private $favorites;

    /**
     * @var Text[] $textsRead
     *
     * Unidirectional - A user has read many texts (INVERSE SIDE)
     *
     * @OneToMany(targetEntity="MarkedRead", mappedBy="user")
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
     * @OneToMany(targetEntity="Note", mappedBy="user")
     */

    private $notes;

    /**
     * @var Goal[] $goal
     *
     * Bidirectional - A users can have multiple goal (INVERSE SIDE)
     *
     * @OneToMany(targetEntity="Goal", mappedBy="user")
     */

    private $goals;


    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
}