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
        $lastReading = $this->getDoctrine()->getRepository('E100CoreBundle:Text')->getLastReadTextForUser();

    	return array(
            'lastReading' => $lastReading,
        );
    }
}
