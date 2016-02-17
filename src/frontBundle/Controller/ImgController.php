<?php

namespace frontBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use frontBundle\Entity\Img;
use Symfony\Component\Form\Extension\Core\Type\FileType;

/**
 * Img controller.
 *
 * @Route("/images")
 */
class ImgController extends Controller {
    /**
     * Lists all Local entities.
     * @Route("/upload/images", name="upload_images")
     * @Method({"GET", "POST"})
     */
    public function uploadAction(Request $request) {
        $img = new Img();
        $form = $this->createFormBuilder($img)
                ->add('file', FileType::class)
                ->getForm();
        $img->setUsuario(1);
        $img->setLocal(1);
        
        if ($request->getMethod() == "POST") {            
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                
                $img->upload();
                
                $em->persist($img);
                $em->flush();
                return new Response($img->getId());
            }
        }       
        return $this->render('local/new.html.twig', array(
            'form' => $form->createView(),
        ));
    }
    
    /**
     * view Img
     * @Route("/local", name="images")
     * @Method("GET")
     */
    public function viewImageAction() {
        
        $em = $this->getDoctrine()->getManager();
        $images = $em->getRepository('frontBundle:Img')->findByLocal(1);
        $html= "";
        $path = "http://127.0.0.1/symfony/miltapas/web/uploads/";
        if ($images){
    		$html = '<ul>';
	    	foreach ($images as $img){
	    		$html .= '<li><img src="'.$path . $img->getPath().'"/></li>';
	    	}
	    	$html .= '</ul>';
    	}
    	return new Response($html);
       
    }

}
