<?php

namespace E100\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class TextController extends Controller
{
    /**
     * @Route("/{id}", name="bibleText")
     * @Template("E100CoreBundle:BibleText:text.html.twig")
     */
    public function indexAction($id)
    {
    	$repository = $this->getDoctrine()->getRepository('E100CoreBundle:Text');
    	$text = $repository->findOneBy(array('textNumber' => $id));
        $hasRead = false;
        $hasFavorited = false;
        $hasUser = false;
        $note = false;
        $prev = $id - 1;
        $next = $id + 1 <= 100 ? $id + 1 : 0;

        if($this->getUser()) {
            $hasUser = true;
            $user = $this->getUser();
            $user->setLastRead($text);
            $this->getDoctrine()->getEntityManager()->persist($user);
            $this->getDoctrine()->getEntityManager()->flush();

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

        }
        
        return array('text' => $text, 'hasRead' => $hasRead, 'hasFavorited' => $hasFavorited, 'hasNote' => $note, 'hasUser' => $hasUser, 'next' => $next, 'prev' => $prev);
    }
}
