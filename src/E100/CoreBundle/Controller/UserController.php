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
                $message = "Awesome, you've read one text! Go on!";
                break;
            case 10:
                $message = "Awesome, you've read 10 texts! Go on!";
                break;
            case 25:
                $message = "Awesome, you've read 25 texts! Go on!";
                break;
            case 50:
                $message = "Awesome, you've read 50 texts! Go on!";
                break;
            case 99:
                $message = "Awesome, you've read 99 texts! Go on!";
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
