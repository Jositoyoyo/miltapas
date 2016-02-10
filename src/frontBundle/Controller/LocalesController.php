<?php

namespace frontBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use frontBundle\Entity\Local;
use frontBundle\Form\LocalType;
use Doctrine\ORM\Tools\Pagination\Paginator;

/**
 * Locales controller.
 *
 * @Route("/locales")
 */
class LocalesController extends Controller {
    /**
     * Lists all Local entities. Limit 0, 10 order by id desc
     * Filtros - nuevos, categoria
     * Paginacion
     *
     * @Route("/", name="locales_index")
     * @Method("GET")
     */
    public function indexAction(Request $request, $pagesize = 2) {
        $categoria = $request->get('categoria');
        $ord = $request->get('ordenar');

        $page = $request->get('page');
        $page = $page ? $page : 1;
        $ord = $ord ? $ord : 'desc';

        $em = $this->getDoctrine()->getManager();
        if (!isset($categoria) || $categoria == null) {
            $query = $em->createQuery(
                    "SELECT p
    			 FROM frontBundle:Local p 
    				ORDER BY p.id DESC"
            );
        } else {
            $query = $em->createQuery(
                            "SELECT p, u
                         FROM frontBundle:Local p
                         JOIN p.categoria u
    					 WHERE u.id = :u
    					 ORDER BY p.id DESC"
                    )
                    ->setParameter('u', $categoria)
                    ->setFirstResult($pagesize * ($page - 1))
                    ->setMaxResults($pagesize);

            $locals = new Paginator($query, $fetchJoinCollection = true);
            $totalItems = count($locals);
            $pagesCount = ceil($totalItems / $pagesize);
        }

        return $this->render('locales/index.html.twig', array(
                    'locals' => $locals,
                    'totalItems' => $totalItems,
                    'pagesCount' => $pagesCount
        ));
    }   
     /**
     * 
     * @Route("/buscar", name="buscar")
     * @Method("GET")
     */
    public function buscarAction(Request $request) {
        
        $ciudad = $request->get('ciudad'); 
        $categoria = $request->get('categoria') ; 
        
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery("SELECT p
                                    FROM frontBundle:Local p
                                    WHERE p.ciudad LIKE :ciudad
                                    AND p.categoria = :categoria
                                    ORDER BY p.id DESC")
                ->setParameter('ciudad', $ciudad)
                ->setParameter('categoria', $categoria);
        $locals = $query->getResult();
        return $this->render('local/index.html.twig', array(
                    'locals' => $locals));
    }
}
