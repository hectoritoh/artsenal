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
        $composicion  = $notificacion->crearNotificacion( $usuario->getUsername()  , $destinatario  ,  $mensaje, 1 , $asunto);

        
        $em = $this->getDoctrine()->getManager();
        $obj = $em->getRepository('SelnetTiendaOnlineBundle:Producto')->find(  $producto );
        $this->container->get('artsenal.cart.manager')->remove(  $obj ); 

        


            
            $subject = "Mensaje al artista del producto, desde Web Artsenal"; 

            $body = '<strong>Informaci&oacute;n de Contacto:</strong> <br /><br />               
            Usuario:  '.$usuario->getUsername().' <br />
            Email:  '. $usuario->getEmail() .' <br />
            Asunto:  '. $asunto .'  <br />
            Mensaje:  '. $mensaje .' ';


 
            $message = \Swift_Message::newInstance()

            ->setSubject($subject)

            ->setFrom(array('yc@selnet.com.ec' => 'Web Artsenal'))

            ->setTo('ycosquillo@celmedia.com')
            
            ->setContentType("text/html")

            ->setBody($body);


            $envioMail = $this->get('mailer')->send($message);


            if ( $envioMail ) {

                // $response = json_encode(array('codigo' => 1 ));

                // return new Response($response, 200, array(
                //     'Content-Type' => 'application/json'
                // ));

                $response = new \Symfony\Component\HttpFoundation\Response(json_encode($composicion));
                $response->headers->set('Content-Type', 'application/json');
                return $response;


            }else {
                 return new JsonResponse(array(
                    'codigo' => 0,
                    'Mensaje' => "No se ha enviado mensaje"
                ), 200); //codigo de error diferente
            }




    }



    public function removeProducto(  $id_producto   )
    {
        $producto = new TiendaCartItem();
        $producto->setProductoId( $id_producto );

        $session = $this->get("session");
        CartHelper::eliminarItemCart(  $session  , $producto ); 
        
    }



}
