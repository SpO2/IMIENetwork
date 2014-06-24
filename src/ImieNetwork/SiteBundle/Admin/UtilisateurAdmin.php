<?php

namespace ImieNetwork\SiteBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class UtilisateurAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('nom')
            ->add('prenom')
            ->add('adresse')
            ->add('telephone')
            ->add('statut')
            ->add('login')
            ->add('pass', null, array('label' => 'Mot de passe ' , 'required' => false))
            ->add('email')
            ->add('datecreation', null, array('label' => 'Date de création de l\' utilisateur ' , 'required' => false))
            ->add('datemodification', null, array('label' => 'Date de modification de l\' utilisateur ' , 'required' => false))
            ->add('langue')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id')
            ->add('nom')
            ->add('prenom')
            ->add('adresse')
            ->add('telephone')
            ->add('statut')
            ->add('login')
             ->add('pass', null, array('label' => 'Mot de passe ' , 'required' => false))
            ->add('email')
            ->add('datecreation', null, array('label' => 'Date de création de l\' utilisateur ' , 'required' => false))
            ->add('datemodification', null, array('label' => 'Date de modification de l\' utilisateur ' , 'required' => false))
            ->add('langue')
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
            ->add('nom')
            ->add('prenom')
            ->add('adresse')
            ->add('telephone')
            ->add('statut')
            ->add('login')
             ->add('pass', null, array('label' => 'Mot de passe ' , 'required' => false))
            ->add('email')
            //->add('datecreation', null, array('label' => 'Date de création de l\' utilisateur ' , 'required' => false))
            ->add('datemodification', null, array('label' => 'Date de modification de l\' utilisateur ' , 'required' => false))
            ->add('langue')
            ->add('idville' )
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('nom')
            ->add('prenom')
            ->add('adresse')
            ->add('telephone')
            ->add('statut')
            ->add('login')
             ->add('pass', null, array('label' => 'Mot de passe ' , 'required' => false))
            ->add('email')
            ->add('datecreation', null, array('label' => 'Date de création de l\' utilisateur ' , 'required' => false))
            ->add('datemodification', null, array('label' => 'Date de modification de l\' utilisateur ' , 'required' => false))
            ->add('langue')
        ;
    }
}
