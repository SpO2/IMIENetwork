<?php

namespace ImieNetwork\SiteBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class OffreAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('titre')
            ->add('description', 'doctrine_orm_string', array(), 'textarea')
            ->add('detailcontact')
            ->add('duree')
            ->add('typeposte')
            ->add('datedebut','doctrine_orm_date', array('label' => 'Date de début de l\' offre'), 'date')
            ->add('datemodification','doctrine_orm_date', array('label' => 'Date de modification de l\' offre'), 'date')
            ->add('datefinpublication', 'doctrine_orm_date', array('label' => 'Date de fin de publication de l\' offre'), 'date')
            ->add('datefin', 'doctrine_orm_date', array('label' => 'Date de fin de l\' offre '), 'date')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('id')
            ->add('titre')
            ->add('description')
            ->add('detailcontact')
            ->add('duree')
            ->add('typeposte')
            ->add('datedebut', null, array('label' => 'Date de début de l\' offre ' , 'required' => false))
            ->add('datemodification',null, array('label' => 'Date de modification de l\' offre ' , 'required' => false))
            ->add('datefinpublication', null, array('label' => 'Date de fin de publication de l\' offre ' , 'required' => false))
            ->add('datefin', null, array('label' => 'Date de fin de l\' offre ' , 'required' => false))
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
            ->add('titre')
            ->add('description')
            ->add('detailcontact')
            ->add('duree')
            ->add('typeposte')
            //->add('datedebut', null, array('label' => 'Date de début de l\' offre ' , 'required' => false))
            ->add('datemodification',null, array('label' => 'Date de modification de l\' offre ' , 'required' => false))
            ->add('datefinpublication', null, array('label' => 'Date de fin de publication de l\' offre ' , 'required' => false))
            ->add('datefin', null, array('label' => 'Date de fin de l\' offre ' , 'required' => false))
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('titre')
            ->add('description')
            ->add('detailcontact')
            ->add('duree')
            ->add('typeposte')
            ->add('datedebut', null, array('label' => 'Date de début de l\' offre ' , 'required' => false))
            ->add('datemodification',null, array('label' => 'Date de modification de l\' offre ' , 'required' => false))
            ->add('datefinpublication', null, array('label' => 'Date de fin de publication de l\' offre ' , 'required' => false))
            ->add('datefin', null, array('label' => 'Date de fin de l\' offre ' , 'required' => false))
        ;
    }
}
