<?php

namespace Selnet\TiendaOnlineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UsuarioPago
 */
class UsuarioPago
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nombre;

    /**
     * @var string
     */
    private $ccv;

    /**
     * @var string
     */
    private $mesVencimiento;

    /**
     * @var string
     */
    private $anioVencimiento;

    /**
     * @var string
     */
    private $nombreTarjeta;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @var string
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
     * @return UsuarioPago
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
     * Set ccv
     *
     * @param string $ccv
     * @return UsuarioPago
     */
    public function setCcv($ccv)
    {
        $this->ccv = $ccv;
    
        return $this;
    }

    /**
     * Get ccv
     *
     * @return string 
     */
    public function getCcv()
    {
        return $this->ccv;
    }

    /**
     * Set mesVencimiento
     *
     * @param string $mesVencimiento
     * @return UsuarioPago
     */
    public function setMesVencimiento($mesVencimiento)
    {
        $this->mesVencimiento = $mesVencimiento;
    
        return $this;
    }

    /**
     * Get mesVencimiento
     *
     * @return string 
     */
    public function getMesVencimiento()
    {
        return $this->mesVencimiento;
    }

    /**
     * Set anioVencimiento
     *
     * @param string $anioVencimiento
     * @return UsuarioPago
     */
    public function setAnioVencimiento($anioVencimiento)
    {
        $this->anioVencimiento = $anioVencimiento;
    
        return $this;
    }

    /**
     * Get anioVencimiento
     *
     * @return string 
     */
    public function getAnioVencimiento()
    {
        return $this->anioVencimiento;
    }

    /**
     * Set nombreTarjeta
     *
     * @param string $nombreTarjeta
     * @return UsuarioPago
     */
    public function setNombreTarjeta($nombreTarjeta)
    {
        $this->nombreTarjeta = $nombreTarjeta;
    
        return $this;
    }

    /**
     * Get nombreTarjeta
     *
     * @return string 
     */
    public function getNombreTarjeta()
    {
        return $this->nombreTarjeta;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return UsuarioPago
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
    
        return $this;
    }

    /**
     * Get created_at
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updated_at
     *
     * @param \DateTime $updatedAt
     * @return UsuarioPago
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;
    
        return $this;
    }

    /**
     * Get updated_at
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Set usuario
     *
     * @param string $usuario
     * @return UsuarioPago
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    
        return $this;
    }

    /**
     * Get usuario
     *
     * @return string 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }
}