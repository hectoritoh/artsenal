<?php

namespace Setnet\ArtsenalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ArtProductoFoto
 */
class ArtProductoFoto
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */     
    private $descripcion;

    /**
     * @var string
     */
    private $borrado;

    /**
     * @var \Setnet\ArtsenalBundle\Entity\ArtProducto
     */
    private $idProducto;



    public function __construct()
    {
        $this->url = "foto_producto.jpg";
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
     * Set url
     *
     * @param string $url
     * @return ArtProductoFoto
     */
    public function setUrl($url)
    {
        $this->url = $url;
    
        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return ArtProductoFoto
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
     * Set borrado
     *
     * @param string $borrado
     * @return ArtProductoFoto
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
     * Set idProducto
     *
     * @param \Setnet\ArtsenalBundle\Entity\ArtProducto $idProducto
     * @return ArtProductoFoto
     */
    public function setIdProducto(\Setnet\ArtsenalBundle\Entity\ArtProducto $idProducto = null)
    {
        $this->idProducto = $idProducto;
    
        return $this;
    }

    /**
     * Get idProducto
     *
     * @return \Setnet\ArtsenalBundle\Entity\ArtProducto 
     */
    public function getIdProducto()
    {
        return $this->idProducto;
    }
    
    
    
    
    
      
    
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
    return '/uploads/productos';
  }

  public function upload()
  {
      
      
      
    // the file property can be empty if the field is not required
    if ($this->file  === null ) {
        return;
    }
    
      $basepath  = $this->getUploadRootDir(); 
    
    // we use the original file name here but you should
    // sanitize it at least to avoid any security issues

    // move takes the target directory and then the target filename to move to
    $var1 = $this->getUploadRootDir($basepath); 
    $var2 = $this->file->getClientOriginalName(); 
    
    $this->file->move($this->getUploadRootDir($basepath), $this->file->getClientOriginalName());

    
    // set the path property to the filename where you'ved saved the file
    $this->setUrl($this->file->getClientOriginalName());
    

    // clean up the file property as you won't need it anymore
    $this->file = null;
  }
    
    
  
  function __toString() {
      return "" . $this->url;
  }
}
