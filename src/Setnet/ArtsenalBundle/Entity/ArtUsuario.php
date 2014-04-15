<?php

namespace Setnet\ArtsenalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
/**
 * ArtUsuario
 */
class ArtUsuario extends BaseUser
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var \DateTime
     */
    private $fechaCreacion;

    /**
     * @var string
     */
    private $borrado;

    /**
     * @var \DateTime
     */
    private $ultimoLogin;

    /**
     * @var integer
     */
    private $configuracionCompleta;

    /**
     * @var \Setnet\ArtsenalBundle\Entity\ArtTienda
     */
    private $tienda;

    /**
     * @var \Setnet\ArtsenalBundle\Entity\ArtSuscripciones
     */
    private $suscripcion;


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
     * @return ArtUsuario
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
     * @return ArtUsuario
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
     * Set ultimoLogin
     *
     * @param \DateTime $ultimoLogin
     * @return ArtUsuario
     */
    public function setUltimoLogin($ultimoLogin)
    {
        $this->ultimoLogin = $ultimoLogin;

        return $this;
    }

    /**
     * Get ultimoLogin
     *
     * @return \DateTime 
     */
    public function getUltimoLogin()
    {
        return $this->ultimoLogin;
    }

    /**
     * Set configuracionCompleta
     *
     * @param integer $configuracionCompleta
     * @return ArtUsuario
     */
    public function setConfiguracionCompleta($configuracionCompleta)
    {
        $this->configuracionCompleta = $configuracionCompleta;

        return $this;
    }

    /**
     * Get configuracionCompleta
     *
     * @return integer 
     */
    public function getConfiguracionCompleta()
    {
        return $this->configuracionCompleta;
    }

    /**
     * Set tienda
     *
     * @param \Setnet\ArtsenalBundle\Entity\ArtTienda $tienda
     * @return ArtUsuario
     */
    public function setTienda(\Setnet\ArtsenalBundle\Entity\ArtTienda $tienda = null)
    {
        $this->tienda = $tienda;

        return $this;
    }

    /**
     * Get tienda
     *
     * @return \Setnet\ArtsenalBundle\Entity\ArtTienda 
     */
    public function getTienda()
    {
        return $this->tienda;
    }

    /**
     * Set suscripcion
     *
     * @param \Setnet\ArtsenalBundle\Entity\ArtSuscripciones $suscripcion
     * @return ArtUsuario
     */
    public function setSuscripcion(\Setnet\ArtsenalBundle\Entity\ArtSuscripciones $suscripcion = null)
    {
        $this->suscripcion = $suscripcion;

        return $this;
    }

    /**
     * Get suscripcion
     *
     * @return \Setnet\ArtsenalBundle\Entity\ArtSuscripciones 
     */
    public function getSuscripcion()
    {
        return $this->suscripcion;
    }
}
