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
        $em = $this->getDoctrine()->getManager();
        $keys = $request->get('keys');

        $query = $em->createQuery(' 
                SELECT p
                FROM frontBundle:Local p
                WHERE p.nombre LIKE :local')
                ->setParameter('local', "%$keys%");
        $locales = $query->getResult();

        $html = '<ul>';
        if ($locales) {
            foreach ($locales as $local) {
                $html .= '<li '
                            . 'id="1'.$local->getId().'" '
                            . 'class="suggest-element" '
                            . 'data="'. $local->getNombre() . ', ' . $local->getDireccion() . ', ' . $local->getCiudad() . '" '
                            . 'local="'.$local->getId().'" >'
                            . $local->getNombre() . ', ' . $local->getDireccion() . ', ' . $local->getCiudad() .                              
                         '</li>';
            }
        } else {
            $html .= '<li>No hay resultados : <a href="'.$this->get('router')->generate('local_new').'">Añadir un nuevo local</a></li>';
        }
        $html .= '</ul>';

        return new response($html);
    }

    /**
     * @Route("/step_one", name="step_one")
     * @Method({"GET", "POST"})
     */
    public function stepOneAction(Request $request) {
        $local_nombre = $request->request->get('local_nombre');
        //$direccion = $request->request->get('local_direccion');
        //$ciudad = $request->request->get('local_ciudad');
        //si el nombre del local, ciudad y la calle son las misma es el mismo 
        $local = $this->getDoctrine()->getRepository('frontBundle:Local')->findBy(
                array('nombre' => 'El Molino',
                    'ciudad' => 'Madrid')
        );

        if ($local) {
            return $this->redirect('opinion_add', array('local_id' => 8));
            //return new Response('Existe el local');
        } else {
            return $this->redirect('local_new');
        }
    }

}
