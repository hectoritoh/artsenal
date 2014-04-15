<?php

namespace Setnet\ArtsenalBundle\Controller;

use Setnet\ArtsenalBundle\Entity\ArtTienda;
use Setnet\ArtsenalBundle\Entity\ArtProducto;
use Setnet\ArtsenalBundle\Entity\ArtCart;
use Setnet\ArtsenalBundle\Entity\ArtCartItem;
use Setnet\ArtsenalBundle\Helper\CartHelper;
use Setnet\ArtsenalBundle\Helper;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;

class CartController extends Controller {




    public function checkoutAction(){

        $session = $this->get("session");

        $tienda = new ArtTienda();
        $formTienda = $this->createFormBuilder($tienda)->add('nombre', 'text')->getForm();
        $cart = CartHelper::getCartObject($session  , $this->getDoctrine()->getEntityManager()  );

        return $this->render('SetnetArtsenalBundle:Pages:checkout.html.twig', 
            array("formTienda"                 => $formTienda->createView() , 
              "despachado" => false ,  
              "cart"     => $cart
              )
            );        
    }



    public function despacharAction()
    {

        $usuario = $this->get('security.context')->getToken()->getUser();
        $session = $this->get("session");

        $cart = CartHelper::getCartObject($session  , $this->getDoctrine()->getEntityManager()  );
        $cart->setDescricion(""); 
        $cart->setFechaCreacion(  new \DateTime() ); 
        $cart->setUsuarioId(  $usuario->getId()    ); 


        $em = $this->getDoctrine()->getManager();


        foreach ($cart->getItems() as $item ) {
            $item->setCart(   $cart ); 
            
        }

        $em->persist(  $cart );
        $em->flush();   


        $cart = new ArtCart(); 


        return $this->render('SetnetArtsenalBundle:Pages:checkout.html.twig' , array(    
          "despachado" => true  ,  
          "cart"     => $cart) 
        );
    }


    public function agregarAction($id_producto) {

        $session = $this->get("session");

        $producto = $this->getDoctrine()->getRepository('SetnetArtsenalBundle:ArtProducto')->find($id_producto);
        $cart = CartHelper::agregarItemCart($session, $producto);

        $response = new Response(json_encode($cart));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }


    public function eliminarAction($id_producto) {

        $session = $this->get("session");

        $producto = $this->getDoctrine()->getRepository('SetnetArtsenalBundle:ArtProducto')->find($id_producto);
        $cart = CartHelper::eliminarItemCart($session, $producto);

        
        // $response = new Response(json_encode($cart));
        // $response->headers->set('Content-Type', 'application/json');


        return $this->redirect($this->generateUrl('art_mostrar_carrito'));

        // return $response;
    }




    public function clearAction() {

        $session = $this->get("session");

        $cart = CartHelper::clearCart($session);
        $response = new Response(json_encode($cart));
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }











    public function indexAction() {

        $categorias = $this->getDoctrine()->getRepository('SetnetArtsenalBundle:ArtCategoria')->findAll();
        $slider = $this->getDoctrine()->getRepository('SetnetArtsenalBundle:CmsSlider')->findAll();
        $productos = $this->getDoctrine()->getRepository('SetnetArtsenalBundle:ArtProducto')->findAll();



        return $this->render('SetnetArtsenalBundle:Default:index.html.twig', array(
            "categorias" => $categorias,
            "slider" => $slider,
            "productos" => $productos
            ));
    }

    public function productosDetalleAction() {
        return $this->render('SetnetArtsenalBundle:Producto:producto.detalle.html.twig');
    }

    public function registraResultadoVendedorAction() {
        return $this->render('SetnetArtsenalBundle:Login:registro.exito.html.twig');
    }

    public function categoriaAction($categoria) {

        $categorias = $this->getDoctrine()->getRepository('SetnetArtsenalBundle:ArtCategoria')->findAll();
        $productos = $this->getDoctrine()->getRepository('SetnetArtsenalBundle:ArtProducto')->findAll();
        $selected_categoria = $this->getDoctrine()->getRepository('SetnetArtsenalBundle:ArtCategoria')->find($categoria);

        $subcategoria = $this->getDoctrine()->getRepository('SetnetArtsenalBundle:ArtSubcategoria')->findBy(
            array("idCategoria" => $categoria));


        return $this->render('SetnetArtsenalBundle:Default:default.categoria.html.twig', array(
            "categorias" => $categorias,
            "subcategorias" => $subcategoria,
            "productos" => $productos,
            "selected_categoria" => $selected_categoria
            ));
    }

    

    public function quienesSomosAction() {

        $contenido = $this->getDoctrine()->getRepository('SetnetArtsenalBundle:Contenido')->findBy(
            array(
                "categoria" => "about",
                "estado" => "S"
                )
            );

        return $this->render('SetnetArtsenalBundle:Default:quienes.somos.html.twig', array(
            "contenido" => $contenido
            ));
    }

    public function preguntasAction() {
        return $this->render('SetnetArtsenalBundle:Default:preguntas.html.twig');
    }

    public function politicasPrivacidadAction() {
        return $this->render('SetnetArtsenalBundle:Default:politicas.html.twig');
    }

    public function informacionAction() {

        $tienda = new ArtTienda();
        $formTienda = $this->createFormBuilder($tienda)
        ->add('titulo', 'text')
        ->add('imagen_cabecera', 'text')
        ->add('anuncio', 'textarea')
        ->add('mensaje_cliente', 'textarea')
        ->getForm();

        return $this->render('SetnetArtsenalBundle:Vendedor:vendedor.informacion.twig', array(
            "formTienda" => $formTienda->createView()));
    }

    public function politicasAction() {

        $politicas = new \Setnet\ArtsenalBundle\Entity\ArtTiendaPolitica();
        $formPoliticas = $this->createFormBuilder($politicas)
        ->add('mensaje_bienvenidad', 'textarea')
        ->add('pagos', 'textarea')
        ->add('envio', 'textarea')
        ->add('reembolso', 'textarea')
        ->add('informacion_adicional', 'textarea')
        ->add('vendedor', 'textarea')
        ->getForm();

        return $this->render('SetnetArtsenalBundle:Vendedor:vendedor.politicas.twig', array(
            "form" => $formPoliticas->createView()));
    }

    public function previewAction() {

        return $this->render('SetnetArtsenalBundle:Vendedor:vendedor.preview.twig');
    }

    




}

