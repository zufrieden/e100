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
    	$text = $repository->findOneBy(array('id' => $id));
        $hasRead = false;
        $hasFavorited = false;

        if($this->getUser()) {
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

            if($user->getReadTexts()->contains($text)) {
                $hasRead = true;
            }
        }
        
        return array('text' => $text, 'hasRead' => $hasRead, 'hasFavorited' => $hasFavorited, 'hasNote' => $note);
    }
}
