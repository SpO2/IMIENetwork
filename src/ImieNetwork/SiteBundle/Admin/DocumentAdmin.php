<?php

namespace ImieNetwork\SiteBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class DocumentAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('utilisateur')
            ->add('libelle', null, array('label' => 'Titre'))
            ->add('url', 'doctrine_orm_string', array(), 'url')
            ->add('statut', 'doctrine_orm_boolean', array('label' => 'Statut'), 'checkbox' )
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
            ->add('libelle', null, array('label' => 'Titre'))
            ->add('url','url')
            ->add('statut','boolean', array('label' => 'Actif '))
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
            //->add('id', 'sonata_type_model_hidden')
            ->add('utilisateur')
            ->add('libelle', null, array('label' => 'Titre'))
            ->add('url','url')
            ->add('statut', 'checkbox')
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
            ->add('libelle', null, array('label' => 'Titre'))
            ->add('url', 'url')
            ->add('statut','checkbox')
        ;
    }
}
