<?php

namespace Selnet\TiendaOnlineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categoria
 */
class Categoria
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
     * @return Categoria
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
     * @return Categoria
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
     * @return Categoria
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
     * @return Categoria
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
     * @return Categoria
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
     * @ORM\PrePersist
     */
    public function preInsertCategoria()
    {
        $this->setBorrado(0);
        $this->setCreatedAt(  new \DateTime() );
        $this->setUpdatedAt(  new \DateTime() );
    }

    /**
     * @ORM\PreUpdate
     */
    public function preUpdateCategoria()
    {
        $this->setUpdatedAt(  new \DateTime() );
    }



    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $subcategorias;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->subcategorias = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add subcategorias
     *
     * @param \Selnet\TiendaOnlineBundle\Entity\Subcategoria $subcategorias
     * @return Categoria
     */
    public function addSubcategoria(\Selnet\TiendaOnlineBundle\Entity\Subcategoria $subcategorias)
    {
        $this->subcategorias[] = $subcategorias;

        return $this;
    }

    /**
     * Remove subcategorias
     *
     * @param \Selnet\TiendaOnlineBundle\Entity\Subcategoria $subcategorias
     */
    public function removeSubcategoria(\Selnet\TiendaOnlineBundle\Entity\Subcategoria $subcategorias)
    {
        $this->subcategorias->removeElement($subcategorias);
    }

    /**
     * Get subcategorias
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSubcategorias()
    {
        return $this->subcategorias;
    }


    public function __toString(){
        if ($this->nombre == null) {
            return "Ingreso de nueva Categoria";
        }
        return $this->getNombre() . ""; 
    }
}
