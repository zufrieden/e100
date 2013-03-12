<?php

namespace E100\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        return $this->render('E100CoreBundle:Default:index.html.twig', array('name' => 'default'));
    }

    /**
     * @Route("/random", name="random")
     *
     */
    public function randomAction()
    {
        $repository = $this->getDoctrine()->getRepository('E100CoreBundle:Text');
        $query = $repository->createQueryBuilder('t');
        $text = null;
        $hasRead = false;
        $hasFavorited = false;

        $textIds = $query->add('select', 't.id')->getQuery()->getResult();

        $textCount = sizeof($textIds);
        $textNbr = rand(0, $textCount-1);
        $textId = $textIds[$textNbr]['id'];

        if(is_int($textId)) {
            $text = $query->add('select', 't')->add('where', 't.id = :textId')->setParameter('textId', $textId)->getQuery()->getSingleResult();
            $user = $this->getUser();

            $note = NULL;

            if($user) {
                if($user->getFavorites()->contains($text)) {
                    $hasFavorited = true;
                }

                if($user->getReadTexts()->contains($text)) {
                    $hasRead = true;
                }

                $notes_repository = $this->getDoctrine()->getRepository('E100CoreBundle:Note');
                $note = $notes_repository->findOneBy(array(
                                            'text' => $text,
                                            'user' => $user
                                            ) );

                $user->setLastRead($text);
                $this->getDoctrine()->getEntityManager()->persist($user);
                $this->getDoctrine()->getEntityManager()->flush();
            }

            return $this->render('E100CoreBundle:BibleText:text.html.twig', array('text' => $text, 'hasRead' => $hasRead, 'hasFavorited' => $hasFavorited, 'hasNote' => $note));
        }
    }

    /**
     * @Route("/last", name="last")
     */
    public function lastAction()
    {
        $user = $this->getUser();

        $hasRead = false;
        $hasFavorited = false;
        $note = false;

        if($user && $user->getLastRead()) {
            $text = $user->getLastRead();

            $notes_repository = $this->getDoctrine()->getRepository('E100CoreBundle:Note');
            $note = $notes_repository->findOneBy(array(
                                            'text' => $text,
                                            'user' => $user
                                            ) );

            if($user->getFavorites()->contains($text)) {
                $hasFavorited = true;
            }

            if($user->getReadTexts()) {
                $readTexts = $user->getReadTexts();
                foreach($readTexts as $readText) {
                    if($readText->getText()->getId() == $text->getId()) {
                        $hasRead = true;
                        break;
                    }
                }
            }

            $user->setLastRead($text);
            $this->getDoctrine()->getEntityManager()->persist($user);
            $this->getDoctrine()->getEntityManager()->flush();
            return $this->render('E100CoreBundle:BibleText:text.html.twig', array('text' => $text, 'hasNote' => $note, 'hasRead' => $hasRead, 'hasFavorited' => $hasFavorited)); 
        } else {
            return $this->redirect($this->generateUrl('random'));
        }
        
    }
}
