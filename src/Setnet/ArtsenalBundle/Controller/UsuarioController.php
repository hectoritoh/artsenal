<?php

namespace Setnet\ArtsenalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session;

class UsuarioController extends Controller {

 
    
    public function registrarAction(){
        
    }
    
    
    public function loginAction(Request $request) {

        $usuario = new \Setnet\ArtsenalBundle\Entity\ArtUsuario();
        $formUsuario = $this->createFormBuilder($usuario)
                ->add("usuario", "text")
                ->add('password', 'password')
                ->getForm();

        if ($request->isMethod('POST')) {
            $formUsuario->bind($request);
            
            if ($formUsuario->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();

                $usuario = $em->getRepository('SetnetArtsenalBundle:ArtUsuario')->findOneBy(array(
                    "usuario" => $usuario->getUsuario(),
                    "password" => $usuario->getPassword(),
                    "borrado" => 'N'
                ));
                if ($usuario != null) {

                    $usuario->setUltimoLogin(new \DateTime());
                    $session = $this->getRequest()->getSession();
                    $session->set("usuario_id", $usuario->getId());


                    $em->flush();

                    if ($usuario->getConfiguracionCompleta() === 0) {

                        $suscripciones = $em->getRepository('SetnetArtsenalBundle:ArtSuscripciones')->findAll();


                        return $this->render('SetnetArtsenalBundle:Usuario:suscripcion.html.twig', array(
                                    "suscripciones" => $suscripciones
                        ));
                    } else {

                        return $this->render('SetnetArtsenalBundle:Ajax:login.success.html.twig', array(
                                    "form_usuario" => $formUsuario->createView(),
                                    "mensaje" => "Ingreso Exitoso"
                        ));
                    }
                } else {
                    return $this->render('SetnetArtsenalBundle:Ajax:login.response.html.twig', array(
                                "form_usuario" => $formUsuario->createView(),
                                "mensaje" => "Usuario y/o Contraseña invalido"
                    ));
                }
            }
        } else {

            return $this->render('SetnetArtsenalBundle:Login:login.usuario.html.twig', array(
                        "form_usuario" => $formUsuario->createView(),
                        "mensaje" => ""
            ));
        }
    }

    /*
      function que actualiza y registra usurios
     */

    public function updateUsuarioAction(Request $request) {

        $session = $this->getRequest()->getSession();
        $usuario = $session->get("usuario");

        if ($usuario == null) {
            $usuarioNuevo = new \Setnet\ArtsenalBundle\Entity\ArtUsuario();
        } else {
            $usuarioNuevo = $usuario;
        }


        $formUsuario = $this->createFormBuilder($usuarioNuevo)
                ->add("username", "text")
                ->add('password', 'repeated', array(
                    'type' => 'password',
                    'invalid_message' => 'Las Contraseñas deben coincidir.',
                    'options' => array('attr' => array('class' => 'password-field')),
                    'required' => true,
                    'first_options' => array('label' => 'Password'),
                    'second_options' => array('label' => 'Repetir Password'),
                ))
                ->add("email", "email")
                ->getForm();

        if ($request->isMethod('POST')) {
            $formUsuario->bind($request);
            $usuarioNuevo->setFechaCreacion(new \DateTime());
            $usuarioNuevo->setUltimoLogin(new \DateTime());
            $usuarioNuevo->setBorrado("N");
            $usuarioNuevo->setConfiguracionCompleta(0);

            if ($formUsuario->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($usuarioNuevo);
                $em->flush();

                return $this->redirect($this->generateUrl('registrar_message'));
            } else {
                $errors = $formUsuario->getErrors();
                return $this->redirect($this->generateUrl('registrar_vendedor'));
            }
        }

        return $this->render('SetnetArtsenalBundle:Usuario:crear.usuario.html.twig', array(
                    "form_usuario" => $formUsuario->createView()
        ));
    }

