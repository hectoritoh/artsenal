<?php

namespace Setnet\ArtsenalBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ArtTiendaTarjetaCreditoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $mes = array();
        for ($i = 1; $i < 13; $i++) {
            $mes[] = $i;
        }


        $anio = array();
        for ($i = 2013; $i < 2023; $i++) {
            $anio[] = $i;
        }


        $builder->add('tarjeta', 'choice', array(
                    "expanded" => true,
                    "choices" => array(
                        "visa" => "visa",
                        "master" => "MasterCard",
                        "amex" => "American",
                        "paypal" => "Paypal"
                    )
                ))
                ->add('numero_tarjeta', 'number')
                ->add('mes_expira', 'choice', array(
                    "label" => "fecha expiracion",
                    "choices" => $mes
                ))
                ->add('anio_expira', 'choice', array(
                    "choices" => $anio
                ))
                ->add('ccv', 'text')
                ->add('titular', 'text')
                ->add('telefono', 'number')
                ->add('pais')
                ->add('calle')
                ->add('direccionInfo')
                ->add('ciudad')
                ->add('estado')
                ->add('zip')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Setnet\ArtsenalBundle\Entity\ArtTiendaTarjetaCredito'
        ));
    }

    public function getName()
    {
        return 'setnet_artsenalbundle_arttiendatarjetacreditotype';
    }
}
