<?php

namespace Setnet\ArtsenalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;
 


class VendedorController extends Controller
{
    public function indexAction()
    {                        
        $categorias = $this->getDoctrine()->getRepository('SetnetArtsenalBundle:ArtCategoria')->findAll();
        $slider     = $this->getDoctrine()->getRepository('SetnetArtsenalBundle:CmsSlider')->findAll();
        $productos  = $this->getDoctrine()->getRepository('SetnetArtsenalBundle:ArtProducto')->findAll();

        return $this->render('SetnetArtsenalBundle:Default:index.html.twig', array(
            "categorias" => $categorias,
            "slider" => $slider,
            "productos" => $productos
        ));
    }
    
      
 
    
} 