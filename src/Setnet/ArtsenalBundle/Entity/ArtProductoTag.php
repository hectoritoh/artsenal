<?php

namespace Setnet\ArtsenalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ArtProductoTag
 */
class ArtProductoTag
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $fechaCreacion;

    /**
     * @var \Setnet\ArtsenalBundle\Entity\ArtProducto
     */
    private $idProducto;

    /**
     * @var \Setnet\ArtsenalBundle\Entity\ArtTags
     */
    private $idTag;


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
     * Set fechaCreacion
     *
     * @param \DateTime $fechaCreacion
     * @return ArtProductoTag
     */
    public function setFechaCreacion($fechaCreacion)
    {
        $this->fechaCreacion = $fechaCreacion;
    
        return $this;
    }

    /**
     * Get fechaCreacion
     *
     * @return \DateTime 
     */
    public function getFechaCreacion()
    {
        return $this->fechaCreacion;
    }

    /**
     * Set idProducto
     *
     * @param \Setnet\ArtsenalBundle\Entity\ArtProducto $idProducto
     * @return ArtProductoTag
     */
    public function setIdProducto(\Setnet\ArtsenalBundle\Entity\ArtProducto $idProducto = null)
    {
        $this->idProducto = $idProducto;
    
        return $this;
    }

    /**
     * Get idProducto
     *
     * @return \Setnet\ArtsenalBundle\Entity\ArtProducto 
     */
    public function getIdProducto()
    {
        return $this->idProducto;
    }

    /**
     * Set idTag
     *
     * @param \Setnet\ArtsenalBundle\Entity\ArtTags $idTag
     * @return ArtProductoTag
     */
    public function setIdTag(\Setnet\ArtsenalBundle\Entity\ArtTags $idTag = null)
    {
        $this->idTag = $idTag;
    
        return $this;
    }

    /**
     * Get idTag
     *
     * @return \Setnet\ArtsenalBundle\Entity\ArtTags 
     */
    public function getIdTag()
    {
        return $this->idTag;
    }
}
