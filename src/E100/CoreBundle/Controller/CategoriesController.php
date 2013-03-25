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
        $result = array();
        $readTextIds = array();
        
        if($user) {

            $repository = $this->getDoctrine()->getRepository('E100CoreBundle:ReadText');
            $readTexts = $repository->findBy(array('user' => $user));

            // Create an array with read texts as keys
            for($i = 0; $i < sizeof($readTexts); $i++) {
                $readTextIds[$readTexts[$i]->getText()->getId()] = true;
            }

            $result = $this->getDoctrine()->getRepository('E100CoreBundle:Theme')->getThemeTextCount($user);
        }

        return array('newTestamentCategories' => $newTestamCategories,
        			 'oldTestamentCategories' => $oldTestamCategories,
                     'categoryCount' => $result,
                     'readTexts' => $readTextIds);
    }
}
