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
 * @Route("/Opiniones_ajax")
 */
class OpinionesAjaxController extends Controller
{
    
    public function indexAction($local=null)
    {    
    	$pagesize=1;
    	$page =  0 ;   	
    	$em = $this->getDoctrine()->getManager();
    		$opiniones = $em->createQuery(
    			"SELECT p
    			 FROM frontBundle:Opinion p 
    				WHERE p.local = :local
    				ORDER BY p.id DESC"
    				)
    		    ->setParameter('local', $local)
       			->setFirstResult($page)
    			->setMaxResults($pagesize)
    			->getResult();
    	$html = '<div id="opiniones">';
    	foreach($opiniones as $opinion){
    		$html .= '<p>'.$opinion->getDescripcion().'</p>'; 
    	}
    	$html .= '</div>';
    	$html .= '<a href="#" id="more">Mas opiniones</a>';
    	return new Response($html);
    			
    		
    }
    /**
     * Lists via ajax entities.
     *
     * @Route("/ajaxLoad", name="ajaxLoad")
     * @Method("GET")
     */
    public function ajaxLoadAction(Request $request){
    	$pagesize = 1;
    	$local = $request->get('local');
    	$page = $request->get('page');
    	
    	$em = $this->getDoctrine()->getManager();
    	$opiniones = $em->createQuery(
    			"SELECT p
    			 FROM frontBundle:Opinion p
    			 WHERE p.local = :local 
    			 ORDER BY p.id DESC"
    			)
    			->setParameter('local', $local)
    			->setFirstResult($page)
    			->setMaxResults($pagesize)
    			->getResult();
    	$html = '';
    	foreach($opiniones as $opinion){
    		$html .= '<p>'.$opinion->getDescripcion().'</p>'; 
    	}
    	return new Response($html);	
    }
	
}
