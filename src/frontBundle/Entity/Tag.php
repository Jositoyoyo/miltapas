<?php

namespace frontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="opinion"), 
 * @ORM\Entity
 */
class Tag {

    /**
     * @var integer
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     * @ORM\Column(name="local", type="integer", nullable=false)
     */
    private $local;

    /**
     * @var integer
     * @ORM\Column(name="opinion", type="integer", nullable=false)
     */
    private $opinion;

    /**
     * @var integer
     * @ORM\Column(name="categoria", type="integer", nullable=false)
     */
    private $categoria;

    public function getId() {
        return $this->id;
    }

    public function setLocal($local) {
        $this->local = $local;
        return $this;
    }

    public function getLocal() {
        return $this->local;
    }

    public function setOpinion($opinion) {
        $this->local = $opnion;
        return $this;
    }

    public function getOpinion() {
        return $this->opinion;
    }

    public function setCategoria($categoria) {
        $this->categoria = $categoria;
        return $this;
    }

    public function getCategoria() {
        return $this->categoria;
    }

}
