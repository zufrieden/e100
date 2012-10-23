<?php

namespace E100\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class NotesController extends Controller
{
    /**
     * @Route("/", name="notes")
     * @Template()
     */
    public function indexAction($name)
    {
        return $this->render('E100CoreBundle:Default:index.html.twig', array('name' => 'default'));
    }
}
