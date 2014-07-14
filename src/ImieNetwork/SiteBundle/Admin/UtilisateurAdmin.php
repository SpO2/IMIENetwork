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
            ->add('prenom',null, array('label' => 'Prénom'))
            ->add('adresse')
            ->add('telephone',null, array('label' => 'Téléphone'))
            ->add('username', null, array('label' => 'Identifiant'))
            ->add('password', null, array('label' => 'Mot de passe'))
            ->add('groupes')
            ->add('enabled','doctrine_orm_boolean', array('label' => 'Compte actif'), 'checkbox')
            ->add('email', 'doctrine_orm_string', array(), 'email')
            ->add('date_creation', 'doctrine_orm_date', array('label' => 'Date de création de l\' utilisateur'), 'date')
            ->add('date_modification', 'doctrine_orm_date', array('label' => 'Date de modification de l\' utilisateur'), 'date')
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
            ->add('prenom',null, array('label' => 'Prénom'))
            ->add('adresse')
            ->add('telephone',null, array('label' => 'Téléphone'))
            ->add('username', null, array('label' => 'Identifiant'))
            ->add('password', null, array('label' => 'Mot de passe'))
            ->add('groupes')
            ->add('enabled','checkbox', array('label' => 'Compte actif'))
            ->add('email', 'email')
            ->add('date_creation','date', array('label' => 'Date de création de l\' utilisateur'))
            ->add('date_modification', 'date', array('label' => 'Date de modification de l\' utilisateur'))
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
            //->add('id')
            ->add('nom')
            ->add('prenom',null, array('label' => 'Prénom'))
            ->add('adresse')
            ->add('telephone',null, array('label' => 'Téléphone'))
            ->add('username', null, array('label' => 'Identifiant'))
            ->add('password', null, array('label' => 'Mot de passe'))
            ->add('groupes', 'sonata_type_model', array('btn_add' => 'Ajouter'))
            ->add('enabled','checkbox', array('label' => 'Compte actif'))
            ->add('email', 'email')
            //->add('date_creation', 'date', array('label' => 'Date de création de l\' utilisateur'))
            //->add('date_modification', 'date', array('label' => 'Date de modification de l\' utilisateur'))
            ->add('langue')
            ->add('ville', 'sonata_type_model', array('btn_add' => 'Ajouter'))
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
            ->add('prenom',null, array('label' => 'Prénom'))
            ->add('adresse')
            ->add('telephone',null, array('label' => 'Téléphone'))
            ->add('username', null, array('label' => 'Identifiant'))
            ->add('password', null, array('label' => 'Mot de passe'))
            ->add('groupes')
            ->add('enabled','checkbox', array('label' => 'Compte actif'))
            ->add('email', 'email')
            ->add('date_creation', 'date', array('label' => 'Date de création de l\' utilisateur'))
            ->add('date_modification', 'date', array('label' => 'Date de modification de l\' utilisateur'))
            ->add('langue')
        ;
    }
}
