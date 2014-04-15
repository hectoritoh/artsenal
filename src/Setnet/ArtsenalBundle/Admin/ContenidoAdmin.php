<?php

namespace Setnet\ArtsenalBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;

class ContenidoAdmin extends Admin {

    protected function configureFormFields(FormMapper $formMapper) {
        $formMapper
                ->add('categoria', "choice" , array(
                    "choices" => array(
                        "about" => "Quienes Somos" ,
                        "politicas" => "Politicas" ,
                        "preguntas" => "Preguntas frecuentes" ,
                        )
                ))
                ->add('titulo')
                ->add('contenido')
                ->add('orden')
                ->add('estado' , "choice" , array(
                    "choices" => array(
                        "S" => "Publicado" ,
                        "N" => "No publicado" 
                        ))
                ) 
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
                ->add('categoria') 
                ->add('estado') 
        ;
    }

    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
        ->addIdentifier('id')
        ->add('getCategoriaNombre', 'string', array('label' => 'Categoria'))
        ->add('contenido')
        ->add('titulo')
        ->add('orden')
        ->add('getEstadoNombre', 'string', array('label' => 'Estado'))
        ->add('created')
        ->add('updated');
    }
 
}

?>
