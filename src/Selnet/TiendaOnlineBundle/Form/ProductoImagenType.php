<?php

namespace Selnet\TiendaOnlineBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProductoImagenType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('file', 'file')
            ->add('borrado')
            ->add('created_at')
            ->add('updated_at')
            ->add('producto')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Selnet\TiendaOnlineBundle\Entity\ProductoImagen'
        ));
    }

    public function getName()
    {
        return 'selnet_tiendaonlinebundle_productoimagentype';
    }
}
