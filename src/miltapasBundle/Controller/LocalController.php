<?php

namespace miltapasBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use miltapasBundle\Entity\Local;
use miltapasBundle\Form\LocalType;

/**
 * Local controller.
 *
 * @Route("/local")
 */
class LocalController extends Controller
{
    /**
     * Lists all Local entities.
     *
     * @Route("/", name="local_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $locals = $em->getRepository('miltapasBundle:Local')->findAll();

        return $this->render('local/index.html.twig', array(
            'locals' => $locals,
        ));
    }

    /**
     * Creates a new Local entity.
     *
     * @Route("/new", name="local_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $local = new Local();
        $form = $this->createForm('miltapasBundle\Form\LocalType', $local);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($local);
            $em->flush();

            return $this->redirectToRoute('local_show', array('id' => $local->getId()));
        }

        return $this->render('local/new.html.twig', array(
            'local' => $local,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Local entity.
     *
     * @Route("/{id}", name="local_show")
     * @Method("GET")
     */
    public function showAction(Local $local)
    {
        $deleteForm = $this->createDeleteForm($local);

        return $this->render('local/show.html.twig', array(
            'local' => $local,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Local entity.
     *
     * @Route("/{id}/edit", name="local_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Local $local)
    {
        $deleteForm = $this->createDeleteForm($local);
        $editForm = $this->createForm('miltapasBundle\Form\LocalType', $local);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($local);
            $em->flush();

            return $this->redirectToRoute('local_edit', array('id' => $local->getId()));
        }

        return $this->render('local/edit.html.twig', array(
            'local' => $local,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Local entity.
     *
     * @Route("/{id}", name="local_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Local $local)
    {
        $form = $this->createDeleteForm($local);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($local);
            $em->flush();
        }

        return $this->redirectToRoute('local_index');
    }

    /**
     * Creates a form to delete a Local entity.
     *
     * @param Local $local The Local entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Local $local)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('local_delete', array('id' => $local->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
