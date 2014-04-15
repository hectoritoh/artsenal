<?php

namespace Selnet\TiendaOnlineBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
/**
 * Tienda
 */
class Tienda
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
    private $descripcion;

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
     * @var \Selnet\TiendaOnlineBundle\Entity\Usuario
     */
    private $usuario;


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
     * @return Tienda
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
     * Set descripcion
     *
     * @param string $descripcion
     * @return Tienda
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
     * @param integer $borrado
     * @return Tienda
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
     * @return Tienda
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
     * @return Tienda
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
     * Set usuario
     *
     * @param \Selnet\TiendaOnlineBundle\Entity\Usuario $usuario
     * @return Tienda
     */
    public function setUsuario(\Selnet\TiendaOnlineBundle\Entity\Usuario $usuario = null)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Get usuario
     *
     * @return \Selnet\TiendaOnlineBundle\Entity\Usuario 
     */
    public function getUsuario()
    {
        return $this->usuario;
    }
    /**
     * @ORM\PrePersist
     */
    public function preInsert()
    {
        // Add your code here
        //      $this->setBorrado(0);
        $this->setCreatedAt(  new \DateTime() );
        $this->setUpdatedAt(  new \DateTime() );
    }

    /**
     * @ORM\PreUpdate
     */
    public function preUpdate()
    {
        // Add your code here
        $this->setUpdatedAt(  new \DateTime() );
    }


    


    /**
     * @var string
     */
    private $estado;


    /**
     * Set estado
     *
     * @param string $estado
     * @return Tienda
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
     * @var string
     */
    private $titulo;

    /**
     * @var string
     */
    private $mensaje;

    /**
     * @var string
     */
    private $anuncio;

    /**
     * @var string
     */
    private $imagenCabecera;


    /**
     * Set titulo
     *
     * @param string $titulo
     * @return Tienda
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
     * Set mensaje
     *
     * @param string $mensaje
     * @return Tienda
     */
    public function setMensaje($mensaje)
    {
        $this->mensaje = $mensaje;

        return $this;
    }

    /**
     * Get mensaje
     *
     * @return string 
     */
    public function getMensaje()
    {
        return $this->mensaje;
    }

    /**
     * Set anuncio
     *
     * @param string $anuncio
     * @return Tienda
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
     * Set imagenCabecera
     *
     * @param string $imagenCabecera
     * @return Tienda
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
        return 'uploads/imagen_tienda';
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
        $this->imagenCabecera = $this->getFile()->getClientOriginalName();

    // clean up the file property as you won't need it anymore
        $this->file = null;
    }




 



    /**
     * @var string
     */
    private $mensajeBienvenida;

    /**
     * @var string
     */
    private $politicaPagos;

    /**
     * @var string
     */
    private $politicaReembolso;

    /**
     * @var string
     */
    private $informacionAdicional;

    /**
     * @var string
     */
    private $informacionVendedor;


    /**
     * Set mensajeBienvenida
     *
     * @param string $mensajeBienvenida
     * @return Tienda
     */
    public function setMensajeBienvenida($mensajeBienvenida)
    {
        $this->mensajeBienvenida = $mensajeBienvenida;

        return $this;
    }

    /**
     * Get mensajeBienvenida
     *
     * @return string 
     */
    public function getMensajeBienvenida()
    {
        return $this->mensajeBienvenida;
    }

    /**
     * Set politicaPagos
     *
     * @param string $politicaPagos
     * @return Tienda
     */
    public function setPoliticaPagos($politicaPagos)
    {
        $this->politicaPagos = $politicaPagos;

        return $this;
    }

    /**
     * Get politicaPagos
     *
     * @return string 
     */
    public function getPoliticaPagos()
    {
        return $this->politicaPagos;
    }

    /**
     * Set politicaReembolso
     *
     * @param string $politicaReembolso
     * @return Tienda
     */
    public function setPoliticaReembolso($politicaReembolso)
    {
        $this->politicaReembolso = $politicaReembolso;

        return $this;
    }

    /**
     * Get politicaReembolso
     *
     * @return string 
     */
    public function getPoliticaReembolso()
    {
        return $this->politicaReembolso;
    }

    /**
     * Set informacionAdicional
     *
     * @param string $informacionAdicional
     * @return Tienda
     */
    public function setInformacionAdicional($informacionAdicional)
    {
        $this->informacionAdicional = $informacionAdicional;

        return $this;
    }

    /**
     * Get informacionAdicional
     *
     * @return string 
     */
    public function getInformacionAdicional()
    {
        return $this->informacionAdicional;
    }

    /**
     * Set informacionVendedor
     *
     * @param string $informacionVendedor
     * @return Tienda
     */
    public function setInformacionVendedor($informacionVendedor)
    {
        $this->informacionVendedor = $informacionVendedor;

        return $this;
    }

    /**
     * Get informacionVendedor
     *
     * @return string 
     */
    public function getInformacionVendedor()
    {
        return $this->informacionVendedor;
    }
}
