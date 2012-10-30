<?php

namespace E100\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\JsonResponse;

use E100\CoreBundle\Entity\ReadText;

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
    	$today = new \DateTime( "now" );
        $repository = $this->getDoctrine()->getRepository('E100CoreBundle:Text');
        $text = $repository->findOneBy(array('id' => $id));
        $readText = new ReadText();
        $readText->setText($text);

        $user = $this->getUser();
        $readText->setUser($user);
        $readText->setDate($today);

        try{
            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($readText);
            $em->flush();

            $response = new JsonResponse(array(
                'success' => true,
                'text_id' => $text->getId(),
            ), 200);
        } catch (\Exception $e){
             $response = new JsonResponse(array(
                'success' => false,
                'text_id' => null,
            ), 500);
        }

        return $response;
    }

    /**
     * @Route("/unmarkread/{id}", name="unmarkRead")
     */
    public function markNotRead($id)
    {
    	$em = $this->getDoctrine()->getManager();
    	$repository = $em->getRepository('E100CoreBundle:ReadText');
        $userid = $this->getUser()->getId();
    	$readText = $repository->findOneBy(array('user' => $userid, 'text' => $id));

        try{
            $repository->remove($readText);
            $em->flush();

            $response = new JsonResponse(array(
                'success' => true,
                'text_id' => $text->getId(),
            ), 200);
        } catch (\Exception $e){
             $response = new JsonResponse(array(
                'success' => false,
                'text_id' => null,
            ), 500);
        }

        return $response;
    }

    /**
     * @Route("/goalstatus", name="getGoalStatus")
     */
    public function getGoalJson()
    {
        $user = $this->getUser();
        $goal = $user->getGoal();
        $readTexts = $user->getReadTexts();

        $history = array();
        $nbrBooks = 0;

        foreach ($readTexts as $readText) {
            $nbrBooks++;
            $history[$readText->getDate()] = $nbrBooks; 
        }

        $response = new JsonResponse(array(
            'startdate' => $getStartDateTime(),
            'enddate' => $getEndDateTime(),
            'history' => $history,
            ), 200);
    }
}
