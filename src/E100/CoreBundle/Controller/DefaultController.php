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
        $query = $repository->createQueryBuilder('t')->getQuery();
        $max = count($query->getResult());
        $text = null;
        $hasRead = false;
        $hasFavorited = false;

        while($text == NULL) {
            $randomId = rand(38, $max);
            $text = $repository->findOneBy(array('id' => $randomId));
        }

         if($this->getUser()) {

            if($user->getFavorites()->contains($text)) {
                $hasFavorited = true;
            }

            if($user->getReadTexts()->contains($text)) {
                $hasRead = true;
            }
        }

        return $this->render('E100CoreBundle:BibleText:text.html.twig', array('text' => $text, 'hasRead' => $hasRead, 'hasFavorited' => $hasFavorited));
    }

    /**
     * @Route("/last", name="last")
     */
    public function lastAction()
    {
        $user = $this->getUser();

        $text = $this->getLastRead();

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
           return $this->render('E100CoreBundle:BibleText:text.html.twig', array('text' => $text, 'hasRead' => $hasRead, 'hasFavorited' => $hasFavorited)); 
        } else {
            $this->forward('/random');
        }
        
    }
}
