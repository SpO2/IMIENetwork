<?php

namespace ImieNetwork\SiteBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class ExperienceAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('libelle')
            ->add('datedebut', null, array('label' => 'Expérience début ' , 'required' => false))
            ->add('datefin', null, array('label' => 'Expérience fin ' , 'required' => false))
            ->add('description')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id')
            ->add('libelle')
            ->add('datedebut', null, array('label' => 'Expérience début ' , 'required' => false))
            ->add('datefin', null, array('label' => 'Expérience fin ' , 'required' => false))
            ->add('description')
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
            ->add('id', 'sonata_type_model_hidden')
            ->add('libelle')
           ->add('datedebut', null, array('label' => 'Expérience début ' , 'required' => false))
            ->add('datefin', null, array('label' => 'Expérience fin ' , 'required' => false))
            ->add('description')
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('libelle')
            ->add('datedebut', null, array('label' => 'Expérience début ' , 'required' => false))
            ->add('datefin', null, array('label' => 'Expérience fin ' , 'required' => false))
            ->add('description')
        ;
    }
}
