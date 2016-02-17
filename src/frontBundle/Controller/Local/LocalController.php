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
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * @Route("/local")
 */
class LocalController extends Controller {
    /**
     * @Route("/", name="local_index")
     * @Method("GET")
     */
    public function indexAction(Request $request, $pagesize = 1) {
        $em = $this->getDoctrine()->getManager();

        $page = $request->get('page');
        $page = $page ? $page : 1 ;
        
        $query = $em->createQuery(
                        "SELECT p
                         FROM frontBundle:Local p
    					 WHERE p.publicado = 1
    					 ORDER BY p.id DESC"
                )
                ->setFirstResult($pagesize * ($page - 1))
                ->setMaxResults($pagesize);

        $local = new Paginator($query, $fetchJoinCollection = true);
        $totalItems = count($local);
	$current_page = ceil($totalItems / $pagesize);
       
        return $this->render('local/index.html.twig', array(
                    'locals' => $local,
                    'totalItems' => $totalItems,
                    'current_page' => $current_page,
        ));
    }

}
