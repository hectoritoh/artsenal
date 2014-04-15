<?php

namespace Setnet\ArtsenalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CmsSlider
 */
class CmsSlider
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $imagenUrl;

    /**
     * @var string
     */
    private $link;

    /**
     * @var string
     */
    private $descripcion;

    /**
     * @var string
     */
    private $estado;

    /**
     * @var \DateTime
     */
    private $fechaCreacion;


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
     * Set imagenUrl
     *
     * @param string $imagenUrl
     * @return CmsSlider
     */
    public function setImagenUrl($imagenUrl)
    {
        $this->imagenUrl = $imagenUrl;
    
        return $this;
    }

    /**
     * Get imagenUrl
     *
     * @return string 
     */
    public function getImagenUrl()
    {
        return $this->imagenUrl;
    }

    /**
     * Set link
     *
     * @param string $link
     * @return CmsSlider
     */
    public function setLink($link)
    {
        $this->link = $link;
    
        return $this;
    }

    /**
     * Get link
     *
     * @return string 
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     * @return CmsSlider
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
     * Set estado
     *
     * @param string $estado
     * @return CmsSlider
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
     * Set fechaCreacion
     *
     * @param \DateTime $fechaCreacion
     * @return CmsSlider
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
    
    
     
    
    
    
    
      protected $file;
      
      public function getFile() {
          return $this->file;
      }

      public function setFile($file) {
          $this->file = $file;
      }

            

  public function getAbsolutePath()
  {
      return null === $this->imagenUrl ? null : $this->getUploadRootDir().'/'.$this->imagenUrl;
  }

  public function getWebPath()
  {
    return null === $this->imagenUrl ? null : $this->getUploadDir().'/'.$this->imagenUrl;
  }

  protected function getUploadRootDir($basepath="")
  {
    // the absolute directory path where uploaded documents should be saved
    return __DIR__.'/../../../../web/'.$this->getUploadDir();
  }

  protected function getUploadDir()
  {
    // get rid of the __DIR__ so it doesn't screw when displaying uploaded doc/image in the view.
    return '/uploads/banners';
  }

  public function upload($basepath)
  {
      
      
      
    // the file property can be empty if the field is not required
//    if (null === $this->file) {
//        return;
//    }
    
    if (null === $basepath) {
        return;
    }    
    
    // we use the original file name here but you should
    // sanitize it at least to avoid any security issues

    // move takes the target directory and then the target filename to move to
    $var1 = $this->getUploadRootDir($basepath); 
    $var2 = $this->file->getClientOriginalName(); 
    
    $this->file->move($this->getUploadRootDir($basepath), $this->file->getClientOriginalName());

    
    // set the path property to the filename where you'ved saved the file
    $this->setImagenUrl($this->file->getClientOriginalName());
    

    // clean up the file property as you won't need it anymore
    $this->file = null;
  }
    
}
