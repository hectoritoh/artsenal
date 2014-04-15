<?php

namespace Setnet\ArtsenalBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ContenidoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('categoria')
            ->add('contenido')
            ->add('titulo')
            ->add('orden')
            ->add('estado')
            ->add('created')
            ->add('updated')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Setnet\ArtsenalBundle\Entity\Contenido'
        ));
    }

    public function getName()
    {
        return 'setnet_artsenalbundle_contenidotype';
    }
}
