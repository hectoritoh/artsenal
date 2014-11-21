<?php

namespace Selnet\TiendaOnlineBundle\Servicio;

use Selnet\TiendaOnlineBundle\Entity\Mensaje;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\DependencyInjection\ContainerInterface as Container;


class CartService extends  Controller
{


    private     $em;
    private     $session;
    private     $productos ; 
    private     $total; 
    

    function __construct(  $entityManager  , $session  )
    {
        $this->em        = $entityManager;
        $this->session   = $session ; 
    
        $productos = $session->get('cartservice_cart'); 

        if (!isset(  $productos )) {
            $this->productos = new \Doctrine\Common\Collections\ArrayCollection(); 
            $session->set('cartservice_cart', $this->productos ); 
        }else{
            $this->productos = $productos; 
        }
        
    }

 

    function addProducto(  $producto  ){
        
        $this->productos->add(  $producto->getId() ); 
        $this->session->set('cartservice_cart', $this->productos ); 
    }





    function remove(  $producto_remove ){

        foreach ($this->productos as $productoID) {            
            if ($productoID === $producto_remove->getId() ) {
                $this->productos->removeElement(  $productoID ); 
            }
        }

        $this->session->set('cartservice_cart', $this->productos ); 
    }


    function getProducts(){
       
        $listaProductos =  new \Doctrine\Common\Collections\ArrayCollection(); 

        foreach ($this->productos as $productoID) {
              
                $obj = $this->em->getRepository('SelnetTiendaOnlineBundle:Producto')->find(  $productoID );              
                $listaProductos->add(  $obj ); 

        }

        return $listaProductos; 
    }







}
