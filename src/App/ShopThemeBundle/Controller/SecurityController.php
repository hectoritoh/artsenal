<?php

namespace App\ShopThemeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Selnet\TiendaOnlineBundle\Entity\Usuario;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;
use Symfony\Component\Form\FormError;


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

    $em = $this->getDoctrine()->getManager();


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


            $existe_username  =  $em->getRepository('ApplicationSonataUserBundle:User')->findOneBy(array("username" => $usuario->getUsername()  ));
            $existe_correo    =  $em->getRepository('ApplicationSonataUserBundle:User')->findOneBy(array("email" => $usuario->getEmail()  ));



            if ( count($existe_correo) > 0   ) {
               $this->get('session')->getFlashBag()->add(
                'mensaje_error',
                'El correo ya esta siendo usado'
                );

               $form->get('username')->addError(new FormError('El usuario ya existe, intenta otro'));

           }

           if ( count($existe_username) > 0    ) {
               $this->get('session')->getFlashBag()->add(
                'mensaje_error',
                'El usuario esta siendo usado'
                );
               $form->get('email')->addError(new FormError('el correo ya esta siendo usado '));
           }


           if ( count($existe_username) ==0  &&  count($existe_correo) ==0 ) {


               $factory = $this->get('security.encoder_factory');

               $encoder = $factory->getEncoder($usuario);

               $pass = $encoder->encodePassword($usuario->getPassword(), $usuario->getSalt());

               $usuario->setEnabled(  1 );

            


               $userManager = $this->get('fos_user.user_manager');
               $user = $userManager->createUser();
               $user->setUsername(  $usuario->getUsername() );
               $user->setEmail($usuario->getEmail());
               $user->setPassword($usuario->getPassword());
               $user->setPlainPassword($usuario->getPassword());
               $user->setEnabled(true);

               $userManager->updateUser($user);

               $token = new UsernamePasswordToken($user, null, 'main', $user->getRoles());
               $this->get('security.context')->setToken($token);
               $this->get('session')->set('_security_main',serialize($token));


               return $this->redirect($this->generateUrl('app_shop_theme_homepage'));

           }

       }
   }



   return $this->render('AppShopThemeBundle:Paginas:registar.html.twig' , 
    array("form"=> $form->createView())
    );
}


}


