<?php

namespace E100\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use E100\CoreBundle\Entity\ReadText;
use E100\CoreBundle\Entity\Goal;

class UserController extends Controller
{
    /**
     * @Route("/dashboard", name="dashboard")
     * @Template()
     */
    public function dashboardAction()
    {

        $user = $this->getUser();
        $goal = $user->getGoals();
        $goal = $goal[0];
        $now  = new \DateTime("now");

        $lastReading = $this->getDoctrine()->getRepository('E100CoreBundle:Text')->getLastReadTextForUser($user);
        $numberOfTextReaded = $user->getReadTexts()->count();
        $velocity = ($goal->getEndDateTime()->diff($now)->days) / (100 - $numberOfTextReaded);
        $message = "";
        // Display message
        switch($numberOfTextReaded) {
            case 1:
                $message = $this->get('translator')->trans('motivation.cas1');
                break;
            case 3:
                $message = $this->get('translator')->trans('motivation.cas3');
                break;
            case 5:
                $message = $this->get('translator')->trans('motivation.cas5');
                break;
            case 10:
                $message = $this->get('translator')->trans('motivation.cas10');
                break;
            case 20:
                $message = $this->get('translator')->trans('motivation.cas20');
                break;
            case 33:
                $message = $this->get('translator')->trans('motivation.cas33');
                break;
            case 50:
                $message = $this->get('translator')->trans('motivation.cas50');
                break;
            case 90:
                $message = $this->get('translator')->trans('motivation.cas90');
                break;
            case 95:
                $message = $this->get('translator')->trans('motivation.cas95');
                break;
            case 99:
                $message = $this->get('translator')->trans('motivation.cas99');
                break;
            case 100:
                $message = $this->get('translator')->trans('motivation.cas100');
                break;
        }

    	return array(
            'lastReading' => $lastReading,
            'numberOfTextReaded' => $numberOfTextReaded,
            'velocity' => $velocity,
            'message' => $message,
        );
    }
}
