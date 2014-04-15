<?php

namespace Setnet\ArtsenalBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper; 

class RolAdmin extends Admin {




    protected function configureFormFields(FormMapper $formMapper) {
        $formMapper
                ->add('nombre');
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper) {
        
    }

    protected function configureListFields(ListMapper $listMapper) {
        $listMapper
                ->addIdentifier('nombre');                 
    }
 

}

?>
