<?php

namespace Selnet\TiendaOnlineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Venta
 */
class Venta
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $total;

    /**
     * @var string
     */
    private $usuario;

    /**
     * @var integer
     */
    private $verificada;

    /**
     * @var integer
     */
    private $envio;

    /**
     * @var integer
     */
    private $pago;

    /**
     * @var integer
     */
    private $estado;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $detalles;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->detalles = new \Doctrine\Common\Collections\ArrayCollection();
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

    /**
     * Set total
     *
     * @param string $total
     * @return Venta
     */
    public function setTotal($total)
    {
        $this->total = $total;
    
        return $this;
    }

    /**
     * Get total
     *
     * @return string 
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set usuario
     *
     * @param string $usuario
     * @return Venta
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

    /**
     * Set verificada
     *
     * @param integer $verificada
     * @return Venta
     */
    public function setVerificada($verificada)
    {
        $this->verificada = $verificada;
    
        return $this;
    }

    /**
     * Get verificada
     *
     * @return integer 
     */
    public function getVerificada()
    {
        return $this->verificada;
    }

    /**
     * Set envio
     *
     * @param integer $envio
     * @return Venta
     */
    public function setEnvio($envio)
    {
        $this->envio = $envio;
    
        return $this;
    }

    /**
     * Get envio
     *
     * @return integer 
     */
    public function getEnvio()
    {
        return $this->envio;
    }

    /**
     * Set pago
     *
     * @param integer $pago
     * @return Venta
     */
    public function setPago($pago)
    {
        $this->pago = $pago;
    
        return $this;
    }

    /**
     * Get pago
     *
     * @return integer 
     */
    public function getPago()
    {
        return $this->pago;
    }

    /**
     * Set estado
     *
     * @param integer $estado
     * @return Venta
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    
        return $this;
    }

    /**
     * Get estado
     *
     * @return integer 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Venta
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
     * @return Venta
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
     * Add detalles
     *
     * @param \Selnet\TiendaOnlineBundle\Entity\DetalleVenta $detalles
     * @return Venta
     */
    public function addDetalle(\Selnet\TiendaOnlineBundle\Entity\DetalleVenta $detalles)
    {
        $this->detalles[] = $detalles;
    
        return $this;
    }

    /**
     * Remove detalles
     *
     * @param \Selnet\TiendaOnlineBundle\Entity\DetalleVenta $detalles
     */
    public function removeDetalle(\Selnet\TiendaOnlineBundle\Entity\DetalleVenta $detalles)
    {
        $this->detalles->removeElement($detalles);
    }

    /**
     * Get detalles
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getDetalles()
    {
        return $this->detalles;
    }
    /**
     * @ORM\PrePersist
     */
    public function preInsert()
    {
        // Add your code here
    }

    /**
     * @ORM\PreUpdate
     */
    public function preUpdate()
    {
        // Add your code here
    }
}