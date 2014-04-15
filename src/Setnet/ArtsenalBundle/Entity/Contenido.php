<?php

namespace Setnet\ArtsenalBundle\Entity;

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
     * @var string
     */
    private $categoria;

    /**
     * @var string
     */
    private $contenido;

    /**
     * @var string
     */
    private $titulo;

    /**
     * @var integer
     */
    private $orden;

    /**
     * @var string
     */
    private $estado;

    /**
     * @var \DateTime
     */
    private $created;

    /**
     * @var \DateTime
     */
    private $updated;


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
     * @param string $categoria
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
     * @return string 
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

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
     * Set orden
     *
     * @param integer $orden
     * @return Contenido
     */
    public function setOrden($orden)
    {
        $this->orden = $orden;
    
        return $this;
    }

    /**
     * Get orden
     *
     * @return integer 
     */
    public function getOrden()
    {
        return $this->orden;
    }

    /**
     * Set estado
     *
     * @param string $estado
     * @return Contenido
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
     * Set created
     *
     * @param \DateTime $created
     * @return Contenido
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
     * @return Contenido
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
    
    
    
    
    public function getEstadoNombre(){
            if(    $this->getEstado()==="S" ) return "Publicado" ;
            if(    $this->getEstado()==="N" ) return "No publicado" ;
        
    }
    
    public function getCategoriaNombre(){
       
                if($this->getCategoria() == "about" ) return  "Quienes Somos" ;
                if($this->getCategoria() == "politicas" ) return  "Politicas" ;
                if($this->getCategoria() == "preguntas" ) return  "Preguntas frecuentes" ; 
    }
}
