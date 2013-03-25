<?php

namespace E100\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class CategoriesController extends Controller
{
    /**
     * @Route("/", name="categories")
     * @Template("E100CoreBundle:Categories:categories.html.twig")
     */
    public function indexAction()
    {	
    	$repository = $this->getDoctrine()->getRepository('E100CoreBundle:Theme');
    	$newTestamCategories = $repository->findBy(array('testament' => 'new'));
    	$oldTestamCategories = $repository->findBy(array('testament' => 'old'));

        $user = $this->getUser();
        $userId = $user->getId();

        $query = $this->getDoctrine()->getEntityManager()->createQuery("
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

        $query->setParameter(1, $userId);
        $result = $query->getResult();
        
        return array('newTestamentCategories' => $newTestamCategories,
        			 'oldTestamentCategories' => $oldTestamCategories,
                     'categoryCount' => $result);
    }
}
