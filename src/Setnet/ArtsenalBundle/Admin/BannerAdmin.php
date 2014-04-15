<?php

namespace Setnet\ArtsenalBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper; 

class BannerAdmin extends Admin {




    protected function configureFormFields(FormMapper $formMapper) {
        $formMapper
                ->add('file', 'file')                
                ->add('link')
                ->add('descripcion')                                
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        $datagridMapper
               
                ->add('link')
                ->add('descripcion')
                ->add('estado') 
        ;
    }

    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
                ->addIdentifier('id')
                ->add('imagenUrl','string', array('template' => 'SonataMediaBundle:MediaAdmin:list_image.html.twig'))
                ->add('link')
                ->add('descripcion')
                ->add('estado')
                ->add('fechaCreacion');
    }

    public function prePersist($banner) {
        $banner->setFechaCreacion(new \DateTime()); 
        $banner->setEstado("P");         
        $this->saveFile($banner);
    }

    public function preUpdate($banner) {
        $this->saveFile($banner);
    }

    public function saveFile($banner) {
        $basepath = $this->getRequest()->getBasePath();
        echo $basepath; 
        $banner->upload($basepath);
    }

}

?>
