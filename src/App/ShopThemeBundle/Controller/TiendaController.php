<?php

namespace App\ShopThemeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Selnet\TiendaOnlineBundle\Entity\Tienda;
use Selnet\TiendaOnlineBundle\Entity\Producto;
use Selnet\TiendaOnlineBundle\Entity\ProductoDestinatario;
use Selnet\TiendaOnlineBundle\Entity\ProductoImagen;
use Selnet\TiendaOnlineBundle\Form\ProductoImagenType;
use Selnet\TiendaOnlineBundle\Entity\ProductoOcasion;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\File\UploadedFile; 


class TiendaController extends Controller
{




    public function setUpAction( Request $request  ){




        $form = $this->createFormBuilder()
            ->add('image', 'file') // If I remove this line data is submitted correctly
            ->getForm();

            if ($request->getMethod() == 'POST') {

              $form->handleRequest($request);

              $data = $form->getData();
              var_dump($data);
          }   



          $usuario = $this->get('security.context')->getToken()->getUser();

          $secciones = array();
          $productos = array();

          $em     = $this->getDoctrine()->getManager();
          $tienda = $em->getRepository('SelnetTiendaOnlineBundle:Tienda')->findOneBy(array("usuario" =>  $usuario->getUsername()  ));

          if(  !$tienda ){
            $tienda = new Tienda();


            /// valores por defecto para la creacion de la cuenta
            $tienda->setNombre("");
            $tienda->setEstado("inactivo");
            $tienda->setFechaActSuscripcion( new \DateTime());
            $tienda->setFechaSuscripcion(new \DateTime());
            $tienda->setTipoCuenta("bronce");

            if ( $tienda->getImagenCabecera() === null  ) {
                $tienda->setImagenCabecera(""); 
            }

            $tienda->setUsuario( $usuario->getUsername() );
            $em->persist(  $tienda );
            $em->flush();

        }else{

            $productos = $em->getRepository('SelnetTiendaOnlineBundle:Producto')->findBy(array(
                "tienda" => $tienda
                ));

            foreach ($productos as $producto) {
                if (!isset($secciones[$producto->getSubcategoria()->getNombre()])) {
                    $secciones[$producto->getSubcategoria()->getNombre()] = 1; # code...
                } else {
                    $secciones[$producto->getSubcategoria()->getNombre()]++;
                }
            }

        }

        return $this->render('AppShopThemeBundle:Setup:tienda.html.twig', array(
            "tienda" => $tienda,
            "productos" => $productos,
            "secciones" => $secciones, 
            "form" => $form->createView()
            ));

    }





    public function createImageAction(  $id_tienda  )
    {

        $data = array(); 
        
        $img = $_POST['imgBase64'];
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $dataImg = base64_decode($img);

        $filename = $nombre_archivo =  uniqid() . '.png';
        $filename = __DIR__.'/../../../../web/uploads/imagen_tienda/' . $filename;

        $success = file_put_contents($filename, $dataImg);

        $em = $this->getDoctrine()->getManager();
        $tienda = $em->getRepository('SelnetTiendaOnlineBundle:Tienda')->find($id_tienda);
        $tienda->setImagenCabecera(   $nombre_archivo ); 
        $em->flush(); 

        $data["success"] = "1"; 
        $data["image_url"] =  'uploads/imagen_tienda/' .  $nombre_archivo ; 
        $data["image_name"] =  $nombre_archivo ; 
        $data["image_asset"] =  $this->container->get('templating.helper.assets')->getUrl($filename); ; 

        $response = new Response(json_encode(  $data  ));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }



    public function uploadAction() {
        $data = array(); 
        


        $request = $this->getRequest();
        $form = $this->createFormBuilder()
            ->add('image', 'file') // If I remove this line data is submitted correctly
            ->getForm();

            if ($request->getMethod() == 'POST') {

                $archivo = $request->files->get(0);

                $archivo->move(
                 __DIR__.'/../../../../web/uploads/tmp',
                 $archivo->getClientOriginalName()
                 );

                $data["success"] = "1"; 
                $data["image_url"] =  'uploads/tmp/' .  $archivo->getClientOriginalName() ; 
                $data["image_name"] =  $archivo->getClientOriginalName() ; 


            }   
            
            $data["success"] = "0"; 

            $response = new Response(json_encode(  $data  ));
            $response->headers->set('Content-Type', 'application/json');
            
            return $response;


        }


