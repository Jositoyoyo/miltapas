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
        
    }
       
}
