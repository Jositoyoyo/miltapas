<?php

namespace WazeTaxiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('WazeTaxiBundle:Default:index.html.twig');
    }
}
