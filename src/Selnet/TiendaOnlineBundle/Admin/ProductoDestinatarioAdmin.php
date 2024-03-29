<?php

namespace Selnet\TiendaOnlineBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class ProductoDestinatarioAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('nombre')
            ->add('descripcion')
            ->add('borrado')
            ->add('created_at')
            ->add('updated_at')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            // ->add('id')
            ->add('nombre')
            ->add('descripcion')
                ->add('borrado', 'choice', array(
            'choices' => array(
                '0' => 'No',
                '1' => 'Si'
                )
            ))

            ->add('created_at')
            // ->add('updated_at')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ))
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            // ->add('id')
            ->add('nombre')
            ->add('descripcion')
                ->add('borrado', 'choice', array(
            'choices' => array(
                '0' => 'No',
                '1' => 'Si'
                )
            ))

            // ->add('created_at')
            // ->add('updated_at')
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            // ->add('id')
            ->add('nombre')
            // ->add('descripcion')
            ->add('borrado')
            ->add('created_at')
            // ->add('updated_at')
        ;
    }
}
