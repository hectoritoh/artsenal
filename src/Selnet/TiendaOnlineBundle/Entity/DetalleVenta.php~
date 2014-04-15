<?php

namespace Selnet\TiendaOnlineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DetalleVenta
 */
class DetalleVenta
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $cantidad;

    /**
     * @var float
     */
    private $precio;

    /**
     * @var integer
     */
    private $borrado;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $updated_at;

    /**
     * @var \Selnet\TiendaOnlineBundle\Entity\Producto
     */
    private $producto;

    /**
     * @var \Selnet\TiendaOnlineBundle\Entity\Venta
     */
    private $venta;


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
     * Set cantidad
     *
     * @param integer $cantidad
     * @return DetalleVenta
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get cantidad
     *
     * @return integer 
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set precio
     *
     * @param float $precio
     * @return DetalleVenta
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get precio
     *
     * @return float 
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set borrado
     *
     * @param integer $borrado
     * @return DetalleVenta
     */
    public function setBorrado($borrado)
    {
        $this->borrado = $borrado;

        return $this;
    }

    /**
     * Get borrado
     *
     * @return integer 
     */
    public function getBorrado()
    {
        return $this->borrado;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return DetalleVenta
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
     * @return DetalleVenta
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
     * Set producto
     *
     * @param \Selnet\TiendaOnlineBundle\Entity\Producto $producto
     * @return DetalleVenta
     */
    public function setProducto(\Selnet\TiendaOnlineBundle\Entity\Producto $producto = null)
    {
        $this->producto = $producto;

        return $this;
    }

    /**
     * Get producto
     *
     * @return \Selnet\TiendaOnlineBundle\Entity\Producto 
     */
    public function getProducto()
    {
        return $this->producto;
    }

    /**
     * Set venta
     *
     * @param \Selnet\TiendaOnlineBundle\Entity\Venta $venta
     * @return DetalleVenta
     */
    public function setVenta(\Selnet\TiendaOnlineBundle\Entity\Venta $venta = null)
    {
        $this->venta = $venta;

        return $this;
    }

    /**
     * Get venta
     *
     * @return \Selnet\TiendaOnlineBundle\Entity\Venta 
     */
    public function getVenta()
    {
        return $this->venta;
    }
  

      public function preInsert()
    {
        $this->setBorrado(0);
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
