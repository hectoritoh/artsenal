<?php

namespace Setnet\ArtsenalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\Query\ResultSetMapping;
use Symfony\Component\HttpFoundation\Session\Session;

class DefaultController extends Controller {

    public function getHomeAction() {
        return $this->render('SetnetArtsenalBundle:Block:home.html.twig');
    }

    public function indexAction() {

        $sql = "   select p.* , t.nombre as tienda , per.nombre as usuario , foto.url as imagen from art_producto p 
    left join art_tienda t on p.id_tienda = t.id
    left join art_perfil per on per.id_usuario = t.id_usuario
    left join art_producto_foto foto on foto.id_producto = p.id
    group by p.id
    order by p.created ";

        $conn = $this->container->get('database_connection');
        $rows = $conn->fetchAll($sql);
        $productos = $rows;

        $categorias = $this->getDoctrine()->getRepository('SetnetArtsenalBundle:ArtCategoria')->findAll();

        return $this->render('SetnetArtsenalBundle:Pages:index.html.twig', array(
                    "categorias" => $categorias,
                    "productos" => $productos
        ));
    }

    public function getBannersAction() {
        $em = $this->getDoctrine()->getManager();
        $banners = $em->getRepository('SetnetArtsenalBundle:CmsSlider')->findAll();
        return $this->render('SetnetArtsenalBundle:Block:banners.html.twig', array(
                    "slider" => $banners
        ));
    }

    public function getCategoriasAction() {
        $em = $this->getDoctrine()->getManager();
        $categorias = $em->getRepository('SetnetArtsenalBundle:ArtCategoria')->findAll();
        return $this->render('SetnetArtsenalBundle:Block:categorias.html.twig', array(
                    "categorias" => $categorias
        ));
    }

    public function getProductosPorCategoriaAction($id_categoria) {

        $em = $this->getDoctrine()->getManager();
        $categoria = $em->getRepository('SetnetArtsenalBundle:ArtCategoria')->find($id_categoria);
        $subcategorias = $em->getRepository('SetnetArtsenalBundle:ArtSubcategoria')->findBy(array("idCategoria" => $categoria));

        $subcategorias_buscar = "";

        foreach ($subcategorias as $subcategoria) {
            $subcategorias_buscar = $subcategorias_buscar . $subcategoria->getId() . ",";
        }
        $subcategorias_buscar = rtrim($subcategorias_buscar, ",");


        $sql = "   select p.* , t.nombre as tienda , per.nombre as usuario , foto.url as imagen from art_producto p 
  left join art_tienda t on p.id_tienda = t.id
  left join art_perfil per on per.id_usuario = t.id_usuario
  left join art_producto_foto foto on foto.id_producto = p.id
  where p.id_subcategoria in ( $subcategorias_buscar )
  group by p.id
  order by p.created ";

        $conn = $this->container->get('database_connection');

        $productos = $conn->fetchAll($sql);

        return $this->render('SetnetArtsenalBundle:Block:productos_list.html.twig', array("productos" => $productos));
    }

    public function filtroSubcategoriaAction($id_subcategoria) {

        $em = $this->getDoctrine()->getManager();

        $productos = $em->getRepository('SetnetArtsenalBundle:ArtProducto')->findBy(array("idSubcategoria" => $id_subcategoria));

        return $this->render('SetnetArtsenalBundle:Block:productos_list.html.twig', array("productos" => $productos));
    }

    public function getProductosSliderAction() {

        $sql = "   select p.* , t.nombre as tienda , per.nombre as usuario , foto.url as imagen from art_producto p 
 left join art_tienda t on p.id_tienda = t.id
 left join art_perfil per on per.id_usuario = t.id_usuario
 left join art_producto_foto foto on foto.id_producto = p.id
 group by p.id
 order by p.created ";

        $conn = $this->container->get('database_connection');
        $rows = $conn->fetchAll($sql);
        $productos = $rows;

        return $this->render('SetnetArtsenalBundle:Block:productos_slider.html.twig', array("productos" => $productos));
    }

    public function getProductosMasVisitadosSliderAction() {

        $sql = "   select p.* , t.nombre as tienda , per.nombre as usuario , foto.url as imagen from art_producto p 
 left join art_tienda t on p.id_tienda = t.id
 left join art_perfil per on per.id_usuario = t.id_usuario
 left join art_producto_foto foto on foto.id_producto = p.id
 group by p.id
 order by p.created ";

        $conn = $this->container->get('database_connection');
        $rows = $conn->fetchAll($sql);
        $productos = $rows;

        return $this->render('SetnetArtsenalBundle:Block:productos_mas_visitados.html.twig', array("productos" => $productos));
    }

    public function getTiendasSliderAction() {

        $em = $this->getDoctrine()->getManager();
        $tiendas = $em->getRepository('SetnetArtsenalBundle:ArtTienda')->findAll();

        return $this->render('SetnetArtsenalBundle:Block:tiendas_slider.html.twig', array("tiendas" => $tiendas));
    }

    public function productosDetalleAction($id_producto) {

        $producto = $this->getDoctrine()->getRepository("SetnetArtsenalBundle:ArtProducto")->findOneBy(array("id" => $id_producto));
        $imagenes = $this->getDoctrine()->getRepository("SetnetArtsenalBundle:ArtProductoFoto")->findOneBy(array("idProducto" => $id_producto));

        $em = $this->getDoctrine()->getManager();
        $producto->setVisitas($producto->getVisitas() + 1);
        $em->persist($producto);
        $em->flush();

        return $this->render('SetnetArtsenalBundle:Pages:ver.producto.html.twig', array(
                    "producto" => $producto,
                    "imagenes" => $imagenes
        ));
    }

    public function registraResultadoVendedorAction() {
        return $this->render('SetnetArtsenalBundle:Login:registro.exito.html.twig');
    }

    public function categoriaAction($categoria) {

        $categorias = $this->getDoctrine()->getRepository('SetnetArtsenalBundle:ArtCategoria')->findAll();
        $selected_categoria = $this->getDoctrine()->getRepository('SetnetArtsenalBundle:ArtCategoria')->find($categoria);
        $subcategoria = $this->getDoctrine()->getRepository('SetnetArtsenalBundle:ArtSubcategoria')->findBy(
                array("idCategoria" => $categoria));


        $productos = array();

        if (count($subcategoria) != 0) {

            $productos = $this->getDoctrine()->getRepository('SetnetArtsenalBundle:ArtProducto')->findBy(array(
                "idSubcategoria" => $subcategoria[0]->getId()
            ));
        }

        return $this->render('SetnetArtsenalBundle:Pages:categorias.html.twig', array(
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

}
