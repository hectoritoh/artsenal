<?php

namespace Selnet\TiendaOnlineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * ProductoImagen
 */
class ProductoImagen
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
     * Set url
     *
     * @param string $url
     * @return ProductoImagen
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
     * Set borrado
     *
     * @param integer $borrado
     * @return ProductoImagen
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
     * @return ProductoImagen
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
     * @return ProductoImagen
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
        $this->setBorrado(0);
        $this->setCreatedAt(  new \DateTime() );
        $this->setUpdatedAt(  new \DateTime() );
    }

    /**
     * @ORM\PreUpdate
     */
    public function preUpdate()
    {
        $this->setUpdatedAt(  new \DateTime() );

        // Add your code here
    }
    /**
     * @var \Selnet\TiendaOnlineBundle\Entity\Producto
     */
    private $producto;


    /**
     * Set producto
     *
     * @param \Selnet\TiendaOnlineBundle\Entity\Producto $producto
     * @return ProductoImagen
     */
    public function setProducto(\Selnet\TiendaOnlineBundle\Entity\Producto $producto = null)
    {
        $this->producto = $producto;

        return $this;
    }

    /**
     * Get producto
     *
     * @return \Selnet\TiendaOnlineBundle\Entity\Producto 
     */
    public function getProducto()
    {
        return $this->producto;
    }



   private $file;

    /**
     * Sets file.
     *
     * @param UploadedFile $file
     */
    public function setFile(UploadedFile $file = null)
    {
        $this->file = $file;
    }

    /**
     * Get file.
     *
     * @return UploadedFile
     */
    public function getFile()
    {
        return $this->file;
    }


    public $path;

    public function getAbsolutePath()
    {
        return null === $this->path
        ? null
        : $this->getUploadRootDir().'/'.$this->path;
    }

    public function getWebPath()
    {
        return null === $this->path
        ? null
        : $this->getUploadDir().'/'.$this->path;
    }

    protected function getUploadRootDir()
    {
        // the absolute directory path where uploaded
        // documents should be saved
        return __DIR__.'/../../../../web/'.$this->getUploadDir();
    }

    protected function getUploadDir()
    {
        // get rid of the __DIR__ so it doesn't screw up
        // when displaying uploaded doc/image in the view.
        return 'uploads/imagenes';
    }



    public function upload()
    {
    // the file property can be empty if the field is not required
        if (null === $this->getFile()) {
            return;
        }

    // use the original file name here but you should
    // sanitize it at least to avoid any security issues

    // move takes the target directory and then the
    // target filename to move to
        $this->getFile()->move(
            $this->getUploadRootDir(),
            $this->getFile()->getClientOriginalName()
            );

    // set the path property to the filename where you've saved the file
        $this->url = $this->getFile()->getClientOriginalName();

    // clean up the file property as you won't need it anymore
        $this->file = null;
    }
}
