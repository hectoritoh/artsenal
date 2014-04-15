<?php

namespace Setnet\ArtsenalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ArtSuscripciones
 */
class ArtSuscripciones
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
     * @var integer
     */
    private $cantidadProductos;

    /**
     * @var integer
     */
    private $descuentoFeria;

    /**
     * @var integer
     */
    private $destacarEnPgina;

    /**
     * @var integer
     */
    private $beneficioPartners;

    /**
     * @var integer
     */
    private $postBlogs;

    /**
     * @var string
     */
    private $codigoHtml;

    /**
     * @var string
     */
    private $descripcion;

    /**
     * @var string
     */
    private $costo;

    /**
     * @var integer
     */
    private $estado;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $usuarios;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->usuarios = new \Doctrine\Common\Collections\ArrayCollection();
    }

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
     * @return ArtSuscripciones
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
     * Set cantidadProductos
     *
     * @param integer $cantidadProductos
     * @return ArtSuscripciones
     */
    public function setCantidadProductos($cantidadProductos)
    {
        $this->cantidadProductos = $cantidadProductos;

        return $this;
    }

    /**
     * Get cantidadProductos
     *
     * @return integer 
     */
    public function getCantidadProductos()
    {
        return $this->cantidadProductos;
    }

    /**
     * Set descuentoFeria
     *
     * @param integer $descuentoFeria
     * @return ArtSuscripciones
     */
    public function setDescuentoFeria($descuentoFeria)
    {
        $this->descuentoFeria = $descuentoFeria;

        return $this;
    }

    /**
     * Get descuentoFeria
     *
     * @return integer 
     */
    public function getDescuentoFeria()
    {
        return $this->descuentoFeria;
    }

    /**
     * Set destacarEnPgina
     *
     * @param integer $destacarEnPgina
     * @return ArtSuscripciones
     */
    public function setDestacarEnPgina($destacarEnPgina)
    {
        $this->destacarEnPgina = $destacarEnPgina;

        return $this;
    }

    /**
     * Get destacarEnPgina
     *
     * @return integer 
     */
    public function getDestacarEnPgina()
    {
        return $this->destacarEnPgina;
    }

    /**
     * Set beneficioPartners
     *
     * @param integer $beneficioPartners
     * @return ArtSuscripciones
     */
    public function setBeneficioPartners($beneficioPartners)
    {
        $this->beneficioPartners = $beneficioPartners;

        return $this;
    }

    /**
     * Get beneficioPartners
     *
     * @return integer 
     */
    public function getBeneficioPartners()
    {
        return $this->beneficioPartners;
    }

    /**
     * Set postBlogs
     *
     * @param integer $postBlogs
     * @return ArtSuscripciones
     */
    public function setPostBlogs($postBlogs)
    {
        $this->postBlogs = $postBlogs;

        return $this;
    }

    /**
     * Get postBlogs
     *
     * @return integer 
     */
    public function getPostBlogs()
    {
        return $this->postBlogs;
    }

    /**
     * Set codigoHtml
     *
     * @param string $codigoHtml
     * @return ArtSuscripciones
     */
    public function setCodigoHtml($codigoHtml)
    {
        $this->codigoHtml = $codigoHtml;

        return $this;
    }

    /**
     * Get codigoHtml
     *
     * @return string 
     */
    public function getCodigoHtml()
    {
        return $this->codigoHtml;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return ArtSuscripciones
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string 
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set costo
     *
     * @param string $costo
     * @return ArtSuscripciones
     */
    public function setCosto($costo)
    {
        $this->costo = $costo;

        return $this;
    }

    /**
     * Get costo
     *
     * @return string 
     */
    public function getCosto()
    {
        return $this->costo;
    }

    /**
     * Set estado
     *
     * @param integer $estado
     * @return ArtSuscripciones
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return integer 
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Add usuarios
     *
     * @param \Setnet\ArtsenalBundle\Entity\ArtUsuario $usuarios
     * @return ArtSuscripciones
     */
    public function addUsuario(\Setnet\ArtsenalBundle\Entity\ArtUsuario $usuarios)
    {
        $this->usuarios[] = $usuarios;

        return $this;
    }

    /**
     * Remove usuarios
     *
     * @param \Setnet\ArtsenalBundle\Entity\ArtUsuario $usuarios
     */
    public function removeUsuario(\Setnet\ArtsenalBundle\Entity\ArtUsuario $usuarios)
    {
        $this->usuarios->removeElement($usuarios);
    }

    /**
     * Get usuarios
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsuarios()
    {
        return $this->usuarios;
    }
}
