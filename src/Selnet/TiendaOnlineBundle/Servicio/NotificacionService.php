<?php

namespace Selnet\TiendaOnlineBundle\Servicio;

use Selnet\TiendaOnlineBundle\Entity\Mensaje;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class NotificacionService extends  Controller
{


    private $em;


    function __construct(  $entityManager  )
    {
        $this->em = $entityManager;
    }


    function crearNotificacion( $usuario_envia , $usuario_recibe , $mensaje, $tipo_mensaje , $titulo ){

        $response = array();

        try{

            $notificacion = new Mensaje();
            $notificacion->setTitulo(  $titulo);
            $notificacion->setContenido(  $mensaje );
            $notificacion->setUsuarioEnvia(   $usuario_envia   );
            $notificacion->setUsuarioRecibe(  $usuario_recibe );
            $notificacion->setTipoNotificacion(  $tipo_mensaje  );
            $notificacion->setEstado(0);


            $this->em->persist(  $notificacion );
            $this->em->flush();

            $response["success"] = true;


        }catch (\Exception $e){
            $response["success"] = false;
            $response["message"] = $e->getMessage();
        }


        return $response;

    }

    function getUltimasNotificaciones( $usuario  ){
        return $this->em->getRepository("SelnetTiendaOnlineBundle:Mensaje")->findBy(array("usuario_recibe" =>  $usuario ));
    }
    



 function getEnviados( $usuario  ){
        return $this->em->getRepository("SelnetTiendaOnlineBundle:Mensaje")->findBy(array("usuario_envia" =>  $usuario ));
    }






}
