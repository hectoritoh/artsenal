<?php

namespace Setnet\ArtsenalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ArtTiendaDirFacturacion
 */
class ArtTiendaDirFacturacion
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $pais;

    /**
     * @var string
     */
    private $calle;

    /**
     * @var string
     */
    private $direccionInfo;

    /**
     * @var string
     */
    private $ciudad;

    /**
     * @var string
     */
    private $estado;

    /**
     * @var string
     */
    private $zip;

    /**
     * @var integer
     */
    private $idTienda;


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
     * Set pais
     *
     * @param string $pais
     * @return ArtTiendaDirFacturacion
     */
    public function setPais($pais)
    {
        $this->pais = $pais;
    
        return $this;
    }

    /**
     * Get pais
     *
     * @return string 
     */
    public function getPais()
    {
        return $this->pais;
    }

    /**
     * Set calle
     *
     * @param string $calle
     * @return ArtTiendaDirFacturacion
     */
    public function setCalle($calle)
    {
        $this->calle = $calle;
    
        return $this;
    }

    /**
     * Get calle
     *
     * @return string 
     */
    public function getCalle()
    {
        return $this->calle;
    }

    /**
     * Set direccionInfo
     *
     * @param string $direccionInfo
     * @return ArtTiendaDirFacturacion
     */
    public function setDireccionInfo($direccionInfo)
    {
        $this->direccionInfo = $direccionInfo;
    
        return $this;
    }

    /**
     * Get direccionInfo
     *
     * @return string 
     */
    public function getDireccionInfo()
    {
        return $this->direccionInfo;
    }

    /**
     * Set ciudad
     *
     * @param string $ciudad
     * @return ArtTiendaDirFacturacion
     */
    public function setCiudad($ciudad)
    {
        $this->ciudad = $ciudad;
    
        return $this;
    }

    /**
     * Get ciudad
     *
     * @return string 
     */
    public function getCiudad()
    {
        return $this->ciudad;
    }

    /**
     * Set estado
     *
     * @param string $estado
     * @return ArtTiendaDirFacturacion
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    
        return $this;
    }

    /**
     * Get estado
     *
     * @return string 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set zip
     *
     * @param string $zip
     * @return ArtTiendaDirFacturacion
     */
    public function setZip($zip)
    {
        $this->zip = $zip;
    
        return $this;
    }

    /**
     * Get zip
     *
     * @return string 
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * Set idTienda
     *
     * @param integer $idTienda
     * @return ArtTiendaDirFacturacion
     */
    public function setIdTienda($idTienda)
    {
        $this->idTienda = $idTienda;
    
        return $this;
    }

    /**
     * Get idTienda
     *
     * @return integer 
     */
    public function getIdTienda()
    {
        return $this->idTienda;
    }
}
