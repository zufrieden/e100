<?php

namespace E100\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\JsonResponse;

use E100\CoreBundle\Entity\ReadText;
use E100\CoreBundle\Entity\Goal;

class GoalController extends Controller
{
    /**
     * @Route("/", name="goal")
     * @Template("E100CoreBundle:Goal:goal.html.twig")
     */
    public function indexAction()
    {

    	return array('test' => 1);
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
                'text_id' => $id
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
    	$repository = $this->getDoctrine()->getRepository('E100CoreBundle:ReadText');
        $userid = $this->getUser()->getId();
    	$readText = $repository->findOneBy(array('user' => $userid, 'text' => $id));

        try{
            $em = $this->getDoctrine()->getEntityManager();
            $em->remove($readText);
            $em->flush();

            $response = new JsonResponse(array(
                'success' => true,
                'text_id' => $id
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
        $goals = $user->getGoals();
        $readTexts = $user->getReadTexts();

        $days = array();
        $history = array();
        $future = array();
        $nbrBooks = 0;

        foreach ($readTexts as $readText) {
            $nbrBooks++;
            $days[$readText->getDate()->format("d.m.Y")] = $nbrBooks; 
        }

        foreach ($days as $day => $value) {
            $history[] = (array('date' => $day, 'value' => $value));
        }

        if(count($goals)) {
            $startdate = $goals[0]->getStartDateTime();
            $enddate = $goals[0]->getEndDateTime();
        } else {
            $goal = new Goal();
            $goal->setUser($user);
            $startdate = new \DateTime("now");
            $enddate = new \DateTime("now");
            $enddate->modify("+3 month");
            $goal->setEndDateTime($enddate);
            $goal->setStartDateTime($startdate);
            $this->getDoctrine()->getEntityManager()->persist($goal);
            $this->getDoctrine()->getEntityManager()->flush();
        }

        if(count($days)) {
            $future[] = array('date' => $day, 'value' => $nbrBooks);
        } else {
            $future[] = array('date' => $startdate->format("d.m.Y"), 'value' => $nbrBooks);
        }

        $future[] = array('date' => $enddate->format("d.m.Y"), 'value' => 100);

        $response = new JsonResponse(array(
            'startdate' => $startdate->format("d.m.Y"),
            'enddate' => $enddate->format("d.m.Y"),
            'history' => array($history),
            'future' => array($future),
            ), 200);

        return $response;
    }
}
