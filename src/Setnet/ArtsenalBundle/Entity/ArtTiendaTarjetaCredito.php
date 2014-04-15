<?php

namespace Setnet\ArtsenalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ArtTiendaTarjetaCredito
 */
class ArtTiendaTarjetaCredito
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $tarjeta;

    /**
     * @var string
     */
    private $numeroTarjeta;

    /**
     * @var string
     */
    private $mesExpira;

    /**
     * @var string
     */
    private $anioExpira;

    /**
     * @var string
     */
    private $ccv;

    /**
     * @var string
     */
    private $titular;

    /**
     * @var string
     */
    private $telefono;

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
     * Set tarjeta
     *
     * @param string $tarjeta
     * @return ArtTiendaTarjetaCredito
     */
    public function setTarjeta($tarjeta)
    {
        $this->tarjeta = $tarjeta;
    
        return $this;
    }

    /**
     * Get tarjeta
     *
     * @return string 
     */
    public function getTarjeta()
    {
        return $this->tarjeta;
    }

    /**
     * Set numeroTarjeta
     *
     * @param string $numeroTarjeta
     * @return ArtTiendaTarjetaCredito
     */
    public function setNumeroTarjeta($numeroTarjeta)
    {
        $this->numeroTarjeta = $numeroTarjeta;
    
        return $this;
    }

    /**
     * Get numeroTarjeta
     *
     * @return string 
     */
    public function getNumeroTarjeta()
    {
        return $this->numeroTarjeta;
    }

    /**
     * Set mesExpira
     *
     * @param string $mesExpira
     * @return ArtTiendaTarjetaCredito
     */
    public function setMesExpira($mesExpira)
    {
        $this->mesExpira = $mesExpira;
    
        return $this;
    }

    /**
     * Get mesExpira
     *
     * @return string 
     */
    public function getMesExpira()
    {
        return $this->mesExpira;
    }

    /**
     * Set anioExpira
     *
     * @param string $anioExpira
     * @return ArtTiendaTarjetaCredito
     */
    public function setAnioExpira($anioExpira)
    {
        $this->anioExpira = $anioExpira;
    
        return $this;
    }

    /**
     * Get anioExpira
     *
     * @return string 
     */
    public function getAnioExpira()
    {
        return $this->anioExpira;
    }

    /**
     * Set ccv
     *
     * @param string $ccv
     * @return ArtTiendaTarjetaCredito
     */
    public function setCcv($ccv)
    {
        $this->ccv = $ccv;
    
        return $this;
    }

    /**
     * Get ccv
     *
     * @return string 
     */
    public function getCcv()
    {
        return $this->ccv;
    }

    /**
     * Set titular
     *
     * @param string $titular
     * @return ArtTiendaTarjetaCredito
     */
    public function setTitular($titular)
    {
        $this->titular = $titular;
    
        return $this;
    }

    /**
     * Get titular
     *
     * @return string 
     */
    public function getTitular()
    {
        return $this->titular;
    }

    /**
     * Set telefono
     *
     * @param string $telefono
     * @return ArtTiendaTarjetaCredito
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    
        return $this;
    }

    /**
     * Get telefono
     *
     * @return string 
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * Set pais
     *
     * @param string $pais
     * @return ArtTiendaTarjetaCredito
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
     * @return ArtTiendaTarjetaCredito
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
     * @return ArtTiendaTarjetaCredito
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
     * @return ArtTiendaTarjetaCredito
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
     * @return ArtTiendaTarjetaCredito
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
     * @return ArtTiendaTarjetaCredito
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
     * @return ArtTiendaTarjetaCredito
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
