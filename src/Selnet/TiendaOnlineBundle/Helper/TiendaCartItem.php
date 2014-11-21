<?php

namespace Selnet\TiendaOnlineBundle\Helper;

class TiendaCartItem {

    protected $productoId;
    protected $cantidad;
    protected $precio;
    protected $productoObj;


    function __construct() {
        
    }

    public function getProductoObj() {
        return $this->productoObj;
    }


    public function getProductoId() {
        return $this->productoId;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function setProductoId($productoId) {
        $this->productoId = $productoId;
    }

    public function setProductoObj($productoObj) {
        $this->productoObj = $productoObj;
    }

    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    public function setPrecio($precio) {
        $this->precio = $precio;
    }




}
