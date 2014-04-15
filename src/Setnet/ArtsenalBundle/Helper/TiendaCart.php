<?php

namespace Setnet\ArtsenalBundle\Helper;
use Setnet\ArtsenalBundle\Entity\ArtCart;
use Setnet\ArtsenalBundle\Entity\ArtCartItem;

class TiendaCartItem {

    private $items; 
    private $total;
    
    function __construct() {
        $this->items = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getItems() {
        return $this->items;
    }

    public function getTotal() {
        return $this->total;
    }

    public function setItems($items) {
        $this->items = $items;
    }

    public function setTotal($total) {
        $this->total = $total;
    }

    

    
}
