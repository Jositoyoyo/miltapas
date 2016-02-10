<?php

namespace frontBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use frontBundle\Entity\Local;
use frontBundle\Form\LocalType;

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

        $locals = $em->getRepository('frontBundle:Local')->findAll();

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
        $form = $this->createForm('frontBundle\Form\LocalType', $local);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($local);
            $em->flush();
            //return new Response($local->getId());
            return $this->redirectToRoute('local_images_new', array('local_id' => $local->getId()));
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
    public function showAction(Local $local, Request $request)
    {
        $deleteForm = $this->createDeleteForm($local);
        $categoria = $local->getCategoria()->getId();
        $opiniones = $this->getOpinion($local->getId());
        $session = $request->getSession();
        //1º tomamos la session
        $favoritos = $session->get('favoritos');
        var_dump($favoritos);
        
        return $this->render('local/show.html.twig', array(
            'local' => $local,
            'delete_form' => $deleteForm->createView(),
        	'categoria' => $categoria,
        	'opiniones'=> $opiniones
        ));
    }
    /**
     * Listas opiniones * Puede que lo pase al controlador opiniones
     * @param int $id
     * return object
     */
	public function getOpinion($id=null){
		$em = $this->getDoctrine()->getManager();		
		$opiniones = $em->getRepository('frontBundle:Opinion')->findByLocal($id);
		return($opiniones);
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
        $editForm = $this->createForm('frontBundle\Form\LocalType', $local);
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
    public function relatedAction(){
    	$em = $this->getDoctrine()->getManager();
    	$related = $em->getRepository('frontBundle:Local')->findByCategoria(3);
    	
    	if ($related){
    		$html = '<ul>';
	    	foreach ($related as $rel){
	    		$html .= '<li>'.$rel->getNombre().'</li>';
	    	}
	    	$html .= '</ul>';
    	}
    	return new Response($html);
    }
}
