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
    	$oldTestamCategories = $repository->findBy(array('testament' => 'old'));;
        
        return array('newTestamentCategories' => $newTestamCategories,
        			 'oldTestamentCategories' => $oldTestamCategories);
    }
}
