<?php

namespace Setnet\ArtsenalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ArtTienda
 */
class ArtTienda
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
     * @var string
     */
    private $imagenCabecera;

    /**
     * @var string
     */
    private $titulo;

    /**
     * @var string
     */
    private $mensajeCliente;

    /**
     * @var string
     */
    private $anuncio;

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
     * @var integer
     */
    private $idUsuario;


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
     * @return ArtTienda
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
     * Set imagenCabecera
     *
     * @param string $imagenCabecera
     * @return ArtTienda
     */
    public function setImagenCabecera($imagenCabecera)
    {
        $this->imagenCabecera = $imagenCabecera;
    
        return $this;
    }

    /**
     * Get imagenCabecera
     *
     * @return string 
     */
    public function getImagenCabecera()
    {
        return $this->imagenCabecera;
    }

    /**
     * Set titulo
     *
     * @param string $titulo
     * @return ArtTienda
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
     * Set mensajeCliente
     *
     * @param string $mensajeCliente
     * @return ArtTienda
     */
    public function setMensajeCliente($mensajeCliente)
    {
        $this->mensajeCliente = $mensajeCliente;
    
        return $this;
    }

    /**
     * Get mensajeCliente
     *
     * @return string 
     */
    public function getMensajeCliente()
    {
        return $this->mensajeCliente;
    }

    /**
     * Set anuncio
     *
     * @param string $anuncio
     * @return ArtTienda
     */
    public function setAnuncio($anuncio)
    {
        $this->anuncio = $anuncio;
    
        return $this;
    }

    /**
     * Get anuncio
     *
     * @return string 
     */
    public function getAnuncio()
    {
        return $this->anuncio;
    }

    /**
     * Set estado
     *
     * @param string $estado
     * @return ArtTienda
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
     * @return ArtTienda
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
     * @return ArtTienda
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
     * Set idUsuario
     *
     * @param integer $idUsuario
     * @return ArtTienda
     */
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    
        return $this;
    }

    /**
     * Get idUsuario
     *
     * @return integer 
     */
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }
    
    
    
    
    
    ////// tienda 
	
	
      protected $file;
      
      public function getFile() {
          return $this->file;
      }

      public function setFile($file) {
          $this->file = $file;
      }

      
      
      
      
      
      
            

  public function getAbsolutePath()
  {
      return null === $this->$url ? null : $this->getUploadRootDir().'/'.$this->$url;
  }

  public function getWebPath()
  {
    return null === $this->$url ? null : $this->getUploadDir().'/'.$this->$url;
  }

  protected function getUploadRootDir($basepath="")
  {
    // the absolute directory path where uploaded documents should be saved
    return __DIR__.'/../../../../web/'.$this->getUploadDir();
  }

  protected function getUploadDir()
  {
    // get rid of the __DIR__ so it doesn't screw when displaying uploaded doc/image in the view.
    return '/uploads/tiendas';
  }

  public function upload()
  {
      
      
      
    // the file property can be empty if the field is not required
//    if (null === $this->file) {
//        return;
//    }
    
      $basepath  = $this->getUploadRootDir(); 
    
    // we use the original file name here but you should
    // sanitize it at least to avoid any security issues

    // move takes the target directory and then the target filename to move to
    $var1 = $this->getUploadRootDir($basepath); 
    $var2 = $this->file->getClientOriginalName(); 
    
    $this->file->move($this->getUploadRootDir($basepath), $this->file->getClientOriginalName());

    
    // set the path property to the filename where you'ved saved the file
    $this->setImagenCabecera($this->file->getClientOriginalName());
    

    // clean up the file property as you won't need it anymore
    $this->file = null;
  }
    
    
    
    
    
}
