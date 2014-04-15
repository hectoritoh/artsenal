<?php

namespace Selnet\TiendaOnlineBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Selnet\TiendaOnlineBundle\Entity\Tienda;
use Selnet\TiendaOnlineBundle\Entity\Producto;
use Selnet\TiendaOnlineBundle\Entity\ProductoDestinatario;
use Selnet\TiendaOnlineBundle\Entity\ProductoImagen;
use Selnet\TiendaOnlineBundle\Form\ProductoImagenType;
use Selnet\TiendaOnlineBundle\Entity\ProductoOcasion;
use Symfony\Component\HttpFoundation\Request;


class TiendaController extends Controller
{
    public function indexAction()
    {
        return $this->render('.html.twig');
    }
    



    public function verAction( $id_tienda )
    {
 
        $em     = $this->getDoctrine()->getManager();
        $tienda = $em->getRepository('SelnetTiendaOnlineBundle:Tienda')->find($id_tienda );
        $usuario = $em->getRepository('SelnetTiendaOnlineBundle:Usuario')->find(  $tienda->getUsuario()->getId() );

        
        $productos = $em->getRepository('SelnetTiendaOnlineBundle:Producto')->findBy(array("tienda"=> $tienda));

        foreach ($productos as $producto) {
            if (!isset( $secciones[  $producto->getSubcategoria()->getNombre() ] )) {
                $secciones[  $producto->getSubcategoria()->getNombre() ] = 1 ;  # code...
            }else{
                $secciones[  $producto->getSubcategoria()->getNombre() ]++;
            }
        }

        return $this->render('SelnetTiendaOnlineBundle:Pages:ver.tienda.html.twig' , array(
            "tienda" => $tienda, 
            "productos" => $productos,
            "modo_editar" => false, 
            "secciones" => $secciones 
            ));
    }


    public function previewAction()
    {


        $secciones = array();





        $usuario       = $this->get('security.context')->getToken()->getUser();

        $em     = $this->getDoctrine()->getManager();
        $tienda = $em->getRepository('SelnetTiendaOnlineBundle:Tienda')->findOneBy(array(
            "usuario" => $usuario
            ));


        
        $productos = $em->getRepository('SelnetTiendaOnlineBundle:Producto')->findBy(array("tienda"=> $tienda));

        foreach ($productos as $producto) {
            if (!isset( $secciones[  $producto->getSubcategoria()->getNombre() ] )) {
                $secciones[  $producto->getSubcategoria()->getNombre() ] = 1 ;  # code...
            }else{
                $secciones[  $producto->getSubcategoria()->getNombre() ]++;
            }
        }



        return $this->render('SelnetTiendaOnlineBundle:Pages:preview.tienda.html.twig' , array(
            "tienda" => $tienda, 
            "productos" => $productos, 
            "secciones" => $secciones 
            ));
    }
    

