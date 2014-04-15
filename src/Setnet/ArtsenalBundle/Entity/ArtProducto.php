<?php

namespace Setnet\ArtsenalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ArtProducto
 */
class ArtProducto
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $titulo;

    /**
     * @var string
     */
    private $descripcion;

    /**
     * @var float
     */
    private $cantidad;

    /**
     * @var float
     */
    private $precio;

    /**
     * @var \DateTime
     */
    private $tipoElaboracion;

    /**
     * @var integer
     */
    private $paisOrigen;

    /**
     * @var string
     */
    private $estado;

    /**
     * @var integer
     */
    private $visitas;

    /**
     * @var integer
     */
    private $favorito;

    /**
     * @var \DateTime
     */
    private $created;

    /**
     * @var \DateTime
     */
    private $updated;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $imagenes;

    /**
     * @var \Setnet\ArtsenalBundle\Entity\ArtTienda
     */
    private $idTienda;

    /**
     * @var \Setnet\ArtsenalBundle\Entity\ArtSubcategoria
     */
    private $idSubcategoria;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->imagenes = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set titulo
     *
     * @param string $titulo
     * @return ArtProducto
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
     * Set descripcion
     *
     * @param string $descripcion
     * @return ArtProducto
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
     * Set cantidad
     *
     * @param float $cantidad
     * @return ArtProducto
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    
        return $this;
    }

    /**
     * Get cantidad
     *
     * @return float 
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set precio
     *
     * @param float $precio
     * @return ArtProducto
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;
    
        return $this;
    }

    /**
     * Get precio
     *
     * @return float 
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set tipoElaboracion
     *
     * @param \DateTime $tipoElaboracion
     * @return ArtProducto
     */
    public function setTipoElaboracion($tipoElaboracion)
    {
        $this->tipoElaboracion = $tipoElaboracion;
    
        return $this;
    }

    /**
     * Get tipoElaboracion
     *
     * @return \DateTime 
     */
    public function getTipoElaboracion()
    {
        return $this->tipoElaboracion;
    }

    /**
     * Set paisOrigen
     *
     * @param integer $paisOrigen
     * @return ArtProducto
     */
    public function setPaisOrigen($paisOrigen)
    {
        $this->paisOrigen = $paisOrigen;
    
        return $this;
    }

    /**
     * Get paisOrigen
     *
     * @return integer 
     */
    public function getPaisOrigen()
    {
        return $this->paisOrigen;
    }

    /**
     * Set estado
     *
     * @param string $estado
     * @return ArtProducto
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
     * Set visitas
     *
     * @param integer $visitas
     * @return ArtProducto
     */
    public function setVisitas($visitas)
    {
        $this->visitas = $visitas;
    
        return $this;
    }

    /**
     * Get visitas
     *
     * @return integer 
     */
    public function getVisitas()
    {
        return $this->visitas;
    }

    /**
     * Set favorito
     *
     * @param integer $favorito
     * @return ArtProducto
     */
    public function setFavorito($favorito)
    {
        $this->favorito = $favorito;
    
        return $this;
    }

    /**
     * Get favorito
     *
     * @return integer 
     */
    public function getFavorito()
    {
        return $this->favorito;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return ArtProducto
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
     * @return ArtProducto
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
     * Add imagenes
     *
     * @param \Setnet\ArtsenalBundle\Entity\ArtProductoFoto $imagenes
     * @return ArtProducto
     */
    public function addImagene(\Setnet\ArtsenalBundle\Entity\ArtProductoFoto $imagenes)
    {
        $this->imagenes[] = $imagenes;
    
        return $this;
    }

    /**
     * Remove imagenes
     *
     * @param \Setnet\ArtsenalBundle\Entity\ArtProductoFoto $imagenes
     */
    public function removeImagene(\Setnet\ArtsenalBundle\Entity\ArtProductoFoto $imagenes)
    {
        $this->imagenes->removeElement($imagenes);
    }

    /**
     * Get imagenes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getImagenes()
    {
        return $this->imagenes;
    }

    /**
     * Set idTienda
     *
     * @param \Setnet\ArtsenalBundle\Entity\ArtTienda $idTienda
     * @return ArtProducto
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
     * Set idSubcategoria
     *
     * @param \Setnet\ArtsenalBundle\Entity\ArtSubcategoria $idSubcategoria
     * @return ArtProducto
     */
    public function setIdSubcategoria(\Setnet\ArtsenalBundle\Entity\ArtSubcategoria $idSubcategoria = null)
    {
        $this->idSubcategoria = $idSubcategoria;
    
        return $this;
    }

    /**
     * Get idSubcategoria
     *
     * @return \Setnet\ArtsenalBundle\Entity\ArtSubcategoria 
     */
    public function getIdSubcategoria()
    {
        return $this->idSubcategoria;
    }
}
