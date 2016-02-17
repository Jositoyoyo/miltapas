<?php

namespace frontBundle\Entity;
use Doctrine\ORM\EntityRepository;

class ImgRepository  {
    public $em ;
    public function __construct($em) {
        $this->em = $em;
    }

    public function Gallery($em) {
       $query = $this->em->createQuery("SELECT p FROM frontBundle:Img p")
                ->getResult();
        return $query;
    }
    
    public function Galleries($em) {
        return $em->getRepository('frontBundle:Img')->findBy(
                array('local' => '1'), array('id' => 'ASC'), $myLimit = 2
        );
    }

}
//Se instancia si
//$images = new ImgRepository($this->getDoctrine()->getManager(), $local->getId());
  //      $images = $images->Gallery();