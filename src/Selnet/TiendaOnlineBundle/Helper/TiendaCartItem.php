<?php

namespace Selnet\TiendaOnlineBundle\Helper;

class TiendaCartItem {

    protected $productoId;
    protected $cantidad;
    protected $precio;

    function __construct() {
        
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

    public function setCantidad($cantidad) {
        $this->cantidad = $cantidad;
    }

    public function setPrecio($precio) {
        $this->precio = $precio;
    }

}
