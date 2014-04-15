<?php

namespace Setnet\ArtsenalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ArtMensajeCarpeta
 */
class ArtMensajeCarpeta
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
     * @var \DateTime
     */
    private $fechaCreacion;

    /**
     * @var string
     */
    private $borrado;

    /**
     * @var string
     */
    private $artMensajeCarpetacol;


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
     * @return ArtMensajeCarpeta
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
     * @param \DateTime $fechaCreacion
     * @return ArtMensajeCarpeta
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
     * Set borrado
     *
     * @param string $borrado
     * @return ArtMensajeCarpeta
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
     * Set artMensajeCarpetacol
     *
     * @param string $artMensajeCarpetacol
     * @return ArtMensajeCarpeta
     */
    public function setArtMensajeCarpetacol($artMensajeCarpetacol)
    {
        $this->artMensajeCarpetacol = $artMensajeCarpetacol;
    
        return $this;
    }

    /**
     * Get artMensajeCarpetacol
     *
     * @return string 
     */
    public function getArtMensajeCarpetacol()
    {
        return $this->artMensajeCarpetacol;
    }
}