    public function politicasAction(Request $request)
    {
      $usuario       = $this->get('security.context')->getToken()->getUser();
      $tienda_existe = true;

      $em     = $this->getDoctrine()->getManager();
      $tienda = $em->getRepository('SelnetTiendaOnlineBundle:Tienda')->findOneBy(array(
        "usuario" => $usuario
        ));

      $form = $this->createFormBuilder($tienda)
      ->add("mensajeBienvenida", "textarea" ,array("label"=> "Mensaje de bienvenida:")) 
      ->add("politicaPagos", "textarea",array("label"=> "Politicas de Pago:")) 
      ->add("politicaReembolso", "textarea",array("label"=> "Politicas de Reembolsos:"))
      ->add("informacionAdicional", "textarea",array("label"=> "Informacion Adicional:"))
      ->add("informacionVendedor", "textarea",array("label"=> "Informacion de Vendedor:"))
      ->getForm(); 

      if ($request->isMethod('POST')) {
        $form->bind($request);

        if ($form->isValid()) {
            $em->persist($tienda);
            $em->flush();
        }else{
            print_r($form->getErrors());
        }

    }
    return $this->render('SelnetTiendaOnlineBundle:Pages:politicas.tienda.html.twig' , array("form"=> $form->createView()));
}


public function personalizarTiendaAction(Request $request)
{
  $usuario       = $this->get('security.context')->getToken()->getUser();
  $tienda_existe = true;

  $em     = $this->getDoctrine()->getManager();
  $tienda = $em->getRepository('SelnetTiendaOnlineBundle:Tienda')->findOneBy(array(
    "usuario" => $usuario
    ));

  $form = $this->createFormBuilder($tienda)
  ->add("file", "file") 
  ->add("titulo", "text") 
  ->add("mensaje", "textarea")
  ->add("anuncio", "textarea")
  ->getForm(); 

  if ($request->isMethod('POST')) {
    $form->bind($request);

    $tienda->upload();
    if ($form->isValid()) {
        $em->persist($tienda);
        $em->flush();
    }else{
        print_r($form->getErrors());
    }

}


return $this->render('SelnetTiendaOnlineBundle:Pages:personaliza.tienda.html.twig', 
    array(
        "form" => $form->createView(), 
        "imagenCabecera" => $tienda->getImagenCabecera(), 
        )
    );
}





public function crearTiendaAction()
{

    $tienda      = new Tienda();
    $form_tienda = $this->createFormBuilder($tienda)->add('nombre', 'text')->getForm();


    return $this->render('SelnetTiendaOnlineBundle:Pages:crear.tienda.html.twig', array(
        "form_tienda" => $form_tienda->createView()
        ));
}



public function nombreTiendaAction(Request $request)
{
    $usuario       = $this->get('security.context')->getToken()->getUser();
    $tienda_existe = true;

    $em     = $this->getDoctrine()->getManager();
    $tienda = $em->getRepository('SelnetTiendaOnlineBundle:Tienda')->findOneBy(array(
        "usuario" => $usuario
        ));

    if (!$tienda) {
        $tienda_existe = false;
        $tienda        = new Tienda();
    }
    $form_tienda = $this->createFormBuilder($tienda)->add('nombre', 'text')->getForm();


    if ($request->isMethod('POST')) {
        $form_tienda->bind($request);

        if ($form_tienda->isValid()) {
            $tienda->setDescripcion("");
            $tienda->setBorrado(0);
            $tienda->setEstado("creacion");
            $tienda->setUsuario($usuario);

            $em->persist($tienda);
            $em->flush();
        }
    }
    return $this->render('SelnetTiendaOnlineBundle:Pages:crear.tienda.html.twig', array(
        "form_tienda" => $form_tienda->createView(),
        "tienda_existe" => $tienda_existe
        ));
}


public function productosTiendaAction(Request $request)
{


    $usuario = $this->get('security.context')->getToken()->getUser();
    $em      = $this->getDoctrine()->getManager();

    $tienda    = $em->getRepository('SelnetTiendaOnlineBundle:Tienda')->findOneBy(array(
        "usuario" => $usuario
        ));
    $productos = $em->getRepository('SelnetTiendaOnlineBundle:Producto')->findAll(array(
        "tienda" => $tienda
        ));

    $producto = new Producto();
    $producto->getImagenes()->add(new ProductoImagen());
    $producto->getImagenes()->add(new ProductoImagen());
    $producto->getImagenes()->add(new ProductoImagen());
    $producto->getImagenes()->add(new ProductoImagen());
    $producto->getImagenes()->add(new ProductoImagen());

    $form_producto = $this->createFormBuilder($producto)->add('nombre', 'text')->add('descripcion', 'text')->add('cantidad', 'integer')->add('precio', 'number')->add('imagenes', 'collection', array(
        'type' => new ProductoImagenType(),
        'required' => false
            // 'constraints' => new Count(
            // 	array('min' => 1, 'minMessage' => "favor suba minimo una imagen")
            // 	),
        ))->add('subcategoria', 'entity', array(
        'class' => 'SelnetTiendaOnlineBundle:Subcategoria',
        'property' => 'nombre'
        ))->add('ocasion', 'entity', array(
        'class' => 'SelnetTiendaOnlineBundle:ProductoOcasion',
        'property' => 'nombre'
        ))->add('destinatario', 'entity', array(
        'class' => 'SelnetTiendaOnlineBundle:ProductoDestinatario',
        'property' => 'nombre'
        ))->getForm();
        
        
        
        if ($request->isMethod('POST')) {
            $form_producto->bind($request);
            
            if ($form_producto->isValid()) {




                foreach ($producto->getImagenes() as $productoImagen) {
                    $productoImagen->upload();
                    
                    if ($productoImagen->getUrl() == null) {
                        $producto->removeImagene($productoImagen);
                    } else {

                        $productoImagen->setProducto($producto);
                    }
                }
                
                $producto->setTienda($tienda);
                $producto->setBorrado(0);
                $em->persist($producto);
                
                foreach ($producto->getImagenes() as $productoImagen) {
                    $em->persist($productoImagen);
                }
                
                $em->flush();
                
                return $this->redirect($this->generateUrl('producto_tienda'));
                
            }
        }
        
        return $this->render('SelnetTiendaOnlineBundle:Pages:crear.producto.html.twig', array(
            "form" => $form_producto->createView(),
            "productos" => $productos
            ));
    }
    
    
}
