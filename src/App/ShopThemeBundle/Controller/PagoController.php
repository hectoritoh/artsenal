<?php

namespace App\ShopThemeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Selnet\TiendaOnlineBundle\Entity\Tienda;
use Selnet\TiendaOnlineBundle\Entity\Producto;
use Selnet\TiendaOnlineBundle\Entity\ProductoDestinatario;
use Selnet\TiendaOnlineBundle\Entity\ProductoImagen;
use Selnet\TiendaOnlineBundle\Entity\UsuarioEnvio;
use Selnet\TiendaOnlineBundle\Entity\UsuarioPago;
use Selnet\TiendaOnlineBundle\Form\ProductoImagenType;
use Selnet\TiendaOnlineBundle\Entity\ProductoOcasion;
use Symfony\Component\HttpFoundation\Request;
use Selnet\TiendaOnlineBundle\Helper\CartHelper; 
use Selnet\TiendaOnlineBundle\Entity\Venta; 
use Selnet\TiendaOnlineBundle\Entity\DetalleVenta; 


class PagoController extends Controller
{



    public function finalizarAction(   )
    {

        $em = $this->getDoctrine()->getManager();
        $session = $this->get("session");
        $usuario = $this->get('security.context')->getToken()->getUser();
        
        $envio   = $session->get("envio");

        $pago    = $em->getRepository('SelnetTiendaOnlineBundle:UsuarioPago')->findOneBy(
         array("usuario"  => $usuario->getUsername() ) );


        try {

           $cart = CartHelper::getCurrentCart(  $session  );

           $venta = new Venta(); 
           $venta->setTotal(   $cart->getTotal() ); 
           $venta->setVerificada(0);
           $venta->setPago(  $pago->getId() );
           $venta->setEnvio(  $envio );
           $venta->setEstado(  0 );

           foreach ($cart->getItems() as $cartItem) {
            $detalleVenta = new DetalleVenta(); 
            $detalleVenta->setCantidad(   $cartItem->getCantidad() );
            $detalleVenta->setPrecio( $cartItem->getPrecio() );
            $producto = $em->getRepository('SelnetTiendaOnlineBundle:Producto')->find(  $cartItem->getProductoId() );
            $detalleVenta->setProducto( $producto  );
            $detalleVenta->setVenta( $venta  );
            $venta->getDetalles()->add(  $detalleVenta );
        }

        $venta->setUsuario($usuario->getUsername());


        $em->persist(  $venta );
        $em->flush();  

        CartHelper::destroyCart( $session ) ; 


    } catch (\PDOException $e) {

        $this->get('session')->getFlashBag()->set('mensaje', 'Error al ingresar el pedido , favor verifique el destinatario , lugar de envio ');

        return $this->redirect($this->generateUrl('descripcion_pago_artsenal'));

    }
    catch (\Exception $e) {
      $this->get('session')->getFlashBag()->set('mensaje', 'Error al ingresar el pedido , favor verifique el destinatario , lugar de envio ');

      return $this->redirect($this->generateUrl('descripcion_pago_artsenal'));
  }





  return $this->render('AppShopThemeBundle:Pagos:pago.finalizar.html.twig' , array( "venta" => $venta ));
}



public function pagoAction(  $envio , Request $request )
{
    $em = $this->getDoctrine()->getManager();
    $usuario = $this->get('security.context')->getToken()->getUser();

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


    $pago    = $em->getRepository('SelnetTiendaOnlineBundle:UsuarioPago')->findOneBy(
     array("usuario"  => $usuario->getUsername() ) );

    if (!$pago) {
        $pago = new UsuarioPago(); 
    }




    $formulario = $this->createFormBuilder($pago)
    ->add('nombre', 'text')
    ->add('ccv', 'text')
    ->add('mesVencimiento', 'choice', array(
        "choices" => array(
            "01"=>"01",
            "02"=>"02", 
            "03"=>"03", 
            "04"=>"04", 
            "05"=>"05", 
            "06"=>"06", 
            "07"=>"07", 
            "08"=>"08", 
            "09"=>"09", 
            "10"=>"10", 
            "11"=>"11", 
            "12"=>"12", 
            )
        ))
    ->add('anioVencimiento', 'choice', array(
        "choices" => array(
            "2014"=>"2014",
            "2015"=>"2015", 
            "2016"=>"2016", 
            "2017"=>"2017", 
            "2018"=>"2018", 
            "2019"=>"2019", 
            "2020"=>"2020", 
            "2021"=>"2021", 
            )
        ))
    ->add('nombreTarjeta', 'text')
    ->getForm();


    if ($request->isMethod('POST')) {
        $formulario->bind($request);

        if ($formulario->isValid()) {

            $pago->setUsuario($usuario->getUsername());

            $em->persist($pago);
            $em->flush();
            $session->set("envio" , $envio ); 

            return $this->redirect($this->generateUrl('pago_realizado_artsenal'));
        }
    }

    return $this->render('AppShopThemeBundle:Pagos:pago.datos.html.twig' , array("formulario" => $formulario->createView() , 'venta' => $venta, "envio" => $envio ));
}



public function descripcionAction( Request $request )
{

    $em = $this->getDoctrine()->getManager();
    $usuario       = $this->get('security.context')->getToken()->getUser();

    $usuarioEnvios = $em->getRepository('SelnetTiendaOnlineBundle:UsuarioEnvio')->findBy(array("usuario" => $usuario->getUsername()));


    $usuarioEnvio = new UsuarioEnvio(); 
    $form_envio = $this->createFormBuilder($usuarioEnvio)
    ->add('nombre', 'text')
    ->add('calle', 'text')
    ->add('departamento', 'text')
    ->add('ciudad', 'text')
    ->add('estado', 'text')
    ->add('region', 'text')
    ->add('codigoPostal', 'text')
    ->getForm();


    if ($request->isMethod('POST')) {
        $form_envio->bind($request);

        if ($form_envio->isValid()) {

            $usuarioEnvio->setUsuario($usuario->getUsername());

            $em->persist($usuarioEnvio);
            $em->flush();

            return $this->redirect($this->generateUrl('descripcion_pago_artsenal'));
        }
    }

    return $this->render('AppShopThemeBundle:Pagos:pago.descripcion.html.twig', 
        array(
            "formulario" => $form_envio->createView(),
            "lugarEnvios" => $usuarioEnvios
            ));
}





}
