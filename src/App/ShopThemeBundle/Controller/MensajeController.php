<?php

namespace App\ShopThemeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Selnet\TiendaOnlineBundle\Helper\CartHelper; 
use Selnet\TiendaOnlineBundle\Helper\TiendaCartItem;

class MensajeController extends Controller
{

    public function indexAction(){

        $usuario = $this->get('security.context')->getToken()->getUser();

        $notificacion = $this->get("app_notificaciones.notificacion.manager");
        $notificaciones = $notificacion->getUltimasNotificaciones( $usuario->getUsername()   );

        return $this->render('AppShopThemeBundle:Mensajes:index.html.twig' , array("mensajes"=> $notificaciones )  );
    }


    public function enviadosAction(){

        $usuario = $this->get('security.context')->getToken()->getUser();

        $notificacion = $this->get("app_notificaciones.notificacion.manager");
        $notificaciones = $notificacion->getEnviados( $usuario->getUsername()   );

        return $this->render('AppShopThemeBundle:Mensajes:enviados.html.twig' , array("mensajes"=> $notificaciones )  );
    }



    public function crearMensajeAction(  $destinatario , $asunto , $mensaje , $producto ){

        $usuario = $this->get('security.context')->getToken()->getUser();

        $notificacion = $this->get("app_notificaciones.notificacion.manager");
        $mensaje  = $notificacion->crearNotificacion( $usuario->getUsername()  , $destinatario  ,  $mensaje, 1 , $asunto);

        
        $this->removeProducto( $producto ); 

        $response = new \Symfony\Component\HttpFoundation\Response(json_encode($mensaje));
        $response->headers->set('Content-Type', 'application/json');
        return $response;

    }



    public function removeProducto(  $id_producto   )
    {
        $producto = new TiendaCartItem();
        $producto->setProductoId( $id_producto );

        $session = $this->get("session");
        CartHelper::eliminarItemCart(  $session  , $producto ); 
        
    }



}
