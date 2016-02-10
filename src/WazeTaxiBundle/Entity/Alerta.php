<?php

namespace WazeTaxiBundle\Entity;

/**
 * Alerta
 */
class Alerta
{
    /**
     * @var string
     */
    private $dateTime;

    /**
     * @var string
     */
    private $coordenadas;

    /**
     * @var string
     */
    private $descripcion;

    /**
     * @var string
     */
    private $direccion;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set dateTime
     *
     * @param string $dateTime
     *
     * @return Alerta
     */
    public function setDateTime($dateTime)
    {
        $this->dateTime = $dateTime;

        return $this;
    }

    /**
     * Get dateTime
     *
     * @return string
     */
    public function getDateTime()
    {
        return $this->dateTime;
    }

    /**
     * Set coordenadas
     *
     * @param string $coordenadas
     *
     * @return Alerta
     */
    public function setCoordenadas($coordenadas)
    {
        $this->coordenadas = $coordenadas;

        return $this;
    }

    /**
     * Get coordenadas
     *
     * @return string
     */
    public function getCoordenadas()
    {
        return $this->coordenadas;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Alerta
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
     * Set direccion
     *
     * @param string $direccion
     *
     * @return Alerta
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
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}

