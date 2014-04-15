<?php

namespace Setnet\ArtsenalBundle\Helper;
use Setnet\ArtsenalBundle\Entity\ArtCart;
use Setnet\ArtsenalBundle\Entity\ArtCartItem;

class CartHelper {



    public static function registrarCart($session,  $producto) {

        $cart = $session->get("cart");
        $producto_existe = false ; 

        if ($cart == null) {
            $cart = array();
        }

        $cart_tmp = array(); 

        foreach ($cart as $item ) {

            if( $item["id"] ===  $producto->getId()  ){
                $item["cantidad"] =  $item["cantidad"] + 1 ; 
                $producto_existe = true ; 
            }

            $cart_tmp[] = $item ; 
        }
        
        if(  !$producto_existe  ){

            $item = array();
            $item["id"] = $producto->getId();
            $item["cantidad"] = 1;
            $item["precio"] = $producto->getPrecio();

            $cart_tmp[] = $item;
        }
        

        $session->set("cart", $cart_tmp);
        
        return $cart_tmp; 
    }





    public static function agregarItemCart($session,  $producto) {

        $cart = $session->get("cart");
        $producto_existe = false ; 

        if ($cart == null) {
            $cart = array();
        }

        $cart_tmp = array(); 

        foreach ($cart as $item ) {

            if( $item["id"] ===  $producto->getId()  ){
                $item["cantidad"] =  $item["cantidad"] + 1 ; 
                $producto_existe = true ; 
            }

            $cart_tmp[] = $item ; 
        }
        
        if(  !$producto_existe  ){

            $item = array();
            $item["id"] = $producto->getId();
            $item["cantidad"] = 1;
            $item["precio"] = $producto->getPrecio();

            $cart_tmp[] = $item;
        }
        

        $session->set("cart", $cart_tmp);
        
        return $cart_tmp; 
    }



    public static function eliminarItemCart($session,  $producto) {

        $cart = $session->get("cart");
      

        if ($cart == null) {
            $cart = array();
        }

        $cart_tmp = array(); 

        foreach ($cart as $item ) {

            if( $item["id"] ===  $producto->getId()  ){
               
            }else{
                $cart_tmp[] = $item ; 
            }

                
        }
         
        $session->set("cart", $cart_tmp);
        
        return $cart_tmp; 
    }




    public static function getCartObject($session , $em ) {

        $cart_array = $session->get("cart");
        $cart = new ArtCart(); 
        $cart->setTotal( 0 ) ; 



        if ($cart == null) {
            return $cart; 
        }

        

        foreach ($cart_array as $item ) {

            $producto = $em->getRepository("SetnetArtsenalBundle:ArtProducto")->find(   $item["id"]) ;
            
            $cartItem = new ArtcartItem(); 
            $cartItem->setProducto(   $producto );
            $cartItem->setCantidad(   $item["cantidad"] );
            $cartItem->setPrecio(   $item["precio"] );
            $cartItem->setDescripcion( "" );
            $cartItem->setTotal(   $item["precio"]  *  $item["cantidad"] );


            $cart->addItem(  $cartItem );           
            $cart->setTotal(    $cart->getTotal()  +  $cartItem->getTotal() );           
        }
        
        return $cart; 
    }


    public static function clearCart($session) {

        $cart = $session->get("cart");
        $session->set("cart", array());
        
        return $cart; 
    }

}
