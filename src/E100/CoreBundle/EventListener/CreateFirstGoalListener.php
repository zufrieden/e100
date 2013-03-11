<?php

/*
 * This file is part of the FOSUserBundle package.
 *
 * (c) FriendsOfSymfony <http://friendsofsymfony.github.com/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace E100\CoreBundle\EventListener;

use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FormEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Bridge\Doctrine\RegistryInterface as Doctrine;
use E100\CoreBundle\Entity\Goal;

class CreateFirstGoalListener implements EventSubscriberInterface
{
    private $doctrine;

    public function __construct(Doctrine $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    public static function getSubscribedEvents()
    {
        return array(
            FOSUserEvents::REGISTRATION_SUCCESS => 'onRegistrationSuccess',
        );
    }

    public function onRegistrationSuccess(FormEvent $event)
    {
        /** @var $user \FOS\UserBundle\Model\UserInterface */
        $user = $event->getForm()->getData();

        $goal = new Goal();
        $goal->setUser($user);
        $goal->setStartDateTime(new \DateTime("now"));
        $goal->setEndDateTime(new \DateTime("+3 month"));

        $this->doctrine->getEntityManager()->persist($goal);
        //$this->doctrine->getEntityManager()->flush();
    }
}
