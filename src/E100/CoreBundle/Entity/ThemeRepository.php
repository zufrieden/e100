<?php

namespace E100\CoreBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\NoResultException;

/**
 * ThemeRepository
 *
 */
class ThemeRepository extends EntityRepository
{
    public function getThemeTextCount(User $user)
    {
        $query = $this->_em->createQuery("
            SELECT DISTINCT theme.id, COUNT(text.id) AS counter
            FROM 
                E100\CoreBundle\Entity\Text AS text,
                E100\CoreBundle\Entity\Theme AS theme INDEX BY theme.id,
                E100\CoreBundle\Entity\ReadText AS readtext
            WHERE
                text.theme = theme.id AND
                text.id = readtext.text AND
                readtext.user = ?1
            GROUP BY theme.id
        ");
        $query->setParameter(1, $user->getId());

        $result = $query->getResult();
        
        return $result;
    }
}