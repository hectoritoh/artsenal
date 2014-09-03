<?php

namespace Selnet\TiendaOnlineBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Validator\ErrorElement;

class ContenidoAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('categoria', 'choice', array(
            'choices' => array(
                '1' => 'Comprar',
                '2' => 'Vender',
                '3' => 'Preguntas frecuentes',
                '4' => 'Quienes Somos', 
                '5' => 'Politicas'
                )
            ))
        ->add('titulo', 'text')

    //  
         ->add('contenido', 'sonata_formatter_type', array(
        
        'format_field'   => 'contentFormatter',
        'source_field'   => 'rawContent',
        'source_field_options'      => array(
            'attr' => array('class' => 'span10', 'rows' => 20)
        ),
        'listener'       => false,
        'target_field'   => 'content'
    ))
        
        ->add('publicado', 'choice', array(
            'choices' => array(
                '1' => 'Si',
                '0' => 'No'
                )
            ));
    }
    
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('titulo')
        ->add('categoria')
        ->add('publicado');
    }
    
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('titulo')
        
        ->add('categoria', 'choice', array(
            'choices' => array(
                '1' => 'Comprar',
                '2' => 'Vender',
                '3' => 'Preguntas frecuentes',
                '4' => 'Quienes Somos', 
                '5' => 'Politicas'
                )
            ))
        ->add('publicado', 'choice', array(
            'choices' => array(
                '1' => 'Si',
                '0' => 'No'
                )));
    }
    
}