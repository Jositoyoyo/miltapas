<?php

namespace frontBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use frontBundle\Entity\Opinion;
use frontBundle\Form\OpinionType;

/**
 * @Route("/opinion")
 */
class OpinionAddController extends Controller
{
    /**
     * Creates a new Opinion entity.
     * @Route("/add/{id}", name="add_opinion")
     * @Method({"GET", "POST"})
     */
    public function addAction($id, Request $request)
    {
        $opinion = new Opinion();
        $opinion->setLocal(1);
        $opinion->setUsuario(1);
        $form = $this->createForm('frontBundle\Form\OpinionType', $opinion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($opinion);
            $em->flush();

            return $this->redirectToRoute('opinion_show', array('id' => $opinion->getId()));
        }

        return $this->render('opinion/new.html.twig', array(
            'opinion' => $opinion,
            'form' => $form->createView(),
        ));
    }
   
}
