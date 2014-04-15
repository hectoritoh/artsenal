<?php

namespace Setnet\ArtsenalBundle\Controller;

use Setnet\ArtsenalBundle\Entity\ArtTienda;
use Setnet\ArtsenalBundle\Entity\ArtProducto;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class TiendaController extends Controller {
    /* metodo para la creacion de la tienda */

    public function mostrarProductosTiendaAction($subcategoria  , $tienda ) {


    }



    public function crearAction(Request $request) {

        $existe_tienda = true;
        $usuario = $this->get('security.context')->getToken()->getUser();


        $em = $this->getDoctrine()->getManager();
        $tienda = $this->getDoctrine()->getRepository("SetnetArtsenalBundle:ArtTienda")->findOneBy(
            array("idUsuario" => $usuario->getId())
            );

        if (!$tienda) {
            $tienda = new ArtTienda();
            $existe_tienda = false;
        }
        $formTienda = $this->createFormBuilder($tienda)->add('nombre', 'text')->getForm();

        if ($request->isMethod('POST')) {
            $formTienda->bind($request);

            if ($formTienda->isValid()) {
                $tienda->setIdUsuario($usuario->getId());
                $tienda->setEstado("C");

                if (!$existe_tienda) {
                    $tienda->setImagenCabecera("default.png");
                    $tienda->setMensajeCliente("");
                    $tienda->setAnuncio("");
                    $tienda->setTitulo("");
                }

                $em = $this->getDoctrine()->getManager();
                $em->persist($tienda);
                $em->flush();
                return $this->redirect($this->generateUrl('crear_articulo'));
            } else {
                return $this->redirect($this->generateUrl('crear_tienda'));
            }
        }

        return $this->render('SetnetArtsenalBundle:Tienda:crea.nombre.html.twig', array(
            "formTienda" => $formTienda->createView()
            )
        );
    }

    public function mostrarArticulosAction() {

        $usuario = $this->get('security.context')->getToken()->getUser();
        $tienda = $this->getDoctrine()->getRepository("SetnetArtsenalBundle:ArtTienda")->findOneBy(
            array("idUsuario" => $usuario->getId())
            );
        $producto = $this->getDoctrine()->getRepository("SetnetArtsenalBundle:ArtProducto")->findBy(
            array("idTienda" => $tienda->getId())
            );
        return $this->render('SetnetArtsenalBundle:Tienda:articulos_list.html.twig', array(
            "productos" => $producto
            ));
    }

    public function editarArticulosAction($id_articulo) {

        $producto = $this->getDoctrine()->getRepository("SetnetArtsenalBundle:ArtProducto")->find($id_articulo);
        if ($producto == null) {

            $producto = new ArtProducto();
            $producto->getImagenes()->add(new \Setnet\ArtsenalBundle\Entity\ArtProductoFoto());
            $producto->getImagenes()->add(new \Setnet\ArtsenalBundle\Entity\ArtProductoFoto());
            $producto->getImagenes()->add(new \Setnet\ArtsenalBundle\Entity\ArtProductoFoto());
            $producto->getImagenes()->add(new \Setnet\ArtsenalBundle\Entity\ArtProductoFoto());
            $producto->getImagenes()->add(new \Setnet\ArtsenalBundle\Entity\ArtProductoFoto());
        } else {
            if (count($producto->getImagenes()) < 5) {
                for ($i = count($producto->getImagenes()); $i < 5; $i++) {
                    $producto->getImagenes()->add(new \Setnet\ArtsenalBundle\Entity\ArtProductoFoto());
                }
            }
        }

        $formProducto = $this->createForm(new \Setnet\ArtsenalBundle\Form\Type\ProductoType(), $producto);

        return $this->render('SetnetArtsenalBundle:Tienda:crea.articulo.html.twig', array(
            "formProducto" => $formProducto->createView()
            )
        );
    }

    public function crearArticulosNuevoAction(Request $request) {

        $existe_producto = true;
        $usuario = $this->get('security.context')->getToken()->getUser();


        $tienda = $this->getDoctrine()->getRepository("SetnetArtsenalBundle:ArtTienda")->findOneBy(
            array("idUsuario" => $usuario->getId())
            );


        



        $existe_producto = false;
        $producto = new ArtProducto();

        $producto->getImagenes()->add(new \Setnet\ArtsenalBundle\Entity\ArtProductoFoto());
        $producto->getImagenes()->add(new \Setnet\ArtsenalBundle\Entity\ArtProductoFoto());
        $producto->getImagenes()->add(new \Setnet\ArtsenalBundle\Entity\ArtProductoFoto());
        $producto->getImagenes()->add(new \Setnet\ArtsenalBundle\Entity\ArtProductoFoto());
        $producto->getImagenes()->add(new \Setnet\ArtsenalBundle\Entity\ArtProductoFoto());


        $formProducto = $this->createForm(new \Setnet\ArtsenalBundle\Form\Type\ProductoType(), $producto);
        if ($request->isMethod('POST')) {
            $formProducto->bind($request);

            if ($formProducto->isValid()) {
                $em = $this->getDoctrine()->getEntityManager();
                $producto->setIdTienda($tienda);
                $producto->setEstado("C");
                $em->persist($producto);
                if (!$existe_producto) {
                    $producto->setVisitas(0);
                    $producto->setFavorito(0);
                }

                foreach ($producto->getImagenes() as $imagen) {
                    $imagen->upload();
                    $imagen->setIdProducto($producto);
                    $em->persist($imagen);
                }
                $em->flush();
            }
        }


        return $this->render('SetnetArtsenalBundle:Tienda:crea.articulo.html.twig', array(
            "formProducto" => $formProducto->createView()
            )
        );
    }

    public function crearFacturacionAction(Request $request) {

        $session = $this->getRequest()->getSession();
         $usuario = $this->get('security.context')->getToken()->getUser();
         

        $tienda = $this->getDoctrine()->getRepository("SetnetArtsenalBundle:ArtTienda")->findOneBy(
            array("idUsuario" => $usuario->getId())
            );

        $informacionTarjeta = $this->getDoctrine()->getRepository("SetnetArtsenalBundle:ArtTiendaTarjetaCredito")->findOneBy(
            array("idTienda" => $tienda->getId())
            );

        if ($informacionTarjeta == null)
            $informacionTarjeta = new \Setnet\ArtsenalBundle\Entity\ArtTiendaTarjetaCredito();

        $formInformacionTarjeta = $this->createForm(new \Setnet\ArtsenalBundle\Form\ArtTiendaTarjetaCreditoType(), $informacionTarjeta);


        if ($request->isMethod('POST')) {

            $formInformacionTarjeta->bind($request);

            if ($formInformacionTarjeta->isValid()) {

                $informacionTarjeta->setIdTienda($tienda->getId());

                $em = $this->getDoctrine()->getManager();
                $em->persist($informacionTarjeta);
                $em->flush();

                return $this->redirect($this->generateUrl('crear_finalizar'));
            }
        }

        return $this->render('SetnetArtsenalBundle:Tienda:crea.facturacion.html.twig', array("formInformacionTarjeta" => $formInformacionTarjeta->createView())
            );
    }

    public function crearFinalizarAction() {

        $usuario = $this->get('security.context')->getToken()->getUser();
        $tienda = $this->getDoctrine()->getRepository("SetnetArtsenalBundle:ArtTienda")->findOneBy(
            array("idUsuario" => $usuario->getId())
            );
        $productos = $this->getDoctrine()->getRepository("SetnetArtsenalBundle:ArtProducto")->findBy(
            array("idTienda" => $tienda->getId())
            );
        $tienda->setEstado("P");
        $em = $this->getDoctrine()->getManager();
        $em->persist($tienda);

        foreach ($productos as $producto) {
            $producto->setEstado("P");
            $em->persist($producto);
        }
        $em->flush();
        return $this->render('SetnetArtsenalBundle:Tienda:crea.finalizar.html.twig');
    }

    public function politicasAction(Request $request) {



        $usuario = $this->get('security.context')->getToken()->getUser();


        $tienda = $this->getDoctrine()->getRepository("SetnetArtsenalBundle:ArtTienda")->findOneBy(
            array("idUsuario" => $usuario->getId())
            );


        $politicas = $this->getDoctrine()->getRepository("SetnetArtsenalBundle:ArtTiendaPolitica")->findOneBy(
            array("idTienda" => $tienda->getId())
            );
        if ($politicas == null)
            $politicas = new \Setnet\ArtsenalBundle\Entity\ArtTiendaPolitica();
        $formPoliticas = $this->createFormBuilder($politicas)
        ->add('mensaje_bienvenidad', 'textarea')
        ->add('pagos', 'textarea')
        ->add('envio', 'textarea')
        ->add('reembolso', 'textarea')
        ->add('informacion_adicional', 'textarea')
        ->add('vendedor', 'textarea')
        ->getForm();


        if ($request->isMethod('POST')) {

            $formPoliticas->bind($request);

            if ($formPoliticas->isValid()) {
                $politicas->setIdTienda($tienda);
                $em = $this->getDoctrine()->getManager();
                $em->persist($politicas);
                $em->flush();
            }
        }

        return $this->render('SetnetArtsenalBundle:Tienda:politicas.html.twig', array(
            "form" => $formPoliticas->createView()));
    }




    public function verPoliticasAction($id_tienda) {

        $usuario = $this->get('security.context')->getToken()->getUser();


        $perfil = $this->getDoctrine()->getRepository("SetnetArtsenalBundle:ArtPerfil")->findOneBy(
                array("id_usuario" => $usuario->getId())
        );

        $tienda = $this->getDoctrine()->getRepository("SetnetArtsenalBundle:ArtTienda")->findOneBy(
                array("idUsuario" => $usuario->getId())
        );

        $productos = $this->getDoctrine()->getRepository("SetnetArtsenalBundle:ArtProducto")->findBy(
                array("idTienda" => $tienda->getId())
        );


        $subcategorias = array();


        foreach ($productos as $producto) {
            $subcategorias[$producto->getIdSubcategoria()->getNombre()] = $producto->getIdSubcategoria();
        }


        $politicas = $this->getDoctrine()->getRepository("SetnetArtsenalBundle:ArtTiendaPolitica")->findOneBy(
                array("idTienda" => $id_tienda)
        );

        if ($politicas == null)
            $politicas = new \Setnet\ArtsenalBundle\Entity\ArtTiendaPolitica();
        $formPoliticas = $this->createFormBuilder($politicas)
                ->add('mensaje_bienvenidad', 'textarea')
                ->add('pagos', 'textarea')
                ->add('envio', 'textarea')
                ->add('reembolso', 'textarea')
                ->add('informacion_adicional', 'textarea')
                ->add('vendedor', 'textarea')
                ->getForm();


        return $this->render('SetnetArtsenalBundle:Pages:politicas.html.twig', array(
                    "form" => $formPoliticas->createView(),
                    "tienda" => $tienda,
                    "productos" => $productos,
                    "perfil" => $perfil,
                    "subcategorias" => $subcategorias
        ));
    }






public function informacionAction(Request $request) {


    $usuario = $this->get('security.context')->getToken()->getUser();


    $tienda = $this->getDoctrine()->getRepository("SetnetArtsenalBundle:ArtTienda")->findOneBy(
        array("idUsuario" => $usuario->getId())
        );

    if ($tienda == null)
        $tienda = new ArtTienda();

    $formTienda = $this->createFormBuilder($tienda)
    ->add('titulo', 'text')
    ->add('file', 'file')
    ->add('imagen_cabecera', 'text')
    ->add('anuncio', 'textarea')
    ->add('mensaje_cliente', 'textarea')
    ->getForm();

    if ($request->isMethod('POST')) {

        $formTienda->bind($request);

        if ($formTienda->isValid()) {

            $tienda->upload();

            $em = $this->getDoctrine()->getManager();
            $em->persist($tienda);
            $em->flush();
        }
    }


    return $this->render('SetnetArtsenalBundle:Tienda:informacion.html.twig', array(
        "formTienda" => $formTienda->createView()));
}

public function previewAction() {
    $session = $this->getRequest()->getSession();
    $usuario = $this->getLoggedUser($session);


    $perfil = $this->getDoctrine()->getRepository("SetnetArtsenalBundle:ArtPerfil")->findOneBy(
        array("id_usuario" => $usuario->getId())
        );

    $tienda = $this->getDoctrine()->getRepository("SetnetArtsenalBundle:ArtTienda")->findOneBy(
        array("idUsuario" => $usuario->getId())
        );

    $productos = $this->getDoctrine()->getRepository("SetnetArtsenalBundle:ArtProducto")->findBy(
        array("idTienda" => $tienda->getId())
        );



    return $this->render('SetnetArtsenalBundle:Tienda:preview.html.twig', array(
        "tienda" => $tienda,
        "productos" => $productos,
        "perfil" => $perfil,
        )
    );
}







public function miTiendaAction() {


    $usuario = $this->get('security.context')->getToken()->getUser();


    $perfil = $this->getDoctrine()->getRepository("SetnetArtsenalBundle:ArtPerfil")->findOneBy(
        array("id_usuario" => $usuario->getId())
        );

    $tienda = $this->getDoctrine()->getRepository("SetnetArtsenalBundle:ArtTienda")->findOneBy(
        array("idUsuario" => $usuario->getId())
        );

    $productos = $this->getDoctrine()->getRepository("SetnetArtsenalBundle:ArtProducto")->findBy(
        array("idTienda" => $tienda->getId())
        );


    $subcategorias = array();


    foreach(    $productos as $producto ){
        $subcategorias[$producto->getIdSubcategoria()->getNombre()] = $producto->getIdSubcategoria(); 
    }



    return $this->render('SetnetArtsenalBundle:Tienda:mi.tienda.html.twig', array(
        "tienda" => $tienda,
        "productos" => $productos,
        "perfil" => $perfil , 
        "subcategorias" => $subcategorias
        )
    );
}


public function verTiendaAction(  $id_tienda ) {



    $tienda = $this->getDoctrine()->getRepository("SetnetArtsenalBundle:ArtTienda")->findOneBy(
        array("id" => $id_tienda )
        );

    $id_usuario = $tienda->getIdUsuario();


    $perfil = $this->getDoctrine()->getRepository("SetnetArtsenalBundle:ArtPerfil")->findOneBy(
        array("id_usuario" => $id_usuario)
        );

    $productos = $this->getDoctrine()->getRepository("SetnetArtsenalBundle:ArtProducto")->findBy(
        array("idTienda" => $id_tienda)
        );


    $subcategorias = array();


    foreach(    $productos as $producto ){
        $subcategorias[$producto->getIdSubcategoria()->getNombre()] = $producto->getIdSubcategoria(); 
    }



    return $this->render('SetnetArtsenalBundle:Tienda:mi.tienda.html.twig', array(
        "tienda" => $tienda,
        "productos" => $productos,
        "perfil" => $perfil , 
        "subcategorias" => $subcategorias
        )
    );
}



function getLoggedUser($session) {

    $usuario_id = $session->get("usuario_id");
    return $this->getDoctrine()->getRepository("SetnetArtsenalBundle:ArtUsuario")->find($usuario_id);
}

}

