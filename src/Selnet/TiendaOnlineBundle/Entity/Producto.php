<?php

namespace Selnet\TiendaOnlineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Producto
 */
class Producto
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
    private $descripcion;

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
     * @var \Doctrine\Common\Collections\Collection
     */
    private $imagenes;

    /**
     * @var \Selnet\TiendaOnlineBundle\Entity\ProductoOcasion
     */
    private $ocasion;

    /**
     * @var \Selnet\TiendaOnlineBundle\Entity\ProductoDestinatario
     */
    private $destinatario;

    /**
     * @var \Selnet\TiendaOnlineBundle\Entity\Subcategoria
     */
    private $subcategoria;

    /**
     * @var \Selnet\TiendaOnlineBundle\Entity\Tienda
     */
    private $tienda;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->imagenes = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set nombre
     *
     * @param string $nombre
     * @return Producto
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
     * Set descripcion
     *
     * @param string $descripcion
     * @return Producto
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
     * Set borrado
     *
     * @param integer $borrado
     * @return Producto
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
     * @return Producto
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
     * @return Producto
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
     * Add imagenes
     *
     * @param \Selnet\TiendaOnlineBundle\Entity\ProductoImagen $imagenes
     * @return Producto
     */
    public function addImagene(\Selnet\TiendaOnlineBundle\Entity\ProductoImagen $imagenes)
    {
        $this->imagenes[] = $imagenes;

        return $this;
    }

    /**
     * Remove imagenes
     *
     * @param \Selnet\TiendaOnlineBundle\Entity\ProductoImagen $imagenes
     */
    public function removeImagene(\Selnet\TiendaOnlineBundle\Entity\ProductoImagen $imagenes)
    {
        $this->imagenes->removeElement($imagenes);
    }

    /**
     * Get imagenes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getImagenes()
    {
        return $this->imagenes;
    }

    /**
     * Set ocasion
     *
     * @param \Selnet\TiendaOnlineBundle\Entity\ProductoOcasion $ocasion
     * @return Producto
     */
    public function setOcasion(\Selnet\TiendaOnlineBundle\Entity\ProductoOcasion $ocasion = null)
    {
        $this->ocasion = $ocasion;

        return $this;
    }

    /**
     * Get ocasion
     *
     * @return \Selnet\TiendaOnlineBundle\Entity\ProductoOcasion 
     */
    public function getOcasion()
    {
        return $this->ocasion;
    }

    /**
     * Set destinatario
     *
     * @param \Selnet\TiendaOnlineBundle\Entity\ProductoDestinatario $destinatario
     * @return Producto
     */
    public function setDestinatario(\Selnet\TiendaOnlineBundle\Entity\ProductoDestinatario $destinatario = null)
    {
        $this->destinatario = $destinatario;

        return $this;
    }

    /**
     * Get destinatario
     *
     * @return \Selnet\TiendaOnlineBundle\Entity\ProductoDestinatario 
     */
    public function getDestinatario()
    {
        return $this->destinatario;
    }

    /**
     * Set subcategoria
     *
     * @param \Selnet\TiendaOnlineBundle\Entity\Subcategoria $subcategoria
     * @return Producto
     */
    public function setSubcategoria(\Selnet\TiendaOnlineBundle\Entity\Subcategoria $subcategoria = null)
    {
        $this->subcategoria = $subcategoria;

        return $this;
    }

    /**
     * Get subcategoria
     *
     * @return \Selnet\TiendaOnlineBundle\Entity\Subcategoria 
     */
    public function getSubcategoria()
    {
        return $this->subcategoria;
    }

    /**
     * Set tienda
     *
     * @param \Selnet\TiendaOnlineBundle\Entity\Tienda $tienda
     * @return Producto
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
    /**
     * @ORM\PrePersist
     */
    public function preInsert()
    {
        // Add your code here
        //     $this->setBorrado(0);
        $this->setCreatedAt(  new \DateTime() );
        $this->setUpdatedAt(  new \DateTime() );
    }

    /**
     * @ORM\PreUpdate
     */
    public function preUpdate()
    {

        $this->setUpdatedAt(  new \DateTime() );
        // Add your code here
    }
    /**
     * @var integer
     */
    private $cantidad;

    /**
     * @var float
     */
    private $precio;


    /**
     * Set cantidad
     *
     * @param integer $cantidad
     * @return Producto
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
     * @return Producto
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


    function __toString(){
        return $this->nombre . "";
    }
    /**
     * @var integer
     */
    private $visitas;

    /**
     * @var integer
     */
    private $favoritos;


    /**
     * Set visitas
     *
     * @param integer $visitas
     * @return Producto
     */
    public function setVisitas($visitas)
    {
        $this->visitas = $visitas;
    
        return $this;
    }

    /**
     * Get visitas
     *
     * @return integer 
     */
    public function getVisitas()
    {
        return $this->visitas;
    }

    /**
     * Set favoritos
     *
     * @param integer $favoritos
     * @return Producto
     */
    public function setFavoritos($favoritos)
    {
        $this->favoritos = $favoritos;
    
        return $this;
    }

    /**
     * Get favoritos
     *
     * @return integer 
     */
    public function getFavoritos()
    {
        return $this->favoritos;
    }
    /**
     * @var string
     */
    private $slug;


    /**
     * Set slug
     *
     * @param string $slug
     * @return Producto
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    
        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }
}