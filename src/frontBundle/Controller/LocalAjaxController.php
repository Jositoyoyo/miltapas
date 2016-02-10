<?php

namespace frontBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use frontBundle\Entity\Local;

/**
 * LocalAjax controller.
 *
 * @Route("/localajax")
 */
class LocalAjaxController extends Controller
{
    /**
     * Lists all Local entities.
     *
     * @Route("/buscar_local", name="buscar_local")
     * @Method("POST")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $locals = $em->getRepository('frontBundle:Local')->findAll();
        $html = '<ul>';
       
            $html.= '<li><a id="0-1" class="suggest-element" data="el puerto">El puerto</a></li>';
                    $html.= '<li><a id="0-2" class="suggest-element" data="Manolo">Manolo</a></li>';

        $html .= '</ul>';
        return new Response($html);
        
    }

    
}
