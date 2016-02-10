<?php

namespace miltapasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Opinion
 *
 * @ORM\Table(name="opinion", indexes={@ORM\Index(name="fk_tapa_local_idx", columns={"local"}), @ORM\Index(name="fk_opinion_usuario1_idx", columns={"usuario"})})
 * @ORM\Entity
 */
class Opinion
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=255, nullable=false)
     */
    private $descripcion;

    /**
     * @var string
     *
     * @ORM\Column(name="img", type="string", length=255, nullable=true)
     */
    private $img;

    /**
     * @var integer
     *
     * @ORM\Column(name="puntuacion", type="integer", nullable=false)
     */
    private $puntuacion;

    /**
     * @var string
     *
     * @ORM\Column(name="publicado", type="string", length=45, nullable=true)
     */
    private $publicado;

    /**
     * @var \Usuario
     *
     * @ORM\ManyToOne(targetEntity="Usuario")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="usuario", referencedColumnName="id")
     * })
     */
    private $usuario;

    /**
     * @var \Local
     *
     * @ORM\ManyToOne(targetEntity="Local")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="local", referencedColumnName="id")
     * })
     */
    private $local;



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Opinion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set img
     *
     * @param string $img
     *
     * @return Opinion
     */
    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }

    /**
     * Get img
     *
     * @return string
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * Set puntuacion
     *
     * @param integer $puntuacion
     *
     * @return Opinion
     */
    public function setPuntuacion($puntuacion)
    {
        $this->puntuacion = $puntuacion;

        return $this;
    }

    /**
     * Get puntuacion
     *
     * @return integer
     */
    public function getPuntuacion()
    {
        return $this->puntuacion;
    }

    /**
     * Set publicado
     *
     * @param string $publicado
     *
     * @return Opinion
     */
    public function setPublicado($publicado)
    {
        $this->publicado = $publicado;

        return $this;
    }

    /**
     * Get publicado
     *
     * @return string
     */
    public function getPublicado()
    {
        return $this->publicado;
    }

    /**
     * Set usuario
     *
     * @param \miltapasBundle\Entity\Usuario $usuario
     *
     * @return Opinion
     */
    public function setUsuario(\miltapasBundle\Entity\Usuario $usuario = null)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return \miltapasBundle\Entity\Usuario
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set local
     *
     * @param \miltapasBundle\Entity\Local $local
     *
     * @return Opinion
     */
    public function setLocal(\miltapasBundle\Entity\Local $local = null)
    {
        $this->local = $local;

        return $this;
    }

    /**
     * Get local
     *
     * @return \miltapasBundle\Entity\Local
     */
    public function getLocal()
    {
        return $this->local;
    }
}
