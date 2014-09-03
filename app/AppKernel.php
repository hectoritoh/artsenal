<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{


    public function init()
    {
        bcscale(3); // or any other value greater than 0
    }


    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),
            new Selnet\TiendaOnlineBundle\SelnetTiendaOnlineBundle(),
            new JMS\SerializerBundle\JMSSerializerBundle(),



            new FOS\UserBundle\FOSUserBundle(),

            new Knp\Bundle\MenuBundle\KnpMenuBundle(),

                        // Add your dependencies
            new Sonata\CoreBundle\SonataCoreBundle(),
            new Sonata\BlockBundle\SonataBlockBundle(),
            new Sonata\DoctrineORMAdminBundle\SonataDoctrineORMAdminBundle(),
            new Sonata\EasyExtendsBundle\SonataEasyExtendsBundle(),
            new Sonata\MarkItUpBundle\SonataMarkItUpBundle(),
            new Ivory\CKEditorBundle\IvoryCKEditorBundle(),
            new Sonata\NewsBundle\SonataNewsBundle(),
            new Sonata\IntlBundle\SonataIntlBundle(),
            new Sonata\FormatterBundle\SonataFormatterBundle(),
            new Knp\Bundle\MarkdownBundle\KnpMarkdownBundle(),
            new Sonata\ClassificationBundle\SonataClassificationBundle(),
            new Sonata\NotificationBundle\SonataNotificationBundle(),

            // sonata ecomerce

            new Sonata\CustomerBundle\SonataCustomerBundle(),
            new Sonata\ProductBundle\SonataProductBundle(),
            new Sonata\BasketBundle\SonataBasketBundle(),
            new Sonata\OrderBundle\SonataOrderBundle(),
            new Sonata\InvoiceBundle\SonataInvoiceBundle(),
            new Sonata\DeliveryBundle\SonataDeliveryBundle(),
            new Sonata\PaymentBundle\SonataPaymentBundle(),
            new Sonata\PriceBundle\SonataPriceBundle(),
            new Sonata\SeoBundle\SonataSeoBundle(),


            new Knp\Bundle\PaginatorBundle\KnpPaginatorBundle(),
            // Then add SonataAdminBundle
            new Sonata\AdminBundle\SonataAdminBundle(),
            new Sonata\UserBundle\SonataUserBundle('FOSUserBundle'),
            new Sonata\MediaBundle\SonataMediaBundle(),

            
            new HWI\Bundle\OAuthBundle\HWIOAuthBundle(),
            new Application\Sonata\NewsBundle\ApplicationSonataNewsBundle(),
            new Application\Sonata\UserBundle\ApplicationSonataUserBundle(),
            new Application\Sonata\MediaBundle\ApplicationSonataMediaBundle(),
            new Application\Sonata\ClassificationBundle\ApplicationSonataClassificationBundle(),


            new Application\Sonata\CustomerBundle\ApplicationSonataCustomerBundle(),
            new Application\Sonata\DeliveryBundle\ApplicationSonataDeliveryBundle(),
            new Application\Sonata\BasketBundle\ApplicationSonataBasketBundle(),
            new Application\Sonata\InvoiceBundle\ApplicationSonataInvoiceBundle(),
            new Application\Sonata\OrderBundle\ApplicationSonataOrderBundle(),
            new Application\Sonata\PaymentBundle\ApplicationSonataPaymentBundle(),
            new Application\Sonata\ProductBundle\ApplicationSonataProductBundle(),

            new Stof\DoctrineExtensionsBundle\StofDoctrineExtensionsBundle(),

            new Avalanche\Bundle\ImagineBundle\AvalancheImagineBundle(),

            new App\ShopThemeBundle\AppShopThemeBundle(),
            new FOS\JsRoutingBundle\FOSJsRoutingBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }
}
