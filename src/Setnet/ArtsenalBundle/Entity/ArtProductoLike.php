<?php

namespace Setnet\ArtsenalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ArtProductoLike
 */
class ArtProductoLike
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
     * @var \Setnet\ArtsenalBundle\Entity\ArtUsuario
     */
    private $idUsuario;


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
     * @return ArtProductoLike
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
     * @return ArtProductoLike
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
     * Set idUsuario
     *
     * @param \Setnet\ArtsenalBundle\Entity\ArtUsuario $idUsuario
     * @return ArtProductoLike
     */
    public function setIdUsuario(\Setnet\ArtsenalBundle\Entity\ArtUsuario $idUsuario = null)
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    /**
     * Get idUsuario
     *
     * @return \Setnet\ArtsenalBundle\Entity\ArtUsuario 
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }
}
