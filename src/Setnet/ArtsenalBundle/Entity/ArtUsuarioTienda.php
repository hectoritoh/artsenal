<?php

namespace Setnet\ArtsenalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ArtUsuarioTienda
 */
class ArtUsuarioTienda
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $fechaRegistro;

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
     * Set fechaRegistro
     *
     * @param \DateTime $fechaRegistro
     * @return ArtUsuarioTienda
     */
    public function setFechaRegistro($fechaRegistro)
    {
        $this->fechaRegistro = $fechaRegistro;
    
        return $this;
    }

    /**
     * Get fechaRegistro
     *
     * @return \DateTime 
     */
    public function getFechaRegistro()
    {
        return $this->fechaRegistro;
    }

    /**
     * Set idTienda
     *
     * @param \Setnet\ArtsenalBundle\Entity\ArtTienda $idTienda
     * @return ArtUsuarioTienda
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
     * @return ArtUsuarioTienda
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
