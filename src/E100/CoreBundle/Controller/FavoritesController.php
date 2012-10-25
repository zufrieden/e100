<?php

namespace E100\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;


class FavoritesController extends Controller
{
    /**
     * @Route("/", name="favorites")
     * @Template("E100CoreBundle:Favorites:favorites.html.twig")
     */
    public function indexAction()
    {
    	// User from session

    	$repositoryUser = $this->getDoctrine()->getRepository('E100CoreBundle:User');
    	$user = $repositoryUser->findOneById(1);

    	$favorites = $user->getFavorites();

        return array('favorites' => $favorites);
    }

	/**
     * @Route("/add/{id}", name="addFavorites")
     */
    public function addAction($id)
    {

    	$repository = $this->getDoctrine()->getRepository('E100CoreBundle:Text');
    	$text = $repository->findOneBy(array('id' => $id));
    	
    	// User from user session
    	$repositoryUser = $this->getDoctrine()->getRepository('E100CoreBundle:User');
    	$user = $repositoryUser->findOneById(1);
    	$user->addFavorite($text);	
    }

    /**
     * @Route("/delete/{id}", name="addFavorites")
     */
    public function deleteAction($id)
    {
    	$repositoryText = $this->getDoctrine()->getRepository('E100CoreBundle:Text');
    	$text = $repository->findOneById($id);

    	// User from user session
    	$repositoryUser = $this->getDoctrine()->getRepository('E100CoreBundle:User');
    	$user = $repositoryUser->findOneById(1);
    	$user->removeFavorite($text);
    }
}
