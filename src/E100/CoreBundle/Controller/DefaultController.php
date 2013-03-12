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
        if($this->getUser()) {
            return $this->redirect($this->generateUrl('dashboard'));
        } else {
            return $this->render('E100CoreBundle:Default:index.html.twig', array('name' => 'default'));
        }
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
        $hasUser = false;

        $textIds = $query->add('select', 't.id')->getQuery()->getResult();

        $textCount = sizeof($textIds);
        $textNbr = rand(0, $textCount-1);
        $textId = $textIds[$textNbr]['id'];

        if(is_int($textId)) {
            $text = $query->add('select', 't')->add('where', 't.textNumber = :textId')->setParameter('textId', $textId)->getQuery()->getSingleResult();
            $user = $this->getUser();
            $prev = $textId - 1;
            $next = $textId + 1 <= 100 ? $textId + 1 : 0;

            $note = NULL;

            if($user) {
                $hasUser = true;
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

                $notes_repository = $this->getDoctrine()->getRepository('E100CoreBundle:Note');
                $note = $notes_repository->findOneBy(array(
                                            'text' => $text,
                                            'user' => $user
                                            ) );

                $user->setLastRead($text);
                $this->getDoctrine()->getEntityManager()->persist($user);
                $this->getDoctrine()->getEntityManager()->flush();
            }

            return $this->render('E100CoreBundle:BibleText:text.html.twig', array(
                'text' => $text, 
                'hasRead' => $hasRead, 
                'hasFavorited' => $hasFavorited, 
                'hasNote' => $note, 
                'hasUser' => $hasUser,
                'next' => $next, 
                'prev' => $prev
            ));
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
            $hasUser = true;
            $text = $user->getLastRead();
            $prev = $text->getTextNumber() - 1;
            $next = $text->getTextNumber() + 1 <= 100 ? $text->getId() + 1 : 0;

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

            return $this->render('E100CoreBundle:BibleText:text.html.twig', array(
                'text' => $text, 
                'hasRead' => $hasRead, 
                'hasFavorited' => $hasFavorited, 
                'hasNote' => $note, 
                'hasUser' => $hasUser,
                'next' => $next, 
                'prev' => $prev
            )); 
        } else {
            return $this->redirect($this->generateUrl('random'));
        }
    }
}
