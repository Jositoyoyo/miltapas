<?php

namespace WazeTaxiBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use WazeTaxiBundle\Entity\Alerta;
use WazeTaxiBundle\Form\AlertaType;

/**
 * Alerta controller.
 *
 */
class AlertaController extends Controller
{
    /**
     * Lists all Alerta entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $alertas = $em->getRepository('WazeTaxiBundle:Alerta')->findAll();

        return $this->render('alerta/index.html.twig', array(
            'alertas' => $alertas,
        ));
    }
public function mapAction()
    {
        $em = $this->getDoctrine()->getManager();

        $alertas = $em->getRepository('WazeTaxiBundle:Alerta')->findAll();

        return $this->render('alerta/map.html.twig', array(
            'alertas' => $alertas,
        ));
    }
    /**
     * Creates a new Alerta entity.
     *
     */
    public function newAction(Request $request)
    {
        $alertum = new Alerta();
        $form = $this->createForm('WazeTaxiBundle\Form\AlertaType', $alertum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($alertum);
            $em->flush();

            return $this->redirectToRoute('alerta_show', array('id' => $alertum->getId()));
        }

        return $this->render('alerta/new.html.twig', array(
            'alertum' => $alertum,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Alerta entity.
     *
     */
    public function showAction(Alerta $alertum)
    {
        $deleteForm = $this->createDeleteForm($alertum);

        return $this->render('alerta/show.html.twig', array(
            'alertum' => $alertum,
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Displays a form to edit an existing Alerta entity.
     *
     */
    public function editAction(Request $request, Alerta $alertum)
    {
        $deleteForm = $this->createDeleteForm($alertum);
        $editForm = $this->createForm('WazeTaxiBundle\Form\AlertaType', $alertum);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($alertum);
            $em->flush();

            return $this->redirectToRoute('alerta_edit', array('id' => $alertum->getId()));
        }

        return $this->render('alerta/edit.html.twig', array(
            'alertum' => $alertum,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Alerta entity.
     *
     */
    public function deleteAction(Request $request, Alerta $alertum)
    {
        $form = $this->createDeleteForm($alertum);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($alertum);
            $em->flush();
        }

        return $this->redirectToRoute('alerta_index');
    }

    /**
     * Creates a form to delete a Alerta entity.
     *
     * @param Alerta $alertum The Alerta entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Alerta $alertum)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('alerta_delete', array('id' => $alertum->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
    
}
