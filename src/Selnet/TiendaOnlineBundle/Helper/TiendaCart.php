<?php

namespace Selnet\TiendaOnlineBundle\Helper;


class TiendaCart {

    protected $items; 
    protected $total;
    
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

    public function calcularTotal(){

        $this->total =0; 
        foreach ($this->items as $item) {
            $this->total = $this->total + ($item->getPrecio() * $item->getCantidad() ) ;
        }    
    }

    
    public function addItem( $cartItem ){

        $existe_producto = false;
        $items_temporal = new \Doctrine\Common\Collections\ArrayCollection();

        foreach ($this->items as $item) {
            if( $item->getProductoId()== $cartItem->getProductoId()  ){                
                $item->setCantidad(  $item->getCantidad() + $cartItem->getCantidad() );
                $existe_producto= true;
            }
           $items_temporal[] = $item;
        }        

        if( !$existe_producto){
            $items_temporal[] = $cartItem;
        }
        $this->items = $items_temporal;
        $this->calcularTotal();
    }
    
    public function removeItem( $itemRemover ){
        $items_temporal = new \Doctrine\Common\Collections\ArrayCollection();

        foreach ($this->items as $item) {
            if( $item->getProductoId()!= $itemRemover->getProductoId()  ){
                $items_temporal[] = $item;
            }
        }
        $this->items = $items_temporal;
        $this->calcularTotal();
    }


    public function updateItem( $itemActualizar ){
        $items_temporal = new \Doctrine\Common\Collections\ArrayCollection();

        foreach ($this->items as $item) {
            if( $item->getProductoId()== $itemActualizar->getProductoId()  ){
                $items_temporal[] = $itemActualizar;
            }else{
                $items_temporal[] = $item;
            }
        }
        $this->items = $items_temporal;
        $this->calcularTotal();
    }



    public function estaVacio(){
        if(   count($this->items) == 0 )
            return true;
        return false;
    }



}
