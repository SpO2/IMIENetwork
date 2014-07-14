<?php

namespace ImieNetwork\SiteBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class EvenementAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('libelle', null, array('label' => 'Titre'))
            //->add('description', 'doctrine_orm_string', array(), 'textarea')
            ->add('datedebut', 'doctrine_orm_date', array('label' => 'Date de début de l\' évènement'), 'date')
            ->add('datemodification','doctrine_orm_date', array('label' => 'Date de modification de l\' évènement'), 'date')
            ->add('datefin', 'doctrine_orm_date', array('label' => 'Date de fin de l\' évènement'), 'date')
            ->add('statut','doctrine_orm_boolean', array('label' => 'Actif'), 'checkbox')
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
            ->add('description','text')
            ->add('datedebut', 'date', array('label' => 'Date de début de l\' évènement'))
            ->add('datemodification','date', array('label' => 'Date de modification de l\' évènement'))
            ->add('datefin', 'date', array('label' => 'Date de fin de l\' évènement'))
            ->add('statut','boolean', array('label' => 'Actif'))
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
            ->add('description','textarea')
            //->add('datedebut')
            //->add('datemodification')
            //->add('datefin')
            ->add('statut','checkbox', array('label' => 'Actif'))
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('libelle', null, array('label' => 'Titre'))
            ->add('description', 'textarea')
            ->add('datedebut', 'date', array('label' => 'Date de début de l\' évènement'))
            ->add('datemodification','date', array('label' => 'Date de modification de l\' évènement'))
            ->add('datefin', 'date', array('label' => 'Date de fin de l\' évènement'))
            ->add('statut','checkbox', array('label' => 'Actif'))
        ;
    }
}
