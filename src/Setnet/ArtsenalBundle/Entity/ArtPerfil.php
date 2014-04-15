<?php

namespace Setnet\ArtsenalBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ArtPerfil
 */
class ArtPerfil
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
    private $imagenPerfil;

    /**
     * @var string
     */
    private $ciudad;

    /**
     * @var string
     */
    private $about;

    /**
     * @var \DateTime
     */
    private $fechaCreacion;

    /**
     * @var \DateTime
     */
    private $nacimiento;

    /**
     * @var string
     */
    private $borrado;

    /**
     * @var string
     */
    private $sexo;

    /**
     * @var integer
     */
    private $id_usuario;


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
     * @return ArtPerfil
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
     * Set imagenPerfil
     *
     * @param string $imagenPerfil
     * @return ArtPerfil
     */
    public function setImagenPerfil($imagenPerfil)
    {
        $this->imagenPerfil = $imagenPerfil;

        return $this;
    }

    /**
     * Get imagenPerfil
     *
     * @return string 
     */
    public function getImagenPerfil()
    {
        return $this->imagenPerfil;
    }

    /**
     * Set ciudad
     *
     * @param string $ciudad
     * @return ArtPerfil
     */
    public function setCiudad($ciudad)
    {
        $this->ciudad = $ciudad;

        return $this;
    }

    /**
     * Get ciudad
     *
     * @return string 
     */
    public function getCiudad()
    {
        return $this->ciudad;
    }

    /**
     * Set about
     *
     * @param string $about
     * @return ArtPerfil
     */
    public function setAbout($about)
    {
        $this->about = $about;

        return $this;
    }

    /**
     * Get about
     *
     * @return string 
     */
    public function getAbout()
    {
        return $this->about;
    }

    /**
     * Set fechaCreacion
     *
     * @param \DateTime $fechaCreacion
     * @return ArtPerfil
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

    /**
     * Set nacimiento
     *
     * @param \DateTime $nacimiento
     * @return ArtPerfil
     */
    public function setNacimiento($nacimiento)
    {
        $this->nacimiento = $nacimiento;

        return $this;
    }

    /**
     * Get nacimiento
     *
     * @return \DateTime 
     */
    public function getNacimiento()
    {
        return $this->nacimiento;
    }

    /**
     * Set borrado
     *
     * @param string $borrado
     * @return ArtPerfil
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
     * Set sexo
     *
     * @param string $sexo
     * @return ArtPerfil
     */
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;

        return $this;
    }

    /**
     * Get sexo
     *
     * @return string 
     */
    public function getSexo()
    {
        return $this->sexo;
    }

    /**
     * Set id_usuario
     *
     * @param integer $idUsuario
     * @return ArtPerfil
     */
    public function setIdUsuario($idUsuario)
    {
        $this->id_usuario = $idUsuario;

        return $this;
    }

    /**
     * Get id_usuario
     *
     * @return integer 
     */
    public function getIdUsuario()
    {
        return $this->id_usuario;
    }
    
    
    
    
    protected $file;

    public function getFile() {
        return $this->file;
    }

    public function setFile($file) {
        $this->file = $file;
    }

    public function getAbsolutePath() {
        return null === $this->$imagenPerfil ? null : $this->getUploadRootDir() . '/' . $this->$imagenPerfil;
    }

    public function getWebPath() {
        return null === $this->$imagenPerfil ? null : $this->getUploadDir() . '/' . $this->$imagenPerfil;
    }

    protected function getUploadRootDir($basepath = "") {
        // the absolute directory path where uploaded documents should be saved
        return __DIR__ . '/../../../../web/' . $this->getUploadDir();
    }

    protected function getUploadDir() {
        // get rid of the __DIR__ so it doesn't screw when displaying uploaded doc/image in the view.
        return '/uploads/perfiles';
    }

    public function upload() {



        // the file property can be empty if the field is not required
//    if (null === $this->file) {
//        return;
//    }

        $basepath = $this->getUploadRootDir();

        // we use the original file name here but you should
        // sanitize it at least to avoid any security issues
        // move takes the target directory and then the target filename to move to
        $var1 = $this->getUploadRootDir($basepath);
        $var2 = $this->file->getClientOriginalName();

        $this->file->move($this->getUploadRootDir($basepath), $this->file->getClientOriginalName());


        // set the path property to the filename where you'ved saved the file
        $this->setImagenPerfil($this->file->getClientOriginalName());


        // clean up the file property as you won't need it anymore
        $this->file = null;
    }
}
