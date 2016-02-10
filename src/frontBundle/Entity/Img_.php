<?php

namespace frontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Img
 *
 * @ORM\Table(name="img")
 * @ORM\Entity
 */
class Img
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
     * @Assert\File(maxSize="6000000")
     */
    private $file;
    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255, nullable=false)
     */
    private $nombre;

    /**
     * @var integer
     *
     * @ORM\Column(name="local", type="integer", nullable=false)
     */
    private $local;

    /**
     * @var integer
     *
     * @ORM\Column(name="usuario", type="integer", nullable=false)
     */
    private $usuario;
    
    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;
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
     * Set local
     * @param integer $local
     * @return Local
     */
    public function setLocal($local)
    {
        $this->local = $local;

        return $this;
    }
    
    /**
     * Get local
     * @return integer
     */
    public function getLocal()
    {
        return $this->local;
    }
    
    /**
     * Set usuario
     * @param integer $usuario
     * @return Usuario
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
        return $this;
    }
    
    /**
     * Get usuario
     * @return integer
     */
    public function getUsuario()
    {
        return $this->usuario;
    } 
    /**
     * Get getUploadRootDir
     * @return string
     */
    public function getUploadRootDir()
    {
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }
    /**
     * Get getUploadDir
     * @return string
     */
    protected function getUploadDir()
    {
        return '/uploads/local';
    }

}

