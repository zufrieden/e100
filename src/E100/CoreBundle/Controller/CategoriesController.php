<?php

namespace E100\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class CategoriesController extends Controller
{
    /**
     * @Route("/", name="categories")
     * @Template()
     */
    public function indexAction()
    {
        return $this->render('E100CoreBundle:Default:index.html.twig', array('name' => 'default'));
    }
}
