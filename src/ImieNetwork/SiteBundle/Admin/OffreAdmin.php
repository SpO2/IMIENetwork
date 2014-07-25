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
            ->add('description')
            ->add('detailcontact')
            ->add('duree')
            ->add('type_poste')
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
            ->add('type_poste')
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
            ->add('utilisateur', 'sonata_type_model', array('label'=>'Créé par'))
            ->add('titre')
            ->add('detailcontact','text', array('label'=>'Détail du contact'))
            ->add('type_poste', 'text', array('label'=>'Type de poste'))
            ->add('type_contrat', 'sonata_type_model', array('label'=>'Type de contrat'))
            ->add('duree','text', array('label'=>'Durée du contrat'))
            ->add('description','textarea')
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
            ->add('type_poste')
        ;
    }
}
