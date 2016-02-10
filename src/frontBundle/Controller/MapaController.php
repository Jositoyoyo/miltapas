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
 * mapa controller.
 *
 * @Route("/mapa")
 */
class MapaController extends Controller
{
    /**
     * Lists all Local entities on the map Limit 0, 10 order by id desc
     * Filtros - nuevos, categoria
     * Paginacion
     *
     * @Route("/", name="mapa_index")
     * @Method("GET")
     */
    public function indexAction(Request $request)
    {
        return $this->render('mapa/index.html.twig');
    }
    
	
}
