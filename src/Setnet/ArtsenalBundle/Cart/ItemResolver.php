<?php 

namespace Setnet\ArtsenalBundle\Cart;

use Sylius\Bundle\CartBundle\Model\CartItemInterface;
use Sylius\Bundle\CartBundle\Resolver\ItemResolverInterface;
use Symfony\Component\HttpFoundation\Request;

class ItemResolver implements ItemResolverInterface
{
   

  private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

  

    	 public function resolve(CartItemInterface $item, Request $request)
    {
        $productId = $request->query->get('productId');

        // If no product id given, or product not found, we throw exception with nice message.
        if (!$productId || !$product = $this->getProductRepository()->find($productId)) {
            throw new ItemResolvingException('Requested product was not found');
        }

        // Assign the product to the item and define the unit price.
        $item->setProduct($product);
        $item->setUnitPrice($product->getCantidad());

        // Everything went fine, return the item.
        return $item;
    }


    private function getProductRepository()
    {
        return $this->entityManager->getRepository('SetnetArtsenalBundle:ArtProducto');
    }


}