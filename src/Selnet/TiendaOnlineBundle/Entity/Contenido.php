<?php

namespace Selnet\TiendaOnlineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contenido
 */
class Contenido
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $categoria;

    /**
     * @var string
     */
    private $titulo;

    /**
     * @var string
     */
    private $rawContent;

    /**
     * @var string
     */
    private $contentFormatter;

    /**
     * @var integer
     */
    private $publicado;

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
     * Set categoria
     *
     * @param integer $categoria
     * @return Contenido
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;
    
        return $this;
    }

    /**
     * Get categoria
     *
     * @return integer 
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * Set titulo
     *
     * @param string $titulo
     * @return Contenido
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
     * Set rawContent
     *
     * @param string $rawContent
     * @return Contenido
     */
    public function setRawContent($rawContent)
    {
        $this->rawContent = $rawContent;
    
        return $this;
    }

    /**
     * Get rawContent
     *
     * @return string 
     */
    public function getRawContent()
    {
        return $this->rawContent;
    }

    /**
     * Set contentFormatter
     *
     * @param string $contentFormatter
     * @return Contenido
     */
    public function setContentFormatter($contentFormatter)
    {
        $this->contentFormatter = $contentFormatter;
    
        return $this;
    }

    /**
     * Get contentFormatter
     *
     * @return string 
     */
    public function getContentFormatter()
    {
        return $this->contentFormatter;
    }

    /**
     * Set publicado
     *
     * @param integer $publicado
     * @return Contenido
     */
    public function setPublicado($publicado)
    {
        $this->publicado = $publicado;
    
        return $this;
    }

    /**
     * Get publicado
     *
     * @return integer 
     */
    public function getPublicado()
    {
        return $this->publicado;
    }

    /**
     * Set created_at
     *
     * @param \DateTime $createdAt
     * @return Contenido
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
     * @return Contenido
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
    private $contenido;


    /**
     * Set contenido
     *
     * @param string $contenido
     * @return Contenido
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
}