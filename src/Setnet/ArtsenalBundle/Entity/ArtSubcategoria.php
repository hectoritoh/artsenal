<?php

namespace Setnet\ArtsenalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ArtSubcategoria
 */
class ArtSubcategoria
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
    private $fechaCreacion;

    /**
     * @var string
     */
    private $borrado;

    /**
     * @var \Setnet\ArtsenalBundle\Entity\ArtCategoria
     */
    private $idCategoria;


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
     * @return ArtSubcategoria
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
     * Set fechaCreacion
     *
     * @param string $fechaCreacion
     * @return ArtSubcategoria
     */
    public function setFechaCreacion($fechaCreacion)
    {
        $this->fechaCreacion = $fechaCreacion;
    
        return $this;
    }

    /**
     * Get fechaCreacion
     *
     * @return string 
     */
    public function getFechaCreacion()
    {
        return $this->fechaCreacion;
    }

    /**
     * Set borrado
     *
     * @param string $borrado
     * @return ArtSubcategoria
     */
    public function setBorrado($borrado)
    {
        $this->borrado = $borrado;
    
        return $this;
    }

    /**
     * Get borrado
     *
     * @return string 
     */
    public function getBorrado()
    {
        return $this->borrado;
    }

    /**
     * Set idCategoria
     *
     * @param \Setnet\ArtsenalBundle\Entity\ArtCategoria $idCategoria
     * @return ArtSubcategoria
     */
    public function setIdCategoria(\Setnet\ArtsenalBundle\Entity\ArtCategoria $idCategoria = null)
    {
        $this->idCategoria = $idCategoria;
    
        return $this;
    }

    /**
     * Get idCategoria
     *
     * @return \Setnet\ArtsenalBundle\Entity\ArtCategoria 
     */
    public function getIdCategoria()
    {
        return $this->idCategoria;
    }



    function __toString() {
        return $this->nombre . "";
    }
}
