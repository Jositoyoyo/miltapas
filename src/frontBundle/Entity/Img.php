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
class Img {

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
     * @ORM\Column(name="path", type="string", length=255, nullable=false)
     */
    private $path;

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
     * Get id
     *
     * @return integer
     */
    public function getId() {
        return $this->id;
    }

    public function setFile(UploadedFile $file = null) {
        $this->file = $file;
        return $this;
    }

    public function getFile() {
        return $this->file;
    }

    /**
     * Set path
     *
     * @param integer $path
     *
     * @return Img
     */
    public function setPath($path) {
        $this->local = $path;

        return $this;
    }

    /**
     * Get path
     *
     * @return varchar
     */
    public function getPath() {
        return $this->path;
    }

    /**
     * Set local
     *
     * @param integer $local
     *
     * @return integer
     */
    public function setLocal($local) {
        $this->local = $local;

        return $this;
    }

    /**
     * Get local
     *
     * @return integer
     */
    public function getLocal() {
        return $this->local;
    }

    /**
     * Set usuario
     *
     * @param integer $usuario
     *
     * @return Img
     */
    public function setUsuario($usuario) {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return integer
     */
    public function getUsuario() {
        return $this->usuario;
    }

    /*     * ***************** */

    public function getAbsolutePath() {
        return null === $this->path ? null : $this->getUploadRootDir() . '/' . $this->path;
    }

    public function getWebPath() {
        return null === $this->path ? null : $this->getUploadDir() . '/' . $this->path;
    }

    protected function getUploadRootDir() {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__ . '/../../../../web/' . $this->getUploadDir();
    }

    protected function getUploadDir() {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'uploads/';
    }
    protected function preupload() {
        $filename = sha1(uniqid(mt_rand(), true));
        $this->path = $filename.'.'.$this->getFile()->guessExtension();
    }
    public function upload() {

        if (null !== $this->getFile()) {
            $this->preupload();
            $this->getFile()->move($this->getUploadDir(), $this->path);
            //$this->file = null;
            return true;
        }
    }

}
