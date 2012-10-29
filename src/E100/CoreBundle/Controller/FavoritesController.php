<?php

namespace E100\CoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\JsonResponse;


class FavoritesController extends Controller
{
    /**
     * @Route("/", name="favorites")
     * @Template("E100CoreBundle:Favorites:favorites.html.twig")
     */
    public function indexAction()
    {
    	// User from session

    	// Get User form Session
        $user = $this->getUser();

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
    	
    	// Get User form Session
        $user = $this->getUser();
    	
        try{
            $user->addFavorite($text);
            $this->getDoctrine()->getEntityManager()->persist($user);
            $this->getDoctrine()->getEntityManager()->flush();

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
     * @Route("/delete/{id}", name="deleteFavorites")
     */
    public function deleteAction($id)
    {
    	$repository = $this->getDoctrine()->getRepository('E100CoreBundle:Text');
        $text = $repository->findOneBy(array('id' => $id));

    	// Get User form Session
        $user = $this->getUser();

        try{
            $user->removeFavorite($text);
            $this->getDoctrine()->getEntityManager()->persist($user);
            $this->getDoctrine()->getEntityManager()->flush();

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
}