        public function pagoSetupAction($tipo_cuenta)
        {

            $usuario = $this->get('security.context')->getToken()->getUser();
            $em      = $this->getDoctrine()->getManager();

            $tienda = $em->getRepository('SelnetTiendaOnlineBundle:Tienda')->findOneBy(array(
                "usuario" => $usuario->getUsername()
                ));


            $em->persist($tienda);
            $em->flush();

            return $this->render('AppShopThemeBundle:Setup:pago.html.twig', array(
                "tipo_cuenta" => $tipo_cuenta
                ));
        }





        public function personalizaSetupAction(Request $request)
        {
            $usuario       = $this->get('security.context')->getToken()->getUser();

            $em     = $this->getDoctrine()->getManager();
            $tienda = $em->getRepository('SelnetTiendaOnlineBundle:Tienda')->findOneBy(array(
                "usuario" => $usuario->getUsername()
                ));



            $form = $this->createFormBuilder($tienda)->add('imagenCabecera', 'sonata_media_type', array(
                'provider' => 'sonata.media.provider.image',
                'context' => 'tienda_cabecera'
                ))->add("titulo", "text")
            ->add("file", "file")
            ->add("mensaje", "textarea")
            ->add("anuncio", "textarea")
            ->getForm();

            if ($request->isMethod('POST')) {
                $form->handleRequest($request);

                $tienda->upload();
                if ($form->isValid()) {
                    $em->persist($tienda);
                    $em->flush();

                    return $this->redirect($this->generateUrl('tienda_setup'));
                }

            }


            return $this->render('AppShopThemeBundle:Setup:diseno.html.twig', array(
                "form" => $form->createView(),
                "tienda" => $tienda,
                "imagenCabecera" => $tienda->getImagenCabecera()
                ));
        }





        public function cuentaSetupAction(Request $request)
        {

            $usuario = $this->get('security.context')->getToken()->getUser();
            $em      = $this->getDoctrine()->getManager();


            $tienda = $em->getRepository('SelnetTiendaOnlineBundle:Tienda')->findOneBy(array(
                "usuario" => $usuario->getUsername()
                ));


            return $this->render('AppShopThemeBundle:Setup:cuenta.html.twig' , array("tienda" =>  $tienda ));
        }






