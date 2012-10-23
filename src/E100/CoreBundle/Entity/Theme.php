<?php

namespace Derham\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Represents a theme
 *
 * @ORM\Table(name="theme")
 * @ORM\Entity
 */
class Theme
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
     * @var string $testament
     *
     * @ORM\Column(name="testament", type="string", length=255)
     */

    private $testament;

    /**
     * @var string $title
     *
     * @ORM\Column(name="title", type="string", length=255)
     */

    private $title;

    /**
     * @var Text[] $texts
     *
     * @ORM\OneToMany(targetEntity="Text", mappedBy="theme")
     */

    private $texts;

    /**
     * @var string $image
     *
     * @ORM\Column(name="image", type="string", length="255")
     */

    private $image;
}
