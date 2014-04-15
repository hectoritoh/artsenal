<?php

namespace Setnet\ArtsenalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ArtUsuarioRol
 */
class ArtUsuarioRol
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
     * @var \Setnet\ArtsenalBundle\Entity\ArtRol
     */
    private $idRol;

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
     * @return ArtUsuarioRol
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
     * Set idRol
     *
     * @param \Setnet\ArtsenalBundle\Entity\ArtRol $idRol
     * @return ArtUsuarioRol
     */
    public function setIdRol(\Setnet\ArtsenalBundle\Entity\ArtRol $idRol = null)
    {
        $this->idRol = $idRol;
    
        return $this;
    }

    /**
     * Get idRol
     *
     * @return \Setnet\ArtsenalBundle\Entity\ArtRol 
     */
    public function getIdRol()
    {
        return $this->idRol;
    }

    /**
     * Set idUsuario
     *
     * @param \Setnet\ArtsenalBundle\Entity\ArtUsuario $idUsuario
     * @return ArtUsuarioRol
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
