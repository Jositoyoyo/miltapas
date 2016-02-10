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
 * Locales controller.
 *
 * @Route("mi_posicion")
 */
class miPositionController extends Controller {
    /**
     * Paginacion
     *
     * @Route("/", name="mi_posicion")
     * @Method("GET")
     */
    public function indexAction(Request $request) {
        return $this->render('local/cerca.html.twig');
    }
    /**
     * Paginacion
     *
     * @Route("/check", name="check")
     * @Method("GET")
     */
     public function checKAction(Request $request) {
         $x = $request->get('coordenadasX');
         return new Response("hello $x");
     }
    /**
     * Paginacion
     *
     * @Route("/ajaxRequest", name="ajaxRequest")
     * @Method("GET")
     */
    public function AjaxRequestAction(Request $request) {    
        //x=-3.65641729999993&y=40.4226965 ....
        $x = $request->get('coordenadasX');
        $y =  $request->get('coordenadasY');
        
        $x_1 = $x - 0.5 ;
        $x_2 = $x + 0.5 ;
        
        $y_1 = $y - 0.5;
        $y_2 = $y + 0.5;
        
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery("
            SELECT p
            FROM frontBundle:Local p
            WHERE (p.coordenadasX  BETWEEN :x_1 AND :x_2
            AND p.coordenadasY  BETWEEN :y_1 AND :y_2)
            AND p.categoria = 1")
                ->setParameter('x_1', $x_1)
                ->setParameter('x_2', $x_2)
                ->setParameter('y_1', $y_1)
                ->setParameter('y_2', $y_2)
                ->setMaxResults(30);
        $locals = $query->getResult();
        
         return $this->render('local/locales.html.twig', array(
                    'locals' => $locals,
                    'x'      => $x,
                    'y'      => $y
        ));
    }

}
