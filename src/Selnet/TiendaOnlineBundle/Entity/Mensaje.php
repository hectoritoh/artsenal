<?php

namespace Selnet\TiendaOnlineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Mensaje
 */
class Mensaje
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $recibe;

    /**
     * @var string
     */
    private $envia;

    /**
     * @var string
     */
    private $contenido;

    /**
     * @var integer
     */
    private $leido;

    /**
     * @var integer
     */
    private $borrado;

    /**
     * @var \DateTime
     */
    private $created_at;

    /**
     * @var \DateTime
     */
    private $updated_at;


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
     * Set recibe
     *
     * @param string $recibe
     * @return Mensaje
     */
    public function setRecibe($recibe)
    {
        $this->recibe = $recibe;
    
        return $this;
    }

    /**
     * Get recibe
     *
     * @return string 
     */
    public function getRecibe()
    {
        return $this->recibe;
    }

    /**
     * Set envia
     *
     * @param string $envia
     * @return Mensaje
     */
    public function setEnvia($envia)
    {
        $this->envia = $envia;
    
        return $this;
    }

    /**
     * Get envia
     *
     * @return string 
     */
    public function getEnvia()
    {
        return $this->envia;
    }

    /**
     * Set contenido
     *
     * @param string $contenido
     * @return Mensaje
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
     * Set leido
     *
     * @param integer $leido
     * @return Mensaje
     */
    public function setLeido($leido)
    {
        $this->leido = $leido;
    
        return $this;
    }

    /**
     * Get leido
     *
     * @return integer 
     */
    public function getLeido()
    {
        return $this->leido;
    }

    /**
     * Set borrado
     *
     * @param integer $borrado
     * @return Mensaje
     */
    public function setBorrado($borrado)
    {
        $this->borrado = $borrado;
    
        return $this;
    }

    /**
     * Get borrado
     *
     * @return integer 
     */
    public function getBorrado()
    {
        return $this->borrado;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Mensaje
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;
    
        return $this;
    }

    /**
     * Get created_at
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updated_at
     *
     * @param \DateTime $updatedAt
     * @return Mensaje
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;
    
        return $this;
    }

    /**
     * Get updated_at
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }
    /**
     * @ORM\PrePersist
     */
    public function preInsert()
    {
        // Add your code here
    }

    /**
     * @ORM\PreUpdate
     */
    public function preUpdate()
    {
        // Add your code here
    }
    /**
     * @var string
     */
    private $tipo_notificacion;

    /**
     * @var string
     */
    private $titulo;

    /**
     * @var string
     */
    private $usuario_recibe;

    /**
     * @var string
     */
    private $usuario_envia;

    /**
     * @var integer
     */
    private $estado;


    /**
     * Set tipo_notificacion
     *
     * @param string $tipoNotificacion
     * @return Mensaje
     */
    public function setTipoNotificacion($tipoNotificacion)
    {
        $this->tipo_notificacion = $tipoNotificacion;
    
        return $this;
    }

    /**
     * Get tipo_notificacion
     *
     * @return string 
     */
    public function getTipoNotificacion()
    {
        return $this->tipo_notificacion;
    }

    /**
     * Set titulo
     *
     * @param string $titulo
     * @return Mensaje
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
     * Set usuario_recibe
     *
     * @param string $usuarioRecibe
     * @return Mensaje
     */
    public function setUsuarioRecibe($usuarioRecibe)
    {
        $this->usuario_recibe = $usuarioRecibe;
    
        return $this;
    }

    /**
     * Get usuario_recibe
     *
     * @return string 
     */
    public function getUsuarioRecibe()
    {
        return $this->usuario_recibe;
    }

    /**
     * Set usuario_envia
     *
     * @param string $usuarioEnvia
     * @return Mensaje
     */
    public function setUsuarioEnvia($usuarioEnvia)
    {
        $this->usuario_envia = $usuarioEnvia;
    
        return $this;
    }

    /**
     * Get usuario_envia
     *
     * @return string 
     */
    public function getUsuarioEnvia()
    {
        return $this->usuario_envia;
    }

    /**
     * Set estado
     *
     * @param integer $estado
     * @return Mensaje
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
}