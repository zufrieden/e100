<?php

namespace E100\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class GoalController extends Controller
{
    /**
     * @Route("/")
     * @Template("E100CoreBundle:Goal:index.html.twig")
     */
    public function indexAction($id)
    {

    	$repository = $this->getDoctrine()->getRepository('E100CoreBundle:Text');
    	$text = $repository->findOneBy(array('id' => $id));
        
        return array('text' => $text);
    }

    /**
     * @Route("/markread/{id}", name="markRead")
     */
    public function markRead($id)
    {
    	$today = date("Y-m-d");
    	$readText = new ReadText();
    	$readText->setText($id);

    	// Set user from current session
        $user = $this->getUser();
    	$readText->setUser($user);
    	$readText->setDate($today);

    	$em = $this->getDoctrine()->getManager();
    	$em->persist($product);
    	$em->flush();
    }

    /**
     * @Route("/unmarkread/{id}", name="unmarkRead")
     */
    public function markNotRead($id)
    {
    	$em = $this->getDoctrine()->getManager();
    	$repository = $em->getRepository('E100CoreBundle:ReadText');

    	$readText = $repository->findOneBy(array('user' => $userid, 'text' => $id));

    	if($readText) {
    		$repository->remove($readText);
    		$em->flush();
    	}
    }
}
