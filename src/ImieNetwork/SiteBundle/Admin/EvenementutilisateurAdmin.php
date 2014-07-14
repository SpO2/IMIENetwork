<?php

namespace ImieNetwork\SiteBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class EvenementutilisateurAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('utilisateur')
            ->add('evenement', null, array('label' => 'Evènement'))
            ->add('participe', 'doctrine_orm_boolean', array(), 'checkbox')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id')
            ->add('utilisateur')
            ->add('evenement', null, array('label' => 'Evènement'))
            ->add('participe')
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
            ->add('utilisateur', 'sonata_type_model', array('btn_add' => 'Ajouter'))
            ->add('evenement', 'sonata_type_model', array('btn_add' => 'Ajouter', 'label' => 'Evènement'))
            ->add('participe')
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('utilisateur')
            ->add('evenement', null, array('label' => 'Evènement'))    
            ->add('participe')
        ;
    }
}
