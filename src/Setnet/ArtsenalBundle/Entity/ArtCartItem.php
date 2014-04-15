<?php

namespace Setnet\ArtsenalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ArtCartItem
 */
class ArtCartItem
{
    /**
     * @var integer
     */
    protected  $id;

    /**
     * @var float
     */
    private $precio;

    /**
     * @var integer
     */
    private $cantidad;

    /**
     * @var string
     */
    private $descripcion;

    /**
     * @var float
     */
    private $total;

    /**
     * @var \Setnet\ArtsenalBundle\Entity\ArtCart
     */
    private $cart;

    /**
     * @var \Setnet\ArtsenalBundle\Entity\ArtProducto
     */
    private $producto;


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
     * Set precio
     *
     * @param float $precio
     * @return ArtCartItem
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
     * Set cantidad
     *
     * @param integer $cantidad
     * @return ArtCartItem
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
     * Set descripcion
     *
     * @param string $descripcion
     * @return ArtCartItem
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
     * Set total
     *
     * @param float $total
     * @return ArtCartItem
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get total
     *
     * @return float 
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set cart
     *
     * @param \Setnet\ArtsenalBundle\Entity\ArtCart $cart
     * @return ArtCartItem
     */
    public function setCart(\Setnet\ArtsenalBundle\Entity\ArtCart $cart = null)
    {
        $this->cart = $cart;

        return $this;
    }

    /**
     * Get cart
     *
     * @return \Setnet\ArtsenalBundle\Entity\ArtCart 
     */
    public function getCart()
    {
        return $this->cart;
    }

    /**
     * Set producto
     *
     * @param \Setnet\ArtsenalBundle\Entity\ArtProducto $producto
     * @return ArtCartItem
     */
    public function setProducto(\Setnet\ArtsenalBundle\Entity\ArtProducto $producto = null)
    {
        $this->producto = $producto;

        return $this;
    }

    /**
     * Get producto
     *
     * @return \Setnet\ArtsenalBundle\Entity\ArtProducto 
     */
    public function getProducto()
    {
        return $this->producto;
    }
}
