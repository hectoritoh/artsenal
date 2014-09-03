<?php

namespace Selnet\TiendaOnlineBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class TiendaAdmin extends Admin
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
            ->add('titulo')
            ->add('mensaje')
            ->add('anuncio')
            ->add('mensajeBienvenida')
            ->add('politicaPagos')
            ->add('politicaReembolso')
            ->add('informacionAdicional')
            ->add('informacionVendedor')
            ->add('borrado')
            ->add('verificado')
            ->add('tipo_cuenta')
            ->add('estado')
            ->add('created_at')
            ->add('updated_at')
            ->add('usuario')
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
            ->add('descripcion')
            ->add('titulo')
            ->add('mensaje')
            ->add('anuncio')
            ->add('mensajeBienvenida')
            ->add('politicaPagos')
            ->add('politicaReembolso')
            ->add('informacionAdicional')
            ->add('informacionVendedor')
            ->add('borrado')
            ->add('verificado')
            ->add('tipo_cuenta')
            ->add('estado')
            ->add('created_at')
            ->add('updated_at')
            ->add('usuario')
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
            ->add('id')
            ->add('nombre')
            ->add('descripcion')
            ->add('titulo')
            ->add('mensaje')
            ->add('anuncio')
            ->add('mensajeBienvenida')
            ->add('politicaPagos')
            ->add('politicaReembolso')
            ->add('informacionAdicional')
            ->add('informacionVendedor')
            ->add('borrado')
            ->add('verificado')
            ->add('tipo_cuenta')
            ->add('estado')
            ->add('created_at')
            ->add('updated_at')
            ->add('usuario')
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('nombre')
            ->add('descripcion')
            ->add('titulo')
            ->add('mensaje')
            ->add('anuncio')
            ->add('mensajeBienvenida')
            ->add('politicaPagos')
            ->add('politicaReembolso')
            ->add('informacionAdicional')
            ->add('informacionVendedor')
            ->add('borrado')
            ->add('verificado')
            ->add('tipo_cuenta')
            ->add('estado')
            ->add('created_at')
            ->add('updated_at')
            ->add('usuario')
        ;
    }
}
