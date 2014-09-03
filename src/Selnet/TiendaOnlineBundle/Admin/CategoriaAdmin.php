<?php

namespace Selnet\TiendaOnlineBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Validator\ErrorElement;

class CategoriaAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper->add('nombre')
        ->add('descripcion', 'textarea')
        // ->add('slug')
        ->add('borrado', 'choice', array(
            'choices' => array(
                '0' => 'No',
                '1' => 'Si'
            )
        ));
    }
    
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper->add('nombre')
        ->add('borrado');
    }
    
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('nombre')->add('descripcion')->add('borrado', 'choice', array(
            'choices' => array(
                '0' => 'No',
                '1' => 'Si'
            )
        ));
    }
    
}