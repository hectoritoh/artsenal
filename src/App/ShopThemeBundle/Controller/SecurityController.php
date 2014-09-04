<?php

namespace App\ShopThemeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Selnet\TiendaOnlineBundle\Entity\Usuario;



class SecurityController extends Controller
{
	public function loginAction()
	{

       $request = $this->getRequest();
       $session = $request->getSession();

        // get the login error if there is one
       if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
        $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
    } else {
        $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
    }
    
    return $this->render('AppShopThemeBundle:Paginas:login.html.twig', array(
            // last username entered by the user
        'last_username' => $session->get(SecurityContext::LAST_USERNAME),
        'error'         => $error,
        ));
    
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
            // print_r($form->getErrors());
        }
    }



    return $this->render('AppShopThemeBundle:Paginas:registar.html.twig' , 
        array("form"=> $form->createView())
        );
}


}


