<?php

namespace E100\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use E100\CoreBundle\Entity\Note;
use Symfony\Component\HttpFoundation\Request;


class NotesController extends Controller
{
    /**
     * @Route("/}", name="notes")
     * @Template("E100CoreBundle:Notes:notes.html.twig")
     */
    public function indexAction()
    {
        $repository = $this->getDoctrine()->getRepository('E100CoreBundle:Note');
        $notes = $repository->findAll();

        return array('notes' => $notes);
    }

    /**
     * @Route("/delete/{id}", name="deleteNote")
     */
    public function deleteAction($id)
    {
    	// Get User form Session
        $repository = $this->getDoctrine()->getRepository('E100CoreBundle:Note');
        $em = $this->getDoctrine()->getEntityManager();
        $note = $repository->findOneBy(array('id' => $id));

        try{
            $em->remove($note);
            $em->flush();
        } catch (\Exception $e) {
            var_dump($e);
        }

        return $this->redirect($this->generateUrl('notes'));
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
    public function newAction(Request $request)
    {
        $id = $request->get('id');
        $repository = $this->getDoctrine()->getRepository('E100CoreBundle:Text');
        $text = $repository->findOneBy(array('id' => $id));

        $note = new Note();
        $note->setText($text);

        $form = $this->createFormBuilder($note)
                        ->add('note_text', 'textarea')
                        ->getForm();

        if ($request->getMethod() == 'POST') {
            $form->bindRequest($request);

            $user = $this->getUser();
            $note->setUser($user);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($note);
                $em->flush();

                return $this->redirect($this->generateUrl('notes'));
            }
        }

        return $this->render('E100CoreBundle:Notes:new.html.twig', array(
            'form' => $form->createView(),
            'text' => $text,
        ));
    }
}
