<?php

namespace frontBundle\Controller\Local;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use frontBundle\Entity\Local;
use frontBundle\Entity\ImgRepository;
use frontBundle\Form\LocalType;

/**
 * @Route("/local/new")
 */
class LocalNewController extends Controller {
    /**
     * @Route("/", name="local_new")
     * @Method({"GET", "POST"})
     */
    public function indexAction(Request $request) {
        $local = new Local();
        $form = $this->createForm('frontBundle\Form\LocalType', $local);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($local);
            $em->flush();
            //return new Response($local->getId());
            return $this->redirectToRoute('opinion_add', array('local_id' => $local->getId()));
        }

        return $this->render('local/new.html.twig', array(
                    'local' => $local,
                    'form' => $form->createView(),
        ));
    }
       
}
