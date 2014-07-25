<?php

namespace ImieNetwork\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class OffreType extends AbstractType
{
        /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titre', 'text', array('label' => "Titre de l'offre"))
            ->add('description', 'textarea', array('label' => 'Description'))
            ->add('detailcontact', 'textarea', array('label' => 'Information sur la personne à contacter'))
            ->add('duree', 'integer', array('label' => 'Durée du contrat en mois'))
            ->add('typeposte', 'text', array('label' => 'Type de poste'))
            //->add('datedebut', 'date', array('label' => 'Date du début du contrat'))
            //->add('datefin', 'date', array('label' => 'Date de fin du contrat'))
            ->add('typecontrat', 'entity', array('class' => 'ImieNetworkSiteBundle:Typecontrat','property' => 'libelle', 'label' => 'Type de contrat'))
            ->add('ville')
            //->add('idcompetence')
            ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ImieNetwork\SiteBundle\Entity\Offre'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'imienetwork_sitebundle_offre';
    }
}
