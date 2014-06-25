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
            ->add('libelle', null, array('label' => 'Titre'))
            ->add('date_debut', 'doctrine_orm_date', array('label' => 'Expérience début'), 'date')
            ->add('date_fin', 'doctrine_orm_date', array('label' => 'Expérience fin'), 'date')
            ->add('description','doctrine_orm_string', array(), 'textarea')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id')
            ->add('libelle', null, array('label' => 'Titre'))
            ->add('date_debut', 'date', array('label' => 'Expérience début'))
            ->add('date_fin', 'date', array('label' => 'Expérience fin'))
            ->add('description','textarea')
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
            //->add('id')
            ->add('libelle', null, array('label' => 'Titre'))
           ->add('date_debut', 'date', array('label' => 'Expérience début'))
            ->add('date_fin', 'date', array('label' => 'Expérience fin'))
            //->add('description','textarea')
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
            ->add('date_debut', 'date', array('label' => 'Expérience début'))
            ->add('date_fin', 'date', array('label' => 'Expérience fin'))
            ->add('description', 'textarea')
        ;
    }
}
