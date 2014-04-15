<?php

namespace Setnet\ArtsenalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ArtTiendaPolitica
 */
class ArtTiendaPolitica
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $mensajeBienvenidad;

    /**
     * @var string
     */
    private $pagos;

    /**
     * @var string
     */
    private $envio;

    /**
     * @var string
     */
    private $reembolso;

    /**
     * @var string
     */
    private $vendedor;

    /**
     * @var \Setnet\ArtsenalBundle\Entity\ArtTienda
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
     * Set mensajeBienvenidad
     *
     * @param string $mensajeBienvenidad
     * @return ArtTiendaPolitica
     */
    public function setMensajeBienvenidad($mensajeBienvenidad)
    {
        $this->mensajeBienvenidad = $mensajeBienvenidad;
    
        return $this;
    }

    /**
     * Get mensajeBienvenidad
     *
     * @return string 
     */
    public function getMensajeBienvenidad()
    {
        return $this->mensajeBienvenidad;
    }

    /**
     * Set pagos
     *
     * @param string $pagos
     * @return ArtTiendaPolitica
     */
    public function setPagos($pagos)
    {
        $this->pagos = $pagos;
    
        return $this;
    }

    /**
     * Get pagos
     *
     * @return string 
     */
    public function getPagos()
    {
        return $this->pagos;
    }

    /**
     * Set envio
     *
     * @param string $envio
     * @return ArtTiendaPolitica
     */
    public function setEnvio($envio)
    {
        $this->envio = $envio;
    
        return $this;
    }

    /**
     * Get envio
     *
     * @return string 
     */
    public function getEnvio()
    {
        return $this->envio;
    }

    /**
     * Set reembolso
     *
     * @param string $reembolso
     * @return ArtTiendaPolitica
     */
    public function setReembolso($reembolso)
    {
        $this->reembolso = $reembolso;
    
        return $this;
    }

    /**
     * Get reembolso
     *
     * @return string 
     */
    public function getReembolso()
    {
        return $this->reembolso;
    }

    /**
     * Set vendedor
     *
     * @param string $vendedor
     * @return ArtTiendaPolitica
     */
    public function setVendedor($vendedor)
    {
        $this->vendedor = $vendedor;
    
        return $this;
    }

    /**
     * Get vendedor
     *
     * @return string 
     */
    public function getVendedor()
    {
        return $this->vendedor;
    }

    /**
     * Set idTienda
     *
     * @param \Setnet\ArtsenalBundle\Entity\ArtTienda $idTienda
     * @return ArtTiendaPolitica
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
     * @var string
     */
    private $informacionAdicional;


    /**
     * Set informacionAdicional
     *
     * @param string $informacionAdicional
     * @return ArtTiendaPolitica
     */
    public function setInformacionAdicional($informacionAdicional)
    {
        $this->informacionAdicional = $informacionAdicional;
    
        return $this;
    }

    /**
     * Get informacionAdicional
     *
     * @return string 
     */
    public function getInformacionAdicional()
    {
        return $this->informacionAdicional;
    }
}
