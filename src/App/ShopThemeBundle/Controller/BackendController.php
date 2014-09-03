<?php

namespace App\ShopThemeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Selnet\TiendaOnlineBundle\Entity\Usuario;



class BackendController extends Controller
{
	


    public function perfilAction(  Request $request  )
    {
        
        $usuario = $this->get('security.context')->getToken()->getUser();


        $form = $this->createFormBuilder($usuario)
        ->add("firstname", "text" )
        ->add("lastname", "text" )
        ->add("date_of_birth", 'birthday')
        ->add("biography", "textarea" )
        ->add("gender", 'choice', array(
                                    'choices'   => array('m' => 'Hombre', 'f' => 'Mujer' , 'u' => 'Preferiria no decir'  ),
                                    'required'  => true,
                                    'expanded' => true , 
                                    'multiple' => false
                                ))
        ->getForm(); 

        if ($request->isMethod('POST')) {
            $form->bind($request);

            if ($form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist( $usuario );
                $em->flush();

                    $this->get('session')->getFlashBag()->add(
                        'notice',
                        'Su perfil fue actualizado correctamente!'
                    );

                return $this->redirect($this->generateUrl('perfil_usuario'));
            }
        }

        return $this->render('AppShopThemeBundle:Paginas:perfil.html.twig' , array("form"=> $form->createView()) );
    }





    public function registerAction(Request $request)
    {




        $usuario = new Usuario();

        $form = $this->createFormBuilder($usuario)
        ->add("nombres", "text" , array("required"=> true ))
        ->add("apellidos", "text", array("required"=> true ))
        ->add("sexo", "choice" ,  array(
            'multiple' => false , 
            'required' => true , 
            'expanded' => true , 
            'choices' => array('1' => 'Hombre', '2' => 'Mujer')))
        ->add("email", "email" ,  array("required"=> true ))    
        ->add("username", "text" , array("required"=> true ))    
        ->add("password", "repeated" , array(
            'type' => 'password',
            'invalid_message' => 'las contrasenias deben coincidir.',
            'options' => array('attr' => array('class' => 'password-field')),
            'required' => true,
            'first_options'  => array('label' => 'Password'),
            'second_options' => array('label' => 'Repita Password'),
            ))
        ->getForm(); 

        if ($request->isMethod('POST')) {
            $form->bind($request);

            if ($form->isValid()) {

                $data = $form->getData(); 


                $factory = $this->get('security.encoder_factory');

                $encoder = $factory->getEncoder($usuario);

                $pass = $encoder->encodePassword($usuario->getPassword(), $usuario->getSalt());
                $usuario->setPassword(  $pass );
                $usuario->setEnabled(  1 );

                $em = $this->getDoctrine()->getManager();
                $em->persist( $usuario );
                $em->flush();

                return $this->redirect($this->generateUrl('usuario_ingresa'));

            }else{
                print_r($form->getErrors());
            }
        }



        return $this->render('AppShopThemeBundle:Paginas:registar.html.twig' , 
            array("form"=> $form->createView())
            );
    }


}


