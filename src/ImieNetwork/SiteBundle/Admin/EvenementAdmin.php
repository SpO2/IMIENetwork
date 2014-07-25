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
            ->add('libelle')
            ->add('datedebut', 'doctrine_orm_date')
            ->add('datemodification')
            ->add('datefin')
            ->add('statut', null, array('label' => 'Actif'))
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
            ->add('description')
            ->add('datedebut')
            ->add('datemodification')
            ->add('datefin')
            ->add('statut')
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
            ->add('auteur', 'sonata_type_model')
            ->add('libelle')
            ->add('description','textarea')
            ->add('datedebut','date', array('label'=>'Date de début de l\'évènement'))
            ->add('datefin', 'date', array('label'=>'Date de fin de l\'évènement'))
            ->add('statut', 'checkbox', array('label'=>'Actif'))
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
            ->add('description')
            ->add('datedebut')
            ->add('datemodification')
            ->add('datefin')
            ->add('statut')
        ;
    }
}