    public function updateUsuarioFbAction() {

        $request = $this->container->get('request');
        $username = $request->request->get("username");
        $email = $request->request->get("email");

        $errorMsj = "";

        $em = $this->getDoctrine()->getEntityManager();
        $usuario = $em->getRepository('SetnetArtsenalBundle:ArtUsuario')->findBy(array(
            "usuario" => $username,
            "email" => $email
        ));

        if ($usuario) {
            $errorMsj = 'No product found for id ';
        } else {

            $usuarioNuevo = new \Setnet\ArtsenalBundle\Entity\ArtUsuario();
            $usuarioNuevo->setFechaCreacion(new \DateTime());
            $usuarioNuevo->setUltimoLogin(new \DateTime());
            $usuarioNuevo->setBorrado("N");
            $usuarioNuevo->setConfiguracionCompleta(0);
            $usuarioNuevo->setEmail($request->request->get('email', null));
            $usuarioNuevo->setUsuario($request->request->get('username', null));

            $em = $this->getDoctrine()->getEntityManager();
            $em->persist($usuarioNuevo);
            $em->flush();
        }
        
    }

    public function suscripcionAction(Request $request) {

        $em = $this->getDoctrine()->getManager();

        if ($request->isMethod('POST')) {

            $suscripcion_id = $request->request->get('suscripcion');
            $suscripcion = $em->getRepository('SetnetArtsenalBundle:ArtSuscripciones')->find($suscripcion_id);
            $session = $this->getRequest()->getSession();
            $usuario = $session->get("usuario_id");
            $usuarioActual = $em->getRepository('SetnetArtsenalBundle:ArtUsuario')->find($usuario);
            $usuarioActual->setSuscripcion($suscripcion);
            $usuarioActual->setConfiguracionCompleta(1);
            $em->persist($usuarioActual);
            $em->flush();


            return $this->redirect($this->generateUrl('setnet_artsenal_homepage'));

//            return  $this->forward('SetnetArtsenalBundle:Default:index');
        } else {

            $em = $this->getDoctrine()->getManager();
            $suscripciones = $em->getRepository('SetnetArtsenalBundle:ArtSuscripciones')->findAll();

            return $this->render('SetnetArtsenalBundle:Usuario:suscripcion.html.twig', array(
                        "suscripciones" => $suscripciones
            ));
        }
    }

    public function configuraAction(Request $request) {

        $session = $this->getRequest()->getSession();
        $usuario = $session->get("usuario");
        $user = $this->get('security.context')->getToken()->getUser();

        $formUsuario = $this->createFormBuilder($usuario)
                ->add('password', 'repeated', array(
                    'type' => 'password',
                    'invalid_message' => 'Las Contraseñas deben coincidir.',
                    'options' => array('attr' => array('class' => 'password-field')),
                    'required' => true,
                    'first_options' => array('label' => 'Password'),
                    'second_options' => array('label' => 'Repetir Password'),
                ))
                ->add("email", "email")
                ->getForm();

        if ($request->isMethod('POST')) {
            $formUsuario->bind($request);


            if ($formUsuario->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($usuario);
                $em->flush();

                return $this->redirect($this->generateUrl('configuracion'));
            }
        }

        return $this->render('SetnetArtsenalBundle:Usuario:configura.html.twig', array(
                    "form_usuario" => $formUsuario->createView(),
                    "usuario" => $user
        ));
    }

    /**
     * Controla el logout del usuario 
     * @return type
     * 
     */
    public function logoutAction() {

        $session = $this->getRequest()->getSession();
        $session->clear();

        return $this->redirect($this->generateUrl('setnet_artsenal_homepage'));
    }



    /**
     * decide que menu se va a mostrar al usuario 
     * @return type
     * 
     */
    public function menuAction() {

        $securityContext = $this->container->get('security.context');
        if ($securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            $user = $this->get('security.context')->getToken()->getUser();
            return $this->render('SetnetArtsenalBundle:Menu:menu.usuario.html.twig', array(
                        "usuario" => $user
            ));
        } else {
            return $this->render('SetnetArtsenalBundle:Menu:menu.default.html.twig');
        }
    }


    public function perfilAction()
    {

        $usuario = $this->get('security.context')->getToken()->getUser();
        $perfil = $this->getDoctrine()->getRepository('SetnetArtsenalBundle:ArtPerfil')->findOneBy(array("id_usuario" =>   $usuario->getId() ));    
        
        return $this->render('SetnetArtsenalBundle:Pages:perfil.html.twig' , 
            array("perfil" => $perfil)
            );
    }

    

}

