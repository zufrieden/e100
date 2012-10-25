<?php

namespace E100\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class NotesController extends Controller
{
    /**
     * @Route("/add/{id}", name="notes")
     * @Template("E100CoreBundle:Default:index.html.twig")
     */
    public function indexAction($id)
    {
        return array('name' => 'default');
    }

    /**
     * @Route("/delete/{id}", name="deleteNote")
     */
    public function deleteAction($id)
    {
    	// Get User form Session
    	$repository = $this->getDoctrine()->getRepository('E100CoreBundle:User');
    	$user = $repository->findOneById(1);

    	$user->removeNote($id);
    	$this->getDoctrine()->flush();
    }

    /**
     * @Route("/edit/{id}", name="editNote")
     * @Template("E100CoreBundle:Default:index.html.twig")
     */
    public function editAction()
    {
    	// Update
    }


}
