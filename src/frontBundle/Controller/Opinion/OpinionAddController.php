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
 * @Route("/opinion/add")
 */
class OpinionAddController extends Controller {

    /**
     * Creates a new Opinion entity.
     * @Route("/", name="opinion_new")
     * @Method({"GET", "POST"})
     */
    public function indexAction(Request $request) {
        //$local_id = $_REQUEST['local_id'];
        $local_id = $request->get('local_id');
        $local_id = (int)($local_id);
        $usuario_id = (int) (1);

        $img = new Img();
        $img->setUsuario($usuario_id);
        $img->setLocal($local_id);

        $local = $this->getDoctrine()
                ->getRepository('frontBundle:Local')
                ->findOneById($local_id);
        $usuario = $this->getDoctrine()
                ->getRepository('frontBundle:Usuario')
                ->findOneById(1);

        $opinion = new Opinion();
        $opinion->setLocal($local);
        $opinion->setUsuario($usuario);
        
        $tag = new Tag();       
        $opinion->getTags()->add($tag);
        
        $opinion->getFile()->add($img);
        //var_dump($opinion);

        $form = $this->createForm('frontBundle\Form\OpinionType', $opinion);
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $img->upload();
            $em->persist($img);
            $opinion->setImg($img->getPath());
            $opinion->setPublicado(true);
            
            $em->persist($opinion);
            $em->flush();
            /* Redirect a mis comentarios */
            return $this->redirectToRoute('opinion_show', array('id' => $opinion->getId()));
        }

        return $this->render('opinion/new.html.twig', array(
                    'opinion' => $opinion,
                    'form' => $form->createView(),
        ));
    }
    
    /**
     * @Route("/searchTagsCategory", name="searchTagsCategory")
     * @Method({"GET", "POST"})
     */
    public function searchTagsCategory() {
        $em = $em = $this->getDoctrine()->getManager();
        $em->getRepository('frontBundle:Categoria')->findAll();
        $html = '<a class="suggest-element" data="data" id="2">Pincha aqui</a>';
        return new Response($html);
    }
}
