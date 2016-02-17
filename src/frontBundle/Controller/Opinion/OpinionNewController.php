<?php

namespace frontBundle\Controller\Opinion;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use frontBundle\Entity\Opinion;
use frontBundle\Entity\Tag;
use frontBundle\Entity\Img;
use frontBundle\Form\OpinionType;

/**
 * Opinion new controller.
 * @Route("/opinion/new")
 */
class OpinionNewController extends Controller {

    /**
     * @Route("/", name="opinion_new")
     * @Method({"GET"})
     */
    public function indexAction() {
        return $this->render('opinion/new.html.twig');
    }
    /**
     * @Route("/local_check", name="local_check")
     * @Method({"GET"})
     */
    public function localCheckAction(Request $request) {
        $re = $request->get('keys');
        $locales = $this->getDoctrine()->getRepository('frontBundle:Local')->findBy(
                array('nombre' => $re), array('id' => 'ASC'), $Limit = 50
        );
        $html = '<ul>';
        foreach($locales as $local){
            $html .= '<li>'.$local->getNombre().'</li>';
        }
        $html .= '<ul>';
        
        return new response($html);
    }
    /**
     * @Route("/step_one", name="step_one")
     * @Method({"GET", "POST"})
     */
    public function stepOneAction() {
        //si el nombre del local, ciudad y la calle son las misma es el mismo 
        $local = $this->getDoctrine()->getRepository('frontBundle:Local')->findBy(
                array('nombre' => 'Bar el Ideal',
                      'ciudad' => 'Madrid')
                );
        var_dump($local);
        return new Response('sds');
    }
}
