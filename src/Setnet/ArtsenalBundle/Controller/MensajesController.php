<?php

namespace Setnet\ArtsenalBundle\Controller;


use Setnet\ArtsenalBundle\Entity\ArtMensaje;  

use Symfony\Bundle\FrameworkBundle\Controller\Controller; 


class MensajesController extends Controller
{
    public function indexAction()
    {
                
        return $this->render('SetnetArtsenalBundle:Mensaje:mensaje.html.twig');
    }
    
    public function nuevoAction() {
        $session = $this->getRequest()->getSession();
        $usuario = $session->get("usuario");

        $perfil = $this->getDoctrine()->getRepository("SetnetArtsenalBundle:ArtPerfil")->findOneBy(
                array("id_usuario" => $usuario->getId())
        );
        
        
        $mensaje = new ArtMensaje(); 
        
        $form = $this->createFormBuilder($mensaje)
                ->add('titulo', 'text')
                ->add('contenido', 'textarea')
                ->add('destinatario', 'text') 
                ->getForm();
        
        

        return $this->render('SetnetArtsenalBundle:Mensaje:mensaje.nuevo.html.twig', 
                array(
                    "perfil" => $perfil, 
                    "form" => $form->createView()
                )
        );
    }
    
     
     
  

 
    
} 