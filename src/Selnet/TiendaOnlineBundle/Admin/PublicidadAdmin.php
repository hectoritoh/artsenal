<?php

namespace Selnet\TiendaOnlineBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class PublicidadAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            // ->add('id')
        ->add('nombre')
        ->add('url')
        ->add('borrado')
        ->add('tipo')
            // ->add('created_at')
            // ->add('updated_at')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
        ->add('id')
        ->add('nombre')
        ->add('url')
        ->add('borrado')
        ->add('tipo')
        ->add('created_at')
        ->add('updated_at')
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
        ->add('url')
        ->add('descripcion')

        ->add('borrado', 'choice', array(
            'choices' => array(
                '0' => 'No',
                '1' => 'Si'
                )
            ))


        ->add('tipo', 'choice', array(
            'choices' => array(
                '0' => 'lateral',
                '1' => 'bloque'
                )
            ))


        ->add('image', 'sonata_media_type', array(
           'provider' => 'sonata.media.provider.image',
           'context'  => 'publicidad'
           ));
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
            // ->add('url')
        ->add('borrado')
        ->add('tipo')
        ->add('created_at')
            // ->add('updated_at')
        ;
    }
}
