<?php

namespace App\ShopThemeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;


class DefaultController extends Controller
{




public function tiendasAction()
{

	$em = $this->getDoctrine()->getManager();
	$tiendas = $em->getRepository('SelnetTiendaOnlineBundle:Tienda')->findAll();

    return $this->render('AppShopThemeBundle:Tienda:tiendas.html.twig' , array("tiendas" => $tiendas ));
}




	public function comprasAction()
	{

		$em = $this->getDoctrine()->getManager();
		$usuario = $this->get('security.context')->getToken()->getUser();
		$ventas = $em->getRepository('SelnetTiendaOnlineBundle:Venta')->findBy(  array("usuario"=> $usuario->getUsername()  ) );

		return $this->render('AppShopThemeBundle:Paginas:compras.html.twig' , array("ventas"=> $ventas )  );

	}



	public function tiendaAction()
	{

		$em = $this->getDoctrine()->getManager();
		$usuario = $this->get('security.context')->getToken()->getUser();
		$tienda = $em->getRepository('SelnetTiendaOnlineBundle:Tienda')->findOneBy( array("usuario"  =>  $usuario->getId()  ) );

		if (!$tienda) 
			return $this->redirect($this->generateUrl('creacion_tienda_artsenal'));
		else
			return $this->render('AppShopThemeBundle:Tienda:ver.html.twig' , array("tienda" => $tienda ));

	}




	public function getPublicidadAction()
	{
		$em = $this->getDoctrine()->getManager();
		$publicidad = $em->getRepository('SelnetTiendaOnlineBundle:Publicidad')->findOneBy(  array("tipo"=> 0 ));
		return $this->render('AppShopThemeBundle:Blocks:publicidad.html.twig' , array(  "publicidad" => $publicidad ));
	}

	public function getPublicidadBlockAction()
	{
		$em = $this->getDoctrine()->getManager();
		$publicidad = $em->getRepository('SelnetTiendaOnlineBundle:Publicidad')->findBy(  array("tipo"=> 1 ));
		return $this->render('AppShopThemeBundle:Blocks:publicidad.bloque.html.twig' , array(  "publicidades" => $publicidad ));
	}

	


	public function filtroProductoAction($categoria , $subcategoria , $precio , $ciudad  )
	{

		
		$sql  = 'SELECT p
		FROM SelnetTiendaOnlineBundle:Producto p '; 




		$precio_minimo = ($precio * 25 ) - 25 ; 
		$precio_maximo = $precio * 25 ; 

		if ($precio == "1") {
			$precio_minimo = 10 ; 
		}

		if ($precio == "5") {
			$precio_maximo = 9999999 ; 
		}

		if ($subcategoria != "-1"  && $precio != "-1" ) {
			$sql .= " where p.subcategoria = $subcategoria  and p.precio between $precio_minimo and $precio_maximo ";
		}else


		if ($subcategoria != "-1") {
			$sql .= " where p.subcategoria = $subcategoria ";
		}else


		if (  $precio != "-1" ) {
			$sql .= " where  p.precio between $precio_minimo and $precio_maximo ";
		}

		
		$em = $this->getDoctrine()->getManager();
		$query = $em->createQuery(
			$sql
			);

		$productos = $query->getResult();

		

		return $this->render('AppShopThemeBundle:Blocks:filtro.html.twig' , array( "productos" => $productos ));
	}



	public function getBannersAction()
	{

		$em = $this->getDoctrine()->getManager();
		$banners = $em->getRepository('SelnetTiendaOnlineBundle:Banner')->findAll();
		return $this->render('AppShopThemeBundle:Blocks:banners.html.twig' , array(   "banners" => $banners )  );
		
	}


	public function getCategoriasAction()
	{

		$em = $this->getDoctrine()->getManager();
		$categorias = $em->getRepository('SelnetTiendaOnlineBundle:Categoria')->findAll();
		return $this->render('AppShopThemeBundle:Blocks:categorias.html.twig' , array(   "categorias" => $categorias )  );
	}



