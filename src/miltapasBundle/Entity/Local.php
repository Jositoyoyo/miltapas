<?php

namespace miltapasBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Local
 *
 * @ORM\Table(name="local", uniqueConstraints={@ORM\UniqueConstraint(name="direccion_UNIQUE", columns={"direccion"}), @ORM\UniqueConstraint(name="nombre_UNIQUE", columns={"nombre"})}, indexes={@ORM\Index(name="fk_local_categoria1_idx", columns={"categoria"}), @ORM\Index(name="fk_local_usuario1_idx", columns={"usuario"})})
 * @ORM\Entity
 */
class Local
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
     * @ORM\Column(name="nombre", type="string", length=45, nullable=false)
     */
    private $nombre;

    /**
     * @var string
     *
     * @ORM\Column(name="direccion", type="string", length=255, nullable=false)
     */
    private $direccion;

    /**
     * @var string
     *
     * @ORM\Column(name="Ciudad", type="string", length=65, nullable=false)
     */
    private $ciudad;

    /**
     * @var integer
     *
     * @ORM\Column(name="telefono", type="integer", nullable=true)
     */
    private $telefono;

    /**
     * @var string
     *
     * @ORM\Column(name="web", type="string", length=65, nullable=true)
     */
    private $web;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fecha", type="date", nullable=true)
     */
    private $fecha;

    /**
     * @var float
     *
     * @ORM\Column(name="coordenadas_x", type="float", precision=10, scale=0, nullable=false)
     */
    private $coordenadasX;

    /**
     * @var float
     *
     * @ORM\Column(name="coordenadas_y", type="float", precision=10, scale=0, nullable=false)
     */
    private $coordenadasY;

    /**
     * @var string
     *
     * @ORM\Column(name="img", type="string", length=255, nullable=true)
     */
    private $img;

    /**
     * @var boolean
     *
     * @ORM\Column(name="publicado", type="boolean", nullable=true)
     */
    private $publicado;

    /**
     * @var \Categoria
     *
     * @ORM\ManyToOne(targetEntity="Categoria")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="categoria", referencedColumnName="id")
     * })
     */
    private $categoria;

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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Local
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     *
     * @return Local
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set ciudad
     *
     * @param string $ciudad
     *
     * @return Local
     */
    public function setCiudad($ciudad)
    {
        $this->ciudad = $ciudad;

        return $this;
    }

    /**
     * Get ciudad
     *
     * @return string
     */
    public function getCiudad()
    {
        return $this->ciudad;
    }

    /**
     * Set telefono
     *
     * @param integer $telefono
     *
     * @return Local
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;

        return $this;
    }

    /**
     * Get telefono
     *
     * @return integer
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set web
     *
     * @param string $web
     *
     * @return Local
     */
    public function setWeb($web)
    {
        $this->web = $web;

        return $this;
    }

    /**
     * Get web
     *
     * @return string
     */
    public function getWeb()
    {
        return $this->web;
    }

    /**
     * Set fecha
     *
     * @param \DateTime $fecha
     *
     * @return Local
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;

        return $this;
    }

    /**
     * Get fecha
     *
     * @return \DateTime
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * Set coordenadasX
     *
     * @param float $coordenadasX
     *
     * @return Local
     */
    public function setCoordenadasX($coordenadasX)
    {
        $this->coordenadasX = $coordenadasX;

        return $this;
    }

    /**
     * Get coordenadasX
     *
     * @return float
     */
    public function getCoordenadasX()
    {
        return $this->coordenadasX;
    }

    /**
     * Set coordenadasY
     *
     * @param float $coordenadasY
     *
     * @return Local
     */
    public function setCoordenadasY($coordenadasY)
    {
        $this->coordenadasY = $coordenadasY;

        return $this;
    }

    /**
     * Get coordenadasY
     *
     * @return float
     */
    public function getCoordenadasY()
    {
        return $this->coordenadasY;
    }

    /**
     * Set img
     *
     * @param string $img
     *
     * @return Local
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
     * Set publicado
     *
     * @param boolean $publicado
     *
     * @return Local
     */
    public function setPublicado($publicado)
    {
        $this->publicado = $publicado;

        return $this;
    }

    /**
     * Get publicado
     *
     * @return boolean
     */
    public function getPublicado()
    {
        return $this->publicado;
    }

    /**
     * Set categoria
     *
     * @param \miltapasBundle\Entity\Categoria $categoria
     *
     * @return Local
     */
    public function setCategoria(\miltapasBundle\Entity\Categoria $categoria = null)
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * Get categoria
     *
     * @return \miltapasBundle\Entity\Categoria
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * Set usuario
     *
     * @param \miltapasBundle\Entity\Usuario $usuario
     *
     * @return Local
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
}
