<?php

namespace frontBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use frontBundle\Entity\Usuario;
use frontBundle\Form\UsuarioType;
use Symfony\Component\Validator\Constraints\Date;

/**
 * Usuario controller.
 *
 * @Route("/success")
 */
class RegistroSuccessController extends Controller {
    /**
     *
     * @Route("/", name="success")
     * @Method("GET")
     */
    public function indexAction() {
        return $this->render('usuario/success.html.twig');
    }
    private function sendMail(){
        
    }
    /**
     * Mediante un enlance damos de alta al usuario
     * @Route ("/validar", name="validar")
     * @Method("GET")
     */
    public function validarAction(){
        
    }
}
