<?php 

namespace Selnet\TiendaOnlineBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Selnet\TiendaOnlineBundle\Helper\CartHelper;
use Selnet\TiendaOnlineBundle\Helper\TiendaCart;
use Selnet\TiendaOnlineBundle\Helper\TiendaCartItem;
use Selnet\TiendaOnlineBundle\Entity\Venta;
use Selnet\TiendaOnlineBundle\Entity\DetalleVenta;


class CartController extends Controller
{


	public function productoCartRowAction(  $id_producto )
	{
		$em = $this->getDoctrine()->getManager();
		$producto = $em->getRepository('SelnetTiendaOnlineBundle:Producto')->find(  $id_producto );

		return $this->render('SelnetTiendaOnlineBundle:Blocks:cart.producto.html.twig' , array("producto" => $producto ));
	}


	public function finalizarAction()
	{

		$em = $this->getDoctrine()->getManager();
		$usuario       = $this->get('security.context')->getToken()->getUser();

		$session = $this->get("session");
		$cart = CartHelper::getCurrentCart(  $session  );


		if (!$cart->estaVacio()) {
			

			$venta = new Venta(); 
			$venta->setTotal(   $cart->getTotal() ); 
			$venta->setUsuario(  $usuario );
			foreach ($cart->getItems() as $cartItem) {
				$detalleVenta = new DetalleVenta(); 
				$detalleVenta->setCantidad(   $cartItem->getCantidad() );
				$detalleVenta->setPrecio( $cartItem->getPrecio() );
				$producto = $em->getRepository('SelnetTiendaOnlineBundle:Producto')->find(  $cartItem->getProductoId() );
				$detalleVenta->setProducto( $producto  );
				$detalleVenta->setVenta( $venta  );
				$venta->getDetalles()->add(  $detalleVenta );
				$venta->setVerificada(0);
				$venta->setEstado(1);

			}

			$em->persist( $venta );
			$em->flush();

			CartHelper::destroyCart(  $session );

			return $this->render('SelnetTiendaOnlineBundle:Pages:cart.finalizar.html.twig' , array("venta" => $venta));
		}else{
			return $this->redirect($this->generateUrl('ver_mi_cesta'));
		}
	}

	public function showAction()
	{
		$em = $this->getDoctrine()->getManager();
		
		$session = $this->get("session");
		$cart = CartHelper::getCurrentCart(  $session  );


		$venta = new Venta(); 
		$venta->setTotal(   $cart->getTotal() ); 

		foreach ($cart->getItems() as $cartItem) {
			$detalleVenta = new DetalleVenta(); 
			$detalleVenta->setCantidad(   $cartItem->getCantidad() );
			$detalleVenta->setPrecio( $cartItem->getPrecio() );
			$producto = $em->getRepository('SelnetTiendaOnlineBundle:Producto')->find(  $cartItem->getProductoId() );
			$detalleVenta->setProducto( $producto  );
			$venta->getDetalles()->add(  $detalleVenta );

		}
		

		return $this->render('SelnetTiendaOnlineBundle:Pages:cart.html.twig' , 
			array(
				"venta" => $venta , "detalles" => $cart->getItems() ));

	}

	public function showTestAction()
	{
		$session = $this->get("session");
		$cart = CartHelper::destroyCart(  $session  );

		echo "<pre>";
		print_r($cart);
		echo "</pre>";
		die();
	}



	public function agregarProductoAction(  $id_producto , $cantidad , $precio  )
	{

		$session = $this->get("session");
		$cart = CartHelper::getCurrentCart(  $session  );

		$item = new TiendaCartItem();
		$item->setProductoId( $id_producto );
		$item->setCantidad($cantidad);
		$item->setPrecio($precio);

		$cart->addItem( $item );
		CartHelper::setCurrentCart( $session , $cart );
		$response = new Response(json_encode(array('response' => 'ok')));
		$response->headers->set('Content-Type', 'application/json');

		return $response;
	}


	public function removeProductoAction(  $id_producto   )
	{

		$session = $this->get("session");
		$cart = CartHelper::getCurrentCart(  $session  );

		$item = new TiendaCartItem();
		$item->setProductoId( $id_producto );


		$cart->removeItem( $item );
		CartHelper::setCurrentCart( $session , $cart );

		return $this->redirect($this->generateUrl('ver_mi_cesta'));


   //return $this->render('.html.twig');
	}
	public function updateProductoAction(  $id_producto  , $cantidad , $precio )
	{

		$session = $this->get("session");
		$cart = CartHelper::getCurrentCart(  $session  );

		$item = new TiendaCartItem();
		$item->setProductoId( $id_producto );
		$item->setCantidad($cantidad);
		$item->setPrecio($precio);


		$cart->updateItem( $item );
		CartHelper::setCurrentCart( $session , $cart );
		$response = new Response(json_encode(array('response' => 'ok')));
		$response->headers->set('Content-Type', 'application/json');

		return $response;


        //return $this->render('.html.twig');
	}

}

?>