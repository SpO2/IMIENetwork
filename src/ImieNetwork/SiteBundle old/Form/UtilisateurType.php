<?php

namespace ImieNetwork\SiteBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UtilisateurType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom', null, array('attr' => array('class'=>'form-control')))
            ->add('prenom', null, array('attr' => array('class'=>'form-control')))
            ->add('adresse', null, array('attr' => array('class'=>'form-control')))
            ->add('telephone', null, array('attr' => array('class'=>'form-control')))
            ->add('statut', null, array('attr' => array('class'=>'form-control')))
            ->add('login', null, array('attr' => array('class'=>'form-control')))
            ->add('pass', 'repeated', array('attr' => array('class'=>'form-control'),
                                                                                        'type' => 'password',
                                                                                        'options' => array('required' => true),
                                                                                        'first_options'  => array('label' => 'Mot de passe'),
                                                                                        'second_options' => array('label'=>'Confirmation')))
            ->add('email', null, array('attr' => array('class'=>'form-control')))
            //->add('datecreation', 'date')
            //->add('datemodification', 'date')
            //->add('langue', null, array('attr' => array('class'=>'form-control')))
           ->add('idville', 'entity', array('class' => 'ImieNetworkSiteBundle:Ville',
                                                           'property' => 'libelle',
                                                           'mapped' => true,
                                                           'label' => 'Ville'))
           // ->add('idville', null, array('attr' => array('class'=>'form-control')))
        ;
    }
    
    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ImieNetwork\SiteBundle\Entity\Utilisateur'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'imienetwork_sitebundle_utilisateur';
    }
}
