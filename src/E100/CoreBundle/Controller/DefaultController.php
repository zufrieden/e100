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

            if($user) {
                if($user->getFavorites()->contains($text)) {
                    $hasFavorited = true;
                }

                if($user->getReadTexts()->contains($text)) {
                    $hasRead = true;
                }
            }

            $user->setLastRead($text);
            $this->getDoctrine()->getEntityManager()->persist($user);
            $this->getDoctrine()->getEntityManager()->flush();
            return $this->render('E100CoreBundle:BibleText:text.html.twig', array('text' => $text, 'hasRead' => $hasRead, 'hasFavorited' => $hasFavorited));
        }
    }

    /**
     * @Route("/last", name="last")
     */
    public function lastAction()
    {
        $user = $this->getUser();

        $text = $user->getLastRead();
        $hasRead = false;
        $hasFavorited = false;

        if($this->getUser() && $text) {

            if($user->getFavorites()->contains($text)) {
                $hasFavorited = true;
            }

            if($user->getReadTexts()->contains($text)) {
                $hasRead = true;
            }
        }

        if($text) {
            $user->setLastRead($text);
            $this->getDoctrine()->getEntityManager()->persist($user);
            $this->getDoctrine()->getEntityManager()->flush();
            return $this->render('E100CoreBundle:BibleText:text.html.twig', array('text' => $text, 'hasRead' => $hasRead, 'hasFavorited' => $hasFavorited)); 
        } else {
            $this->forward('/random');
        }
        
    }
}