        public function productoSetUpAction( Request $request ){

            $usuario = $this->get('security.context')->getToken()->getUser();
            $em      = $this->getDoctrine()->getManager();

            $cantidad_productos = 0;

            $tienda = $em->getRepository('SelnetTiendaOnlineBundle:Tienda')->findOneBy(array(
                "usuario" => $usuario->getUsername()
                ));


            if (!$tienda) {

                return $this->render('AppShopThemeBundle:Tienda:crear.tienda.html.twig');

            }


            $productos = $em->getRepository('SelnetTiendaOnlineBundle:Producto')->findBy(array(
                "tienda" => $tienda
                ));



            $producto = new Producto();
            $producto->getImagenes()->add(new ProductoImagen());
            $producto->getImagenes()->add(new ProductoImagen());
            $producto->getImagenes()->add(new ProductoImagen());
            $producto->getImagenes()->add(new ProductoImagen());
            $producto->getImagenes()->add(new ProductoImagen());

        // echo "<pre>";
        // \Doctrine\Common\Util\Debug::dump($producto);
        // echo "</pre>";


            $form_producto = $this->createFormBuilder($producto)->add('nombre', 'text')->add('descripcion', 'text')->add('cantidad', 'integer')->add('precio', 'number')->add('imagenes', 'collection', array(
                'type' => new ProductoImagenType(),
                'required' => false
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
        // die();


                if ($request->isMethod('POST')) {
                    $form_producto->handleRequest($request);

                    if ($form_producto->isValid()) {

                        foreach ($producto->getImagenes() as $productoImagen) {
                            $productoImagen->upload($this->get('kernel')->getRootDir() . '/../web/uploads/imagenes/productos');

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
                        $this->get('session')->getFlashBag()->set('message', 'Producto Creado Correctamente');



                    }
                }

                return $this->render('AppShopThemeBundle:Setup:producto.html.twig', array(
                    "form" => $form_producto->createView(),
                    "productos" => $productos,
                    "tienda_existe" => true,
                    "numero_productos" => count($productos)
                    ));
            }




            public function politicasSetupAction(Request $request)
            {
                $usuario       = $this->get('security.context')->getToken()->getUser();

                $em     = $this->getDoctrine()->getManager();
                $tienda = $em->getRepository('SelnetTiendaOnlineBundle:Tienda')->findOneBy(array(
                    "usuario" => $usuario->getUsername()
                    ));




                $form = $this->createFormBuilder($tienda)
                ->add("mensajeBienvenida", "textarea", array(
                    "label" => "Mensaje de bienvenida:",
                    'attr' => array('rows' => '3')
                    ))
                ->add("politicaPagos", "textarea", array(
                    "label" => "Politicas de Pago:",
                    'attr' => array('rows' => '3')
                    ))->add("politicaReembolso", "textarea", array(
                    "label" => "Politicas de Reembolsos:",
                    'attr' => array('rows' => '3')
                    ))->add("informacionAdicional", "textarea", array(
                    "label" => "Informacion Adicional:",
                    'attr' => array('rows' => '3')
                    ))->add("informacionVendedor", "textarea", array(
                    "label" => "Informacion de Vendedor:",
                    'attr' => array('rows' => '3')
                    ))->getForm();

                    if ($request->isMethod('POST')) {
                        $form->handleRequest($request);

                        if ($form->isValid()) {
                            $em->persist($tienda);
                            $em->flush();

                            return $this->redirect($this->generateUrl('tienda_setup'));
                        }

                    }

                    return $this->render('AppShopThemeBundle:Setup:politicas.html.twig', array(
                        "form" => $form->createView()
                        ));
                }





                public function nombreTiendaAction(Request $request)
                {
                    $usuario       = $this->get('security.context')->getToken()->getUser();
                    $tienda_existe = true;

                    $cantidad_productos = 0;

                    $em     = $this->getDoctrine()->getManager();
                    $tienda = $em->getRepository('SelnetTiendaOnlineBundle:Tienda')->findOneBy(array(
                        "usuario" => $usuario->getUsername()
                        ));




                    if (!$tienda) {
                        $tienda_existe = false;
                        $tienda        = new Tienda();
                    } else {

                        $productos          = $em->getRepository('SelnetTiendaOnlineBundle:Producto')->findBy(array(
                            "tienda" => $tienda
                            ));
                        $cantidad_productos = count($productos);
                    }


                    $form_tienda = $this->createFormBuilder($tienda)->add('nombre', 'text')->getForm();


                    if ($request->isMethod('POST')) {
                        $form_tienda->bind($request);

                        if ($form_tienda->isValid()) {
                            $tienda->setDescripcion("");
                            $tienda->setBorrado(0);
                            $tienda->setEstado("creacion");
                            $tienda->setUsuario($usuario->getUsername());

                            $em->persist($tienda);
                            $em->flush();

                            return $this->redirect($this->generateUrl('creacion_tienda_producto_artsenal'));
                        }
                    }

                    return $this->render('AppShopThemeBundle:Tienda:crear.nombre.html.twig', array(
                        "form_tienda" => $form_tienda->createView(),
                        "tienda_existe" => $tienda_existe,
                        "numero_productos" => $cantidad_productos
                        ));
                }






                public function productosTiendaAction(Request $request)
                {



                    $usuario = $this->get('security.context')->getToken()->getUser();
                    $em      = $this->getDoctrine()->getManager();

                    $cantidad_productos = 0;




                    $tienda = $em->getRepository('SelnetTiendaOnlineBundle:Tienda')->findOneBy(array(
                        "usuario" => $usuario->getUsername()
                        ));


                    if (!$tienda) {

                        return $this->render('AppShopThemeBundle:Tienda:crear.tienda.html.twig');

                    }


                    $productos = $em->getRepository('SelnetTiendaOnlineBundle:Producto')->findBy(array(
                        "tienda" => $tienda
                        ));



                    $producto = new Producto();
                    $producto->getImagenes()->add(new ProductoImagen());
                    $producto->getImagenes()->add(new ProductoImagen());
                    $producto->getImagenes()->add(new ProductoImagen());
                    $producto->getImagenes()->add(new ProductoImagen());
                    $producto->getImagenes()->add(new ProductoImagen());

        // echo "<pre>";
        // \Doctrine\Common\Util\Debug::dump($producto);
        // echo "</pre>";


                    $form_producto = $this->createFormBuilder($producto)->add('nombre', 'text')->add('descripcion', 'text')->add('cantidad', 'integer')->add('precio', 'number')->add('imagenes', 'collection', array(
                        'type' => new ProductoImagenType(),
                        'required' => false
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
        // die();


                        if ($request->isMethod('POST')) {
                            $form_producto->bind($request);

                            if ($form_producto->isValid()) {




                                foreach ($producto->getImagenes() as $productoImagen) {
                                    $productoImagen->upload($this->get('kernel')->getRootDir() . '/../web/uploads/imagenes/productos');

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
                                $this->get('session')->getFlashBag()->set('message', 'Producto Creado Correctamente');

                                return $this->redirect($this->generateUrl('creacion_tienda_producto_artsenal'));

                            }
                        }

                        return $this->render('AppShopThemeBundle:Tienda:crea.producto.html.twig', array(
                            "form" => $form_producto->createView(),
                            "productos" => $productos,
                            "tienda_existe" => true,
                            "numero_productos" => count($productos)
                            ));
                    }



                    public function membresiaTiendaAction(Request $request)
                    {

                        $usuario = $this->get('security.context')->getToken()->getUser();
                        $em      = $this->getDoctrine()->getManager();

                        $cantidad_productos = 0;


                        $tienda = $em->getRepository('SelnetTiendaOnlineBundle:Tienda')->findOneBy(array(
                            "usuario" => $usuario->getUsername()
                            ));


                        if (!$tienda) {

                            return $this->render('AppShopThemeBundle:Tienda:crear.tienda.html.twig');

                        }


                        $productos = $em->getRepository('SelnetTiendaOnlineBundle:Producto')->findBy(array(
                            "tienda" => $tienda
                            ));



                        return $this->render('AppShopThemeBundle:Tienda:crea.membresia.html.twig', array(
                            "tienda_existe" => true,
                            "numero_productos" => count($productos)
                            ));
                    }




                    public function finalizarTiendaAction($tipo_cuenta)
                    {

                        $usuario = $this->get('security.context')->getToken()->getUser();
                        $em      = $this->getDoctrine()->getManager();

                        $cantidad_productos = 0;


                        $tienda = $em->getRepository('SelnetTiendaOnlineBundle:Tienda')->findOneBy(array(
                            "usuario" => $usuario->getUsername()
                            ));

                        $productos = $em->getRepository('SelnetTiendaOnlineBundle:Producto')->findBy(array(
                            "tienda" => $tienda
                            ));

                        $tienda->setTipoCuenta($tipo_cuenta);
                        $tienda->setVerificado(0);


                        $em->persist($tienda);
                        $em->flush();



                        return $this->render('AppShopThemeBundle:Tienda:crear.finalizar.html.twig', array(
                            "tipo_cuenta" => $tipo_cuenta,
                            "tienda_existe" => true,
                            "numero_productos" => count($productos)
                            ));
                    }




                    public function verAction($id_tienda)
                    {

                        $em = $this->getDoctrine()->getManager();

                        $usuario = $this->get('security.context')->getToken()->getUser();
                        $tienda  = $em->getRepository('SelnetTiendaOnlineBundle:Tienda')->findOneBy(array(
                            "usuario" => $usuario->getUsername()
                            ));



                        $productos = $em->getRepository('SelnetTiendaOnlineBundle:Producto')->findBy(array(
                            "tienda" => $tienda
                            ));

                        foreach ($productos as $producto) {
                            if (!isset($secciones[$producto->getSubcategoria()->getNombre()])) {
                $secciones[$producto->getSubcategoria()->getNombre()] = 1; # code...
            } else {
                $secciones[$producto->getSubcategoria()->getNombre()]++;
            }
        }
        
        return $this->render('AppShopThemeBundle:Tienda:ver.tienda.html.twig', array(
            "tienda" => $tienda,
            "productos" => $productos,
            "modo_editar" => false,
            "secciones" => $secciones
            ));
    }
    
    
    public function previewAction()
    {


        $secciones = array();
        
        
        $usuario = $this->get('security.context')->getToken()->getUser();
        
        $em     = $this->getDoctrine()->getManager();
        $tienda = $em->getRepository('SelnetTiendaOnlineBundle:Tienda')->findOneBy(array(
            "usuario" => $usuario->getUsername()
            ));
        
        
        if (!$tienda) {

            return $this->render('AppShopThemeBundle:Tienda:crear.tienda.html.twig');
            
        }
        
        else {


            $productos = $em->getRepository('SelnetTiendaOnlineBundle:Producto')->findBy(array(
                "tienda" => $tienda
                ));
            
            foreach ($productos as $producto) {
                if (!isset($secciones[$producto->getSubcategoria()->getNombre()])) {
                    $secciones[$producto->getSubcategoria()->getNombre()] = 1; # code...
                } else {
                    $secciones[$producto->getSubcategoria()->getNombre()]++;
                }
            }
            
            
            
            return $this->render('AppShopThemeBundle:Tienda:preview.html.twig', array(
                "tienda" => $tienda,
                "productos" => $productos,
                "secciones" => $secciones
                ));
            
            
        }
        
    }
    
    
    public function politicasAction(Request $request)
    {
        $usuario       = $this->get('security.context')->getToken()->getUser();
        $tienda_existe = true;
        
        
        
        $em     = $this->getDoctrine()->getManager();
        $tienda = $em->getRepository('SelnetTiendaOnlineBundle:Tienda')->findOneBy(array(
            "usuario" => $usuario->getUsername()
            ));
        
        
        if (!$tienda) {

            return $this->render('AppShopThemeBundle:Tienda:crear.tienda.html.twig');
            
        }
        
        
        $form = $this->createFormBuilder($tienda)->add("mensajeBienvenida", "textarea", array(
            "label" => "Mensaje de bienvenida:"
            ))->add("politicaPagos", "textarea", array(
            "label" => "Politicas de Pago:"
            ))->add("politicaReembolso", "textarea", array(
            "label" => "Politicas de Reembolsos:"
            ))->add("informacionAdicional", "textarea", array(
            "label" => "Informacion Adicional:"
            ))->add("informacionVendedor", "textarea", array(
            "label" => "Informacion de Vendedor:"
            ))->getForm();
            
            if ($request->isMethod('POST')) {
                $form->bind($request);
                
                if ($form->isValid()) {
                    $em->persist($tienda);
                    $em->flush();
                } else {
                    print_r($form->getErrors());
                }
                
            }
            return $this->render('AppShopThemeBundle:Tienda:politicas.html.twig', array(
                "form" => $form->createView()
                ));
        }
        
        
        public function personalizarTiendaAction(Request $request)
        {
            $usuario       = $this->get('security.context')->getToken()->getUser();
            $tienda_existe = true;
            
            $em     = $this->getDoctrine()->getManager();
            $tienda = $em->getRepository('SelnetTiendaOnlineBundle:Tienda')->findOneBy(array(
                "usuario" => $usuario->getUsername()
                ));
            
            
            if (!$tienda) {

                return $this->render('AppShopThemeBundle:Tienda:crear.tienda.html.twig');
                
            }
            
            
            $form = $this->createFormBuilder($tienda)->add('imagenCabecera', 'sonata_media_type', array(
                'provider' => 'sonata.media.provider.image',
                'context' => 'tienda_cabecera'
                ))->add("titulo", "text")->add("mensaje", "textarea")->add("anuncio", "textarea")->getForm();
            
            if ($request->isMethod('POST')) {
                $form->bind($request);
                
                $tienda->upload();
                if ($form->isValid()) {
                    $em->persist($tienda);
                    $em->flush();
                }
                
            }
            
            
            return $this->render('AppShopThemeBundle:Tienda:personaliza.tienda.html.twig', array(
                "form" => $form->createView(),
                "tienda" => $tienda,
                "imagenCabecera" => $tienda->getImagenCabecera()
                ));
        }
        
        
        
        
        
        public function verTiendaAction($id_tienda)
        {

            $secciones = array();
            
            
            $usuario = $this->get('security.context')->getToken()->getUser();
            
            $em     = $this->getDoctrine()->getManager();
            $tienda = $em->getRepository('SelnetTiendaOnlineBundle:Tienda')->find($id_tienda);
            
            
            
            
            $productos = $em->getRepository('SelnetTiendaOnlineBundle:Producto')->findBy(array(
                "tienda" => $tienda
                ));
            
            foreach ($productos as $producto) {
                if (!isset($secciones[$producto->getSubcategoria()->getNombre()])) {
                $secciones[$producto->getSubcategoria()->getNombre()] = 1; # code...
            } else {
                $secciones[$producto->getSubcategoria()->getNombre()]++;
            }
        }
        
        
        
        return $this->render('AppShopThemeBundle:Tienda:ver.tienda.html.twig', array(
            "tienda" => $tienda,
            "productos" => $productos,
            "secciones" => $secciones
            ));
        
    }
    
    public function selectMembresiaAction(Request $request)
    {

        $usuario = $this->get('security.context')->getToken()->getUser();
        $em      = $this->getDoctrine()->getManager();

        $cantidad_productos = 0;


        $tienda = $em->getRepository('SelnetTiendaOnlineBundle:Tienda')->findOneBy(array(
            "usuario" => $usuario->getUsername()
            ));


        if (!$tienda) {

            return $this->render('AppShopThemeBundle:Tienda:crear.tienda.html.twig');

        }


        $productos = $em->getRepository('SelnetTiendaOnlineBundle:Producto')->findBy(array(
            "tienda" => $tienda
            ));



        // return $this->render('AppShopThemeBundle:Paginas:select.membresia.html.twig', array(
        //     "tienda_existe" => true,
        //     "numero_productos" => count($productos)
        //     ));

        return $this->render('AppShopThemeBundle:Paginas:select.membresia.html.twig');
    }
    
    
    
    
}