	public function categoriaAction($slug)
	{

		$em = $this->getDoctrine()->getManager();
		$categoria = $em->getRepository('SelnetTiendaOnlineBundle:Categoria')->findOneBy( array("slug"=> $slug));
		$subcategorias = $em->getRepository('SelnetTiendaOnlineBundle:Subcategoria')->findBy( array("categoria"=> $categoria));
		$productos = $em->getRepository('SelnetTiendaOnlineBundle:Producto')->findAll();

		
		return $this->render('AppShopThemeBundle:Paginas:categoria.html.twig'  , array(   "subcategorias" => $subcategorias ,    "categoria" => $categoria  , "productos" => $productos  ) );
	}


	public function testAction()
	{


		$sql  = 'SELECT p
		FROM SelnetTiendaOnlineBundle:Producto p '; 

		$sql .= " where p.subcategoria.categoria = 1  ";
		






		$em = $this->getDoctrine()->getManager();
		$query = $em->createQuery(
			$sql
			);

		$products = $query->getResult();


		echo "$sql";
	// $query= ""; 

	// $em = $this->getDoctrine()->getManager();
	// $connection = $em->getConnection();
	// $statement = $connection->prepare("SELECT * FROM Producto ");
	// // $statement->bindValue('id', 123);
	// $statement->execute();
	// $results = $statement->fetchAll();
		echo "<pre>";
		\Doctrine\Common\Util\Debug::dump($products);
		
		echo "</pre>";

		die();
	// $em = $this->getDoctrine()->getManager();
	// $categorias = $em->getRepository('SelnetTiendaOnlineBundle:Subcategoria')->findAll();

	// foreach ($categorias as $categoria) {
	// 	$categoria->setSlug(null);
	// 	$em->persist( $categoria );
	// 	$em->flush();
	// }

 //    echo "ok";
	}


	public function getProductoAction($id_producto)
	{

		$em = $this->getDoctrine()->getManager();
		$producto = $em->getRepository('SelnetTiendaOnlineBundle:Producto')->find(  $id_producto );

		return $this->render('AppShopThemeBundle:Modal:producto.detalle.html.twig' , array(   "producto" => $producto ) );
	}



	public function indexAction()
	{

		$em = $this->getDoctrine()->getManager();
		$categorias = $em->getRepository('SelnetTiendaOnlineBundle:Categoria')->findAll();
		$productos = $em->getRepository('SelnetTiendaOnlineBundle:Producto')->findAll();
		$tiendas = $em->getRepository('SelnetTiendaOnlineBundle:Tienda')->findBy(array() , array('nombre' => 'ASC'));

		$banner = $em->getRepository('SelnetTiendaOnlineBundle:Banner')->findAll();

		return $this->render('AppShopThemeBundle:Default:index.html.twig' , array(			
			'productos' => $productos , 
			'tiendas' => $tiendas 
			)
		);
	}



	public function contenidoAction(  $contenido )
	{

		$categoria = 0 ;

		if ($contenido == "comprar") {
			$categoria = "1" ; 
		} 
		
		if ($contenido == "vender") {
			$categoria = "2" ; 
		} 
		
		if ($contenido == "preguntas") {
			$categoria = "3" ; 
		} 
		
		if ($contenido == "nosotros") {
			$categoria = "4" ; 
		} 

		if ($contenido == "politicas") {
			$categoria = "5" ; 
		} 

		$em = $this->getDoctrine()->getManager();
		$contenido = $em->getRepository('SelnetTiendaOnlineBundle:Contenido')->findOneBy(array(  "categoria" => $categoria ));
		$preguntas = $em->getRepository('SelnetTiendaOnlineBundle:Contenido')->findBy(array(  "categoria" => $categoria ));
		
		if ($categoria == "3") {
			return $this->render('AppShopThemeBundle:Paginas:preguntas_frecuentes.html.twig' , array( "preguntas" => $preguntas ) );
		}
		return $this->render('AppShopThemeBundle:Paginas:contenido.html.twig' , array( "contenido" => $contenido ) );
	}


	public function preguntasAction()
	{
		//// prguntas frecuentes
		$categoria = "3" ;

		$em = $this->getDoctrine()->getManager();
		$contenido = $em->getRepository('SelnetTiendaOnlineBundle:Contenido')->findBy(array(  "categoria" => $categoria ));
		return $this->render('AppShopThemeBundle:Paginas:preguntas.html.twig' , array( "preguntas" => $contenido ) );
	}





}
