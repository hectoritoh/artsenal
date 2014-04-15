<?php

namespace Setnet\ArtsenalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller; 
use Symfony\Component\HttpFoundation\Response; 
use Setnet\ArtsenalBundle\Entity\ArtProductoLike;  


class ProductoController extends Controller
{



    function ajaxUploadAction(){
        $request = $this->getRequest();

        if ($request->isXmlHttpRequest()) {
            $response = new Response();
            $output = array('success' => true);
            $response->headers->set('Content-Type', 'application/json');
            $response->setContent(json_encode($output));

            return $response;
        } else {
            return $this->redirect($this->generateUrl('user_img', array('id' => $entity->getId())));
        }
    }

    
    function productoNewAction() {


        $request = $this->getRequest();
        $session = $this->getRequest()->getSession();
        $usuario = $session->get("usuario");

        $tienda = $this->getDoctrine()->getRepository("SetnetArtsenalBundle:ArtTienda")->findOneBy(
            array("idUsuario" => $usuario->getId())
            );


        $producto = new \Setnet\ArtsenalBundle\Entity\ArtProducto();

        $productoFoto1 = new \Setnet\ArtsenalBundle\Entity\ArtProductoFoto();
        $productoFoto2 = new \Setnet\ArtsenalBundle\Entity\ArtProductoFoto();
        $productoFoto3 = new \Setnet\ArtsenalBundle\Entity\ArtProductoFoto();
        $productoFoto4 = new \Setnet\ArtsenalBundle\Entity\ArtProductoFoto();
        $productoFoto5 = new \Setnet\ArtsenalBundle\Entity\ArtProductoFoto();

        $producto->getImagenes()->add($productoFoto1);
        $producto->getImagenes()->add($productoFoto2);
        $producto->getImagenes()->add($productoFoto3);
        $producto->getImagenes()->add($productoFoto4);
        $producto->getImagenes()->add($productoFoto5);


        $formProducto = $this->createForm(new \Setnet\ArtsenalBundle\Form\Type\ProductoType(), $producto);


        if ($request->isMethod('POST')) {
            $formProducto->bind($request);

            if ($formProducto->isValid()) {


                $em = $this->getDoctrine()->getEntityManager();

                $producto->setIdTienda($tienda);
                $producto->setEstado("P");
                $producto->setFavorito(0);
                $producto->setVisitas(0);


                $em->persist($producto);

                foreach ($producto->getImagenes() as $imagen) {
                    $imagen->upload();
                    $imagen->setIdProducto($producto);
                    $em->persist($imagen);
                }

                $em->flush();
                
                return $this->redirect($this->generateUrl('tienda_preview'));
            }
        }




        return $this->render('SetnetArtsenalBundle:Producto:editar.popup.html.twig', array(
            "formProducto" => $formProducto->createView()
            ));

    }
    
    function productoEditAction(   $id_producto ) {

        $request = $this->getRequest();

        $producto = $this->getDoctrine()->getRepository("SetnetArtsenalBundle:ArtProducto")->findOneBy(
            array("idProducto" =>  $id_producto )
            );

        $formProducto = $this->createForm(new \Setnet\ArtsenalBundle\Form\Type\ProductoType(), $producto);


        if ($request->isMethod('POST')) {
            $formProducto->bind($request);

            if ($formProducto->isValid()) {

                $em = $this->getDoctrine()->getEntityManager();
                $em->persist($producto);

                foreach ($producto->getImagenes() as $imagen) {
                    $imagen->upload();
                    $imagen->setIdProducto($producto);
                    $em->persist($imagen);
                }

                $em->flush();
                
                return $this->redirect($this->generateUrl('tienda_preview'));
            }
        }

        return $this->render('SetnetArtsenalBundle:Producto:editar.popup.html.twig', array(
            "formProducto" => $formProducto->createView()
            ));

    }

    


    public function agregarFavoritoAction($id_producto)
    {

        $em = $this->getDoctrine()->getManager();
        $producto = $em->getRepository('SetnetArtsenalBundle:ArtProducto')->find( $id_producto );

        try{

            $usuario = $this->get('security.context')->getToken()->getUser();    

            $productoLike = new ArtProductoLike(); 
            $productoLike->setIdUsuario(  $usuario ); 
            $productoLike->setIdProducto(  $producto ); 
            $productoLike->setFechaCreacion(  new \DateTime() ); 
            $em->persist(  $productoLike ); 
            $em->flush();



            return $this->render('SetnetArtsenalBundle:Block:favorito.html.twig', array(
                "habilitado" =>  true  , 
                "producto" =>  $producto , 
                "error" => false , 
                "errorMsj" => "" , 
                ));
        }catch(\Exception $e){
            return $this->render('SetnetArtsenalBundle:Block:favorito.html.twig', array(
                "habilitado" =>  false , 
                "producto" =>  $producto , 
                "error" => true , 
                "errorMsj" => "Usuario debe estar logeado para realizaresta operacio " , 

                ));
        }

    }

    public function quitarFavoritoAction($id_producto)
    {
        $usuario = $this->get('security.context')->getToken()->getUser();    

        $em = $this->getDoctrine()->getManager();
        $producto = $em->getRepository('SetnetArtsenalBundle:ArtProducto')->find( $id_producto );
        $productoLike =  $em->getRepository('SetnetArtsenalBundle:ArtProductoLike')->findOneBy(
            array(
                "idProducto" => $producto , 
                "idUsuario" => $usuario
                )
            );
        $em->remove(  $productoLike ); 
        $em->flush();

        return $this->render('SetnetArtsenalBundle:Block:favorito.html.twig', array(
            "habilitado" =>  false , 
            "producto" =>  $producto  , 
            "error" => false , 
            "errorMsj" => "" , 
            ));

    }


    public function getFavoritoBtnAction($id_producto)
    {
        $usuario = $this->get('security.context')->getToken()->getUser();    

        $em = $this->getDoctrine()->getManager();
        $producto = $em->getRepository('SetnetArtsenalBundle:ArtProducto')->find( $id_producto );
        $productoLike =  $em->getRepository('SetnetArtsenalBundle:ArtProductoLike')->findOneBy(
            array(
                "idProducto" => $producto , 
                "idUsuario" => $usuario
                )
            );

        return $this->render('SetnetArtsenalBundle:Block:favorito.html.twig', array(
            "habilitado" =>  $productoLike != null , 
            "producto" =>  $producto  , 
            "error" => false , 
            "errorMsj" => "" , 
            ));
    }

} 