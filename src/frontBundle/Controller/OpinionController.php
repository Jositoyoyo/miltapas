<?php

namespace frontBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use frontBundle\Entity\Opinion;
use frontBundle\Form\OpinionType;

/**
 * Opinion controller.
 *
 * @Route("/opinion")
 */
class OpinionController extends Controller
{
    /**
     * Lists all Opinion entities.
     *
     * @Route("/", name="opinion_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $opinions = $em->getRepository('frontBundle:Opinion')->findAll();

        return $this->render('opinion/index.html.twig', array(
            'opinions' => $opinions,
        ));
    }

    /**
     * Creates a new Opinion entity.
     *
     * @Route("/new", name="opinion_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $opinion = new Opinion();
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

    /**
     * Finds and displays a Opinion entity.
     *
     * @Route("/{id}", name="opinion_show")
     * @Method("GET")
     */
    public function showAction(Opinion $opinion)
    {
        $deleteForm = $this->createDeleteForm($opinion);

        return $this->render('opinion/show.html.twig', array(
            'opinion' => $opinion,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Opinion entity.
     *
     * @Route("/{id}/edit", name="opinion_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Opinion $opinion)
    {
        $deleteForm = $this->createDeleteForm($opinion);
        $editForm = $this->createForm('frontBundle\Form\OpinionType', $opinion);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($opinion);
            $em->flush();

            return $this->redirectToRoute('opinion_edit', array('id' => $opinion->getId()));
        }

        return $this->render('opinion/edit.html.twig', array(
            'opinion' => $opinion,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Opinion entity.
     *
     * @Route("/{id}", name="opinion_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Opinion $opinion)
    {
        $form = $this->createDeleteForm($opinion);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($opinion);
            $em->flush();
        }

        return $this->redirectToRoute('opinion_index');
    }

    /**
     * Creates a form to delete a Opinion entity.
     *
     * @param Opinion $opinion The Opinion entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Opinion $opinion)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('opinion_delete', array('id' => $opinion->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
