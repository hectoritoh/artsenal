<?php

namespace Setnet\ArtsenalBundle\Controller;
 

use Symfony\Bundle\FrameworkBundle\Controller\Controller; 


class PerfilController extends Controller
{ 


    public function indexAction()
    {
        $usuario = $this->get('security.context')->getToken()->getUser();
        $perfil = $this->getDoctrine()->getRepository('SetnetArtsenalBundle:ArtPerfil')->findOneBy(array("id_usuario" =>   $usuario->getId() ));    
        $productosFavoritos = $this->getDoctrine()->getRepository('SetnetArtsenalBundle:ArtProductoLike')->findBy(
            array("idUsuario" =>   $usuario )
            );    

        $productos_buscar = ""; 
        foreach ($productosFavoritos as $prod) {
            $productos_buscar = $productos_buscar .  $prod->getIdProducto()->getId()  .  "," ; 
        }

        $productos_buscar = rtrim($productos_buscar, ",");

        $sql  = "   select p.* , t.nombre as tienda , per.nombre as usuario , foto.url as imagen from art_producto p 
        left join art_tienda t on p.id_tienda = t.id
        left join art_perfil per on per.id_usuario = t.id_usuario
        left join art_producto_foto foto on foto.id_producto = p.id
        where p.id in (  $productos_buscar ) 
        group by p.id
        order by p.created ";

        $conn = $this->container->get('database_connection');

        $productos = $conn->fetchAll($sql);



        if(  !$productosFavoritos ){
            $productos = array(); 
        }


        
        return $this->render('SetnetArtsenalBundle:Block:perfil.html.twig' , array(
            "usuario"  => $usuario ,  
            "perfil"  => $perfil , 
            "productosFavoritos" => $productos 
            ));
    }
  
 
    public function perfilAction(\Symfony\Component\HttpFoundation\Request $request) {

        $usuario = $this->get('security.context')->getToken()->getUser();

        
        $perfil = $this->getDoctrine()->getRepository('SetnetArtsenalBundle:ArtPerfil')->findOneBy(array("id_usuario" =>   $usuario->getId() ));    
        
        if(  $perfil == null    )
            $perfil = new \Setnet\ArtsenalBundle\Entity\ArtPerfil();
        
        $formPerfil = $this->createFormBuilder($perfil)
                ->add('nombre', 'text')
                ->add('imagen_perfil', 'text')
                ->add('sexo', 'choice' , array(
                    "label" => "Genero",
                    "expanded" => true , 
                    "choices" => array(
                    "h" => "Hombre",
                    "m" => "Mujer",
                    "n" => "Preferiria no decir")
                ))
                ->add('nacimiento', 'birthday' , array(
                    'widget' => 'choice',
                    'format' => 'yyyy-MM-dd',
                    'years' => range(date('Y'), date('Y')-50)
                ))
                ->add('file', 'file')
                ->add('ciudad', 'text')
                ->add('about', 'textarea')
                ->getForm();


        if ($request->isMethod('POST')) {
            $formPerfil->bind($request);

            if ($formPerfil->isValid()) {

                $em = $this->getDoctrine()->getEntityManager();
                $perfil->setIdUsuario($usuario->getId()); 
                $perfil->setFechaCreacion(new \DateTime()) ; 
                $perfil->setBorrado("N") ; 
                $perfil->upload(); 
                $em->persist($perfil); 
                $em->flush(); 
                return $this->redirect($this->generateUrl('perfil'));
                
            }
        }

        $errors= $formPerfil->getErrors(); 
        
        return $this->render('SetnetArtsenalBundle:Usuario:perfil.html.twig', array(
                    "form" => $formPerfil->createView(), 
                    "perfil" => $perfil
                ));
    }
    
} 