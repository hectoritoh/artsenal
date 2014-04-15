<?php

namespace Selnet\TiendaOnlineBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UsuarioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username')            
            ->add('email')         
            ->add('password') 
            ->add('nombres')
            ->add('apellidos')
            ->add('sexo')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Selnet\TiendaOnlineBundle\Entity\Usuario'
        ));
    }

    public function getName()
    {
        return 'selnet_tiendaonlinebundle_usuariotype';
    }
}
