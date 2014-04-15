<?php

namespace Setnet\ArtsenalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ArtMensaje
 */
class ArtMensaje
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $contenido;

    /**
     * @var string
     */
    private $titulo;

    /**
     * @var string
     */
    private $leido;

    /**
     * @var \DateTime
     */
    private $fechaLeido;

    /**
     * @var \DateTime
     */
    private $created;

    /**
     * @var \DateTime
     */
    private $updated;

    /**
     * @var string
     */
    private $borrado;

    /**
     * @var \Setnet\ArtsenalBundle\Entity\ArtMensajeCarpeta
     */
    private $carpeta;

    /**
     * @var \Setnet\ArtsenalBundle\Entity\ArtUsuario
     */
    private $destinatario;

    /**
     * @var \Setnet\ArtsenalBundle\Entity\ArtUsuario
     */
    private $remitente;


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
     * Set contenido
     *
     * @param string $contenido
     * @return ArtMensaje
     */
    public function setContenido($contenido)
    {
        $this->contenido = $contenido;

        return $this;
    }

    /**
     * Get contenido
     *
     * @return string 
     */
    public function getContenido()
    {
        return $this->contenido;
    }

    /**
     * Set titulo
     *
     * @param string $titulo
     * @return ArtMensaje
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get titulo
     *
     * @return string 
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set leido
     *
     * @param string $leido
     * @return ArtMensaje
     */
    public function setLeido($leido)
    {
        $this->leido = $leido;

        return $this;
    }

    /**
     * Get leido
     *
     * @return string 
     */
    public function getLeido()
    {
        return $this->leido;
    }

    /**
     * Set fechaLeido
     *
     * @param \DateTime $fechaLeido
     * @return ArtMensaje
     */
    public function setFechaLeido($fechaLeido)
    {
        $this->fechaLeido = $fechaLeido;

        return $this;
    }

    /**
     * Get fechaLeido
     *
     * @return \DateTime 
     */
    public function getFechaLeido()
    {
        return $this->fechaLeido;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return ArtMensaje
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return ArtMensaje
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime 
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set borrado
     *
     * @param string $borrado
     * @return ArtMensaje
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
     * Set carpeta
     *
     * @param \Setnet\ArtsenalBundle\Entity\ArtMensajeCarpeta $carpeta
     * @return ArtMensaje
     */
    public function setCarpeta(\Setnet\ArtsenalBundle\Entity\ArtMensajeCarpeta $carpeta = null)
    {
        $this->carpeta = $carpeta;

        return $this;
    }

    /**
     * Get carpeta
     *
     * @return \Setnet\ArtsenalBundle\Entity\ArtMensajeCarpeta 
     */
    public function getCarpeta()
    {
        return $this->carpeta;
    }

    /**
     * Set destinatario
     *
     * @param \Setnet\ArtsenalBundle\Entity\ArtUsuario $destinatario
     * @return ArtMensaje
     */
    public function setDestinatario(\Setnet\ArtsenalBundle\Entity\ArtUsuario $destinatario = null)
    {
        $this->destinatario = $destinatario;

        return $this;
    }

    /**
     * Get destinatario
     *
     * @return \Setnet\ArtsenalBundle\Entity\ArtUsuario 
     */
    public function getDestinatario()
    {
        return $this->destinatario;
    }

    /**
     * Set remitente
     *
     * @param \Setnet\ArtsenalBundle\Entity\ArtUsuario $remitente
     * @return ArtMensaje
     */
    public function setRemitente(\Setnet\ArtsenalBundle\Entity\ArtUsuario $remitente = null)
    {
        $this->remitente = $remitente;

        return $this;
    }

    /**
     * Get remitente
     *
     * @return \Setnet\ArtsenalBundle\Entity\ArtUsuario 
     */
    public function getRemitente()
    {
        return $this->remitente;
    }
}
