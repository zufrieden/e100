<?php

namespace E100\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use E100\CoreBundle\Entity\Note;


class NotesController extends Controller
{
    /**
     * @Route("/}", name="notes")
     * @Template("E100CoreBundle:Notes:notes.html.twig")
     */
    public function indexAction()
    {
        return array('name' => 'default');
    }

    /**
     * @Route("/delete/{id}", name="deleteNote")
     */
    public function deleteAction($id)
    {
    	// Get User form Session
    	$user = $this->getUser();
        $id = $user->getId();

    	$user->removeNote($id);
    	$this->getDoctrine()->flush();
    }

    /**
     * @Route("/edit/{id}", name="editNote")
     * @Template("E100CoreBundle:Default:index.html.twig")
     */
    public function editAction($id)
    {
    	;// Update
    }

    /**
     * @Route("/new/{id}", name="newNote")
     */
    public function newAction($id)
    {
        $repository = $this->getDoctrine()->getRepository('E100CoreBundle:Text');
        $text = $repository->findOneBy(array('id' => $id));

        $note = new Note();
        $note->setText($text);

        $form = $this->createFormBuilder($note)
                        ->add('note_text', 'textarea')
                        ->getForm();

        return $this->render('E100CoreBundle:Notes:new.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}
