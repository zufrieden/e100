<?php

namespace E100\CoreBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NoResultException;

/**
 * TextRepository
 *
 */
class TextRepository extends EntityRepository
{
    public function getLastReadTextForUser(User $user)
    {
        $q = $this->_em->createQueryBuilder()
            ->select('rt, t')
            ->from('E100CoreBundle:ReadText', 'rt')
            ->join('rt.text', 't')
            ->where('rt.user = :user')
            ->orderBy('rt.date', 'DESC')
            ->setMaxResults(1)
            ->setParameter('user', $user->getId())
            ->getQuery();

        try {
            $readText = $q->getSingleResult();
            $text = $readText->getText();
        } catch (NoResultException $e) {
            $text = null;
        }
        return $text;
    }
}