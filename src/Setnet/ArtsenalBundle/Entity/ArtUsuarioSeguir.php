<?php

namespace Setnet\ArtsenalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ArtUsuarioSeguir
 */
class ArtUsuarioSeguir
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
     * @var \Setnet\ArtsenalBundle\Entity\ArtTienda
     */
    private $idTienda;

    /**
     * @var \Setnet\ArtsenalBundle\Entity\ArtPerfil
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
     * @return ArtUsuarioSeguir
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
     * Set idTienda
     *
     * @param \Setnet\ArtsenalBundle\Entity\ArtTienda $idTienda
     * @return ArtUsuarioSeguir
     */
    public function setIdTienda(\Setnet\ArtsenalBundle\Entity\ArtTienda $idTienda = null)
    {
        $this->idTienda = $idTienda;
    
        return $this;
    }

    /**
     * Get idTienda
     *
     * @return \Setnet\ArtsenalBundle\Entity\ArtTienda 
     */
    public function getIdTienda()
    {
        return $this->idTienda;
    }

    /**
     * Set idUsuario
     *
     * @param \Setnet\ArtsenalBundle\Entity\ArtPerfil $idUsuario
     * @return ArtUsuarioSeguir
     */
    public function setIdUsuario(\Setnet\ArtsenalBundle\Entity\ArtPerfil $idUsuario = null)
    {
        $this->idUsuario = $idUsuario;
    
        return $this;
    }

    /**
     * Get idUsuario
     *
     * @return \Setnet\ArtsenalBundle\Entity\ArtPerfil 
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }
}
