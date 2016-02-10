<?php

namespace frontBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use frontBundle\Entity\Local;
use frontBundle\Form\LocalType;
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * @Route("/favoritos")
 */
class FavoritosController extends Controller
{
    
	/**
	 * list favoritos in session on page
	 *
	 * @Route("/", name="favoritos_index")
	 * @Method("GET")
	 */
	public function indexAction(Request $request){
		$session = $request->getSession();
		$favoritos = $session->get('favoritos');
		if(is_array($favoritos)){
			var_dump($favoritos);
		}
		
	}
    /**
     * save Favoritos via Ajax in session
     * @Route("/add", name="favoritos_add")
     * @Method("GET")
     */
    public function addAction(Request $request){
    	
    	$local = $request->get('local');
    	$session = $request->getSession();   	
    	$favoritos = $session->get('favoritos');
    	if(is_array($favoritos)){
    		if (!in_array($local, $favoritos)){
    			if(count($favoritos) <= 10){
    				array_push($favoritos, $local);
    				$session->set('favoritos',$favoritos);
    			}else{
    				array_shift($favoritos);
    				array_push($favoritos, $local);
    				$session->set('favoritos',$favoritos);
    			}
    		}
    	}else{
    		$favoritos = array($local);
    		$session->set('favoritos',$favoritos);
    	}
    	var_dump($favoritos);
    	return(new Response('Ok '.$local, Response::HTTP_OK));
    	
    }
    public function linkAction($local=1, Request $request) {
    	$session = $request->getSession();
    	$favoritos = $session->get('favoritos');
    	if(is_array($favoritos)){
	    	if(in_array($local, $favoritos)){
	    		$html = '<a href="#">Añadido en favoritos</a>';
	    	}else{
	    		$html = '<a href="#" id="favoritos_add">Añadir a Favoritos</a>';
	    	}
    	}
    	
    	return new Response($html);
    }
	
}
