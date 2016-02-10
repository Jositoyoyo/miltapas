<?php

namespace miltapasBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('miltapasBundle:Default:index.html.twig');
    }
}
