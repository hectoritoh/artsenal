<?php

namespace Setnet\ArtsenalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ArtCompra
 */
class ArtCompra
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var float
     */
    private $total;

    /**
     * @var string
     */
    private $descricion;

    /**
     * @var integer
     */
    private $usuario_id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $items;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->items = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @param float $total
     * @return ArtCompra
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
     * Set descricion
     *
     * @param string $descricion
     * @return ArtCompra
     */
    public function setDescricion($descricion)
    {
        $this->descricion = $descricion;

        return $this;
    }

    /**
     * Get descricion
     *
     * @return string 
     */
    public function getDescricion()
    {
        return $this->descricion;
    }

    /**
     * Set usuario_id
     *
     * @param integer $usuarioId
     * @return ArtCompra
     */
    public function setUsuarioId($usuarioId)
    {
        $this->usuario_id = $usuarioId;

        return $this;
    }

    /**
     * Get usuario_id
     *
     * @return integer 
     */
    public function getUsuarioId()
    {
        return $this->usuario_id;
    }

    /**
     * Add items
     *
     * @param \Setnet\ArtsenalBundle\Entity\ArtCartItem $items
     * @return ArtCompra
     */
    public function addItem(\Setnet\ArtsenalBundle\Entity\ArtCartItem $items)
    {
        $this->items[] = $items;

        return $this;
    }

    /**
     * Remove items
     *
     * @param \Setnet\ArtsenalBundle\Entity\ArtCartItem $items
     */
    public function removeItem(\Setnet\ArtsenalBundle\Entity\ArtCartItem $items)
    {
        $this->items->removeElement($items);
    }

    /**
     * Get items
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getItems()
    {
        return $this->items;
    }
}
