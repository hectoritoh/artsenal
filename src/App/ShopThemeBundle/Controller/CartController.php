<?php

namespace App\ShopThemeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Selnet\TiendaOnlineBundle\Helper\CartHelper; 
use Selnet\TiendaOnlineBundle\Entity\Venta; 
use Selnet\TiendaOnlineBundle\Entity\DetalleVenta; 



class CartController extends Controller
{
	
    public function nuevoCartAction(){

        $em = $this->getDoctrine()->getManager();

        $session = $this->get("session");
        $cart = CartHelper::getCurrentCart(  $session  );


        $venta = new Venta();
        $venta->setTotal(   0 );

        foreach ($cart as $cartItem) {
            $detalleVenta = new DetalleVenta();
            $detalleVenta->setCantidad(   $cartItem->getCantidad() );
            $detalleVenta->setPrecio( $cartItem->getPrecio() );
            $producto = $em->getRepository('SelnetTiendaOnlineBundle:Producto')->find(  $cartItem->getProductoId() );
            $detalleVenta->setProducto( $producto  );
            $venta->getDetalles()->add(  $detalleVenta );

        }


        return $this->render('AppShopThemeBundle:Pagos:cesta.nueva.html.twig' ,
            array(
                "venta" => $venta , "detalles" => $cart ));


    }



    public function showAction()
    {
        $em = $this->getDoctrine()->getManager();
        
        $session = $this->get("session");
        $cart = CartHelper::getCurrentCart(  $session  );


        $venta = new Venta(); 
        $venta->setTotal(   $cart->getTotal() ); 

        foreach ($cart->getItems() as $cartItem) {
            $detalleVenta = new DetalleVenta(); 
            $detalleVenta->setCantidad(   $cartItem->getCantidad() );
            $detalleVenta->setPrecio( $cartItem->getPrecio() );
            $producto = $em->getRepository('SelnetTiendaOnlineBundle:Producto')->find(  $cartItem->getProductoId() );
            $detalleVenta->setProducto( $producto  );
            $venta->getDetalles()->add(  $detalleVenta );

        }
        

        return $this->render('AppShopThemeBundle:Paginas:cesta.html.twig' , 
            array(
                "venta" => $venta , "detalles" => $cart->getItems() ));

    }

    public function showTestAction()
    {
        $session = $this->get("session");
        $cart = CartHelper::destroyCart(  $session  );

        echo "<pre>";
        print_r($cart);
        echo "</pre>";
        die();
    }



    public function agregarProductoAction(  $id_producto , $cantidad , $precio  )
    {

        $session = $this->get("session");
        $cart = CartHelper::getCurrentCart(  $session  );

        $item = new TiendaCartItem();
        $item->setProductoId( $id_producto );
        $item->setCantidad($cantidad);
        $item->setPrecio($precio);

        $cart->addItem( $item );
        CartHelper::setCurrentCart( $session , $cart );
        $response = new Response(json_encode(array('response' => 'ok')));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }


    public function removeProductoAction(  $id_producto   )
    {

        $session = $this->get("session");
        $cart = CartHelper::getCurrentCart(  $session  );

        $item = new TiendaCartItem();
        $item->setProductoId( $id_producto );


        $cart->removeItem( $item );
        CartHelper::setCurrentCart( $session , $cart );

        return $this->redirect($this->generateUrl('ver_mi_cesta'));


   //return $this->render('.html.twig');
    }
    public function updateProductoAction(  $id_producto  , $cantidad , $precio )
    {

        $session = $this->get("session");
        $cart = CartHelper::getCurrentCart(  $session  );

        $item = new TiendaCartItem();
        $item->setProductoId( $id_producto );
        $item->setCantidad($cantidad);
        $item->setPrecio($precio);


        $cart->updateItem( $item );
        CartHelper::setCurrentCart( $session , $cart );
        $response = new Response(json_encode(array('response' => 'ok')));
        $response->headers->set('Content-Type', 'application/json');

        return $response;


        //return $this->render('.html.twig');
    }
}


