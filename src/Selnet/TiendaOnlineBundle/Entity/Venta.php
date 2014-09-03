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
     * @var integer
     */
    private $verificada;

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
     * @var \Selnet\TiendaOnlineBundle\Entity\Usuario
     */
    private $usuario;

    /**
     * @var \Selnet\TiendaOnlineBundle\Entity\Tienda
     */
    private $tienda;

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
     * Set usuario
     *
     * @param \Selnet\TiendaOnlineBundle\Entity\Usuario $usuario
     * @return Venta
     */
    public function setUsuario(\Selnet\TiendaOnlineBundle\Entity\Usuario $usuario = null)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return \Selnet\TiendaOnlineBundle\Entity\Usuario 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Set tienda
     *
     * @param \Selnet\TiendaOnlineBundle\Entity\Tienda $tienda
     * @return Venta
     */
    public function setTienda(\Selnet\TiendaOnlineBundle\Entity\Tienda $tienda = null)
    {
        $this->tienda = $tienda;

        return $this;
    }

    /**
     * Get tienda
     *
     * @return \Selnet\TiendaOnlineBundle\Entity\Tienda 
     */
    public function getTienda()
    {
        return $this->tienda;
    }




        public function preInsert()
    {
        
        $this->setCreatedAt(  new \DateTime() );
        $this->setUpdatedAt(  new \DateTime() );
    }

    /**
     * @ORM\PreUpdate
     */
    public function preUpdate()
    {
        $this->setUpdatedAt(  new \DateTime() );
    }


   
}