<?php

namespace Setnet\ArtsenalBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ProductoType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {

        $builder->add("titulo", "text");
        $builder->add("descripcion", "textarea");
        $builder->add("idSubcategoria", "entity", array(
            'label' => 'Subcategoria',
            'class' => 'SetnetArtsenalBundle:ArtSubcategoria',
            'query_builder' => function($repository) {
                return $repository->createQueryBuilder('p')->orderBy('p.id', 'ASC');
            },
            'property' => 'nombre',
        ));
        $builder->add("cantidad", "number");
        $builder->add("precio", "money");
        $builder->add("tipoElaboracion", "text");
        $builder->add("paisOrigen", "number");
        $builder->add('imagenes', 'collection', array('type' => new ProductoFotoType(), 'required' => false  ));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver) {
        $resolver->setDefaults(array(
            'data_class' => '\Setnet\ArtsenalBundle\Entity\ArtProducto',
        ));
    }

    public function getName() {
        return 'Producto';
    }

}