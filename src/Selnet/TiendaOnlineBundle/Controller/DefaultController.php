<?php

namespace Selnet\TiendaOnlineBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Selnet\TiendaOnlineBundle\Entity\Tienda;
use Selnet\TiendaOnlineBundle\Entity\Usuario;
use Selnet\TiendaOnlineBundle\Entity\Subcategoria;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Core\SecurityContext;

class DefaultController extends Controller
{


    public function contenidoAction($tipo_contenido)
    {

        $tiposContenido = array(
            'comprar' => 1,
            'vender'  => 2,
            'preguntas'  => 3,
            'quienes_somos'  => 4, 
            'politicas'  => 5
            );

        $titulo = array(
            'comprar' => "Comprar",
            'vender'  => "Vender",
            'preguntas'  => "Preguntas Frecuentes",
            'quienes_somos'  => "Quienes Somos", 
            'politicas'  => "Politicas"
            );



        $em = $this->getDoctrine()->getManager();
        $result = $em->getRepository('SelnetTiendaOnlineBundle:Contenido')->findBy(array("categoria" =>   $tiposContenido[ $tipo_contenido ] ));


        return $this->render('SelnetTiendaOnlineBundle:Pages:contenido.html.twig' , array(
            "contenido" => $result,
            "titulo" => $titulo[ $tipo_contenido ]
            ));
    }


    public function secureLoginAction()
    {
       $request = $this->getRequest();
       $session = $request->getSession();

        // get the login error if there is one
       if ($request->attributes->has(SecurityContext::AUTHENTICATION_ERROR)) {
        $error = $request->attributes->get(SecurityContext::AUTHENTICATION_ERROR);
    } else {
        $error = $session->get(SecurityContext::AUTHENTICATION_ERROR);
    }
    
    return $this->render('SelnetTiendaOnlineBundle:Pages:login.html.twig', array(
            // last username entered by the user
        'last_username' => $session->get(SecurityContext::LAST_USERNAME),
        'error'         => $error,
        ));
}

public function productoModalAction($id_producto)
{

    $em = $this->getDoctrine()->getManager();
    $producto =$em->getRepository('SelnetTiendaOnlineBundle:Producto')->find(  $id_producto );
    return $this->render('SelnetTiendaOnlineBundle:Modal:modal.producto.html.twig' , 
        array("producto" => $producto));
}



public function categoriasAction($id_categoria)
{

 $em = $this->getDoctrine()->getManager();
 $categorias = $em->getRepository('SelnetTiendaOnlineBundle:Categoria')->findAll();
 $categoria = $em->getRepository('SelnetTiendaOnlineBundle:Categoria')->find( $id_categoria );


 $subcategoria = $em->getRepository('SelnetTiendaOnlineBundle:Subcategoria')->find( $categoria->getSubcategorias()->first() );
 $productos = $em->getRepository('SelnetTiendaOnlineBundle:Producto')->findBy(array("subcategoria"=> $subcategoria ));    


 return $this->render('SelnetTiendaOnlineBundle:Pages:categorias.html.twig', 
    array(
        'categorias' => $categorias , 
        'selected_categoria' => $categoria , 
        'subcategoria' => $subcategoria , 
        'productos' => $productos )
    );
}






public function subcategoriasAction($id_subcategoria)
{

 $em = $this->getDoctrine()->getManager();
 $categorias = $em->getRepository('SelnetTiendaOnlineBundle:Categoria')->findAll();

 $subcategoria = $em->getRepository('SelnetTiendaOnlineBundle:Subcategoria')->find( $id_subcategoria  );
 $categoria = $em->getRepository('SelnetTiendaOnlineBundle:Categoria')->find( $subcategoria->getCategoria()  );

 $productos = $em->getRepository('SelnetTiendaOnlineBundle:Producto')->findBy(array("subcategoria"=> $subcategoria ));    
 $banner = $em->getRepository('SelnetTiendaOnlineBundle:Banner')->find(1);

 return $this->render('SelnetTiendaOnlineBundle:Blocks:subcategorias.html.twig', 
    array(
        'categorias' => $categorias , 
        'selected_categoria' => $categoria , 
        'productos' => $productos )
    );
}



public function indexAction()
{
    $em = $this->getDoctrine()->getManager();
    $categorias = $em->getRepository('SelnetTiendaOnlineBundle:Categoria')->findAll();
    $productos = $em->getRepository('SelnetTiendaOnlineBundle:Producto')->findAll();
    $tiendas = $em->getRepository('SelnetTiendaOnlineBundle:Tienda')->findBy(array() , array('nombre' => 'ASC'));

    $banner = $em->getRepository('SelnetTiendaOnlineBundle:Banner')->find(1);

    return $this->render('SelnetTiendaOnlineBundle:Pages:index.html.twig', 
        array(
            'categorias' => $categorias , 
            'productos' => $productos , 
            'tiendas' => $tiendas , 
            'banner' => $banner)
        );
}



public function indexTiendaAction()
{
    $em = $this->getDoctrine()->getManager();
    $categorias = $em->getRepository('SelnetTiendaOnlineBundle:Categoria')->findAll();
    $productos = $em->getRepository('SelnetTiendaOnlineBundle:Producto')->findAll();
    $tiendas = $em->getRepository('SelnetTiendaOnlineBundle:Tienda')->findBy(array() , array('nombre' => 'ASC'));

    $banner = $em->getRepository('SelnetTiendaOnlineBundle:Banner')->find(1);

    return $this->render('SelnetTiendaOnlineBundle:Pages:index.tienda.html.twig', 
        array(
            'categorias' => $categorias , 
            'productos' => $productos , 
            'tiendas' => $tiendas , 
            'banner' => $banner)
        );
}



public function salirAction()
{
    $this->get('session')->clear();
    return $this->redirect($this->generateUrl('artsenal_index'));
}

public function ingresaAction()
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
    ->add("password", "password" , array(
        'required' => true
        ))
    ->getForm(); 


    return $this->render('SelnetTiendaOnlineBundle:Pages:login.html.twig', array("form"=>$form->createView() ));
    
}


public function registerUsuarioAction(Request $request)
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



    return $this->render('SelnetTiendaOnlineBundle:Pages:register.html.twig' , 
        array("form"=> $form->createView())
        );
}




public function crearTiendaAction()
{

    $tienda = new Tienda();
    $form_tienda = $this->createFormBuilder($tienda)
    ->add('nombre', 'text')     
    ->getForm();


    return $this->render('SelnetTiendaOnlineBundle:Pages:crear.tienda.html.twig' , 
        array("form_tienda"=> $form_tienda)
        );
}

}
