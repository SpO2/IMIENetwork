<?php
namespace ImieNetwork\SiteBundle\DataFixtures\ORM;
/**
 * Description of loadUserData
 *
 * @author damien
 */

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use ImieNetwork\SiteBundle\Entity\Utilisateur;
use ImieNetwork\SiteBundle\Entity\Groupe;
use ImieNetwork\SiteBundle\Entity\Proprieteetendue;
use ImieNetwork\SiteBundle\Entity\Groupepropriete;


class LoadUserData extends AbstractFixture implements OrderedFixtureInterface
{
    private $adminGroup;
    private $eleveGroup;
    private $entrepriseGroup;
    
    public function load(ObjectManager $manager)
    {
       foreach($this->createUsersGroups() as $entity)
       {
           $manager->persist($entity);
           $manager->flush();
       }
       foreach($this->createAdminsUsers() as $entity)
       {
           $manager->persist($entity);
           $manager->flush();
       }
       foreach($this->createElevesUsers($manager) as $entity)
       {
           $manager->persist($entity);
           $manager->flush();
       }
    }
    public function createUsersGroups()
    {
        $entities = Array();
        $this->adminGroup = new Groupe();
        $this->adminGroup->setLibelle('Administration');
        
        $this->eleveGroup = new Groupe();
        $this->eleveGroup->setLibelle('Eleve');
        
        $this->entrepriseGroup = new Groupe();
        $this->entrepriseGroup->setLibelle('Entreprise');
        
        $proprieteRole = new Proprieteetendue();
        $proprieteRole->setLibelle('Role');
        $groupePropriete = new Groupepropriete();
        $groupePropriete->setPropriete($proprieteRole)->setValeur('Admin');
        
        $this->adminGroup->addProprietesGroupe($groupePropriete);
        
       
        $entities[] =$proprieteRole;
        $entities[] =$groupePropriete;
         
        $entities[] = $this->adminGroup;
        $entities[] = $this->eleveGroup;
        $entities[] = $this->entrepriseGroup;
        
        return $entities;
    } 
    public function createAdminsUsers()
    {
        //admin Users
        $entities = Array();
        for ($i = 1; $i <= 10; $i++) {
            $user = new Utilisateur();
            $user->setNom('NomAdmin'.$i);
            $user->setPrenom('PrenomAdmin'.$i);
            $user->setAdresse($i.'rue des administrateurs');
            $user->setDateCreation(new \DateTime('NOW'));
            $user->setDateModification(new \DateTime('NOW'));            
            $user->setTelephone('0201010101');
            $user->setUsername('Admin'.$i);
            $user->setEmail('emailAdmin'.$i.'@domain.com');
            $user->setPlainPassword('password');
            //$user->setPassword('3NCRYPT3D-V3R51ON');
            $user->setEnabled(true);
            $user->setRoles(array('ROLE_ADMIN'));
            $user->addGroupe($this->adminGroup);
            $this->addReference('admin'.$i, $user);
            $entities[] = $user;
        }
        return $entities;
    }
    public function createElevesUsers($manager)
    {
        $entities = Array();
        for ($i = 1; $i <= 10; $i++) {
            $user = new Utilisateur();
            $user->setNom('NomEleve'.$i);
            $user->setPrenom('Toto'.$i);
            $user->setAdresse($i.'rue des elèves');
            $user->setDateCreation(new \DateTime('NOW'));
            $user->setDateModification(new \DateTime('NOW'));
            $user->setTelephone('0201010101');            
            
            $participation = $user->setParticipationEvenement($this->getReference('event1'),true);
            $entities[] = $participation;
            
            
            //User FOSUserBundle
            $user->setUsername('Eleve'.$i);
            $user->setEmail('emailEleve'.$i.'@domain.com');
            $user->setPlainPassword('password');            
            //$user->setPassword('3NCRYPT3D-V3R51ON');
            $user->setEnabled(true);
            $user->setRoles(array('ROLE_ELEVE'));
            $user->addGroupe($this->eleveGroup);
            $this->addReference('eleve'.$i, $user);
            // $entities[] = $user;
             
             $manager->persist($user);
           $manager->flush();
        }
        return $entities;
    }
    public function createEntrepriseUsers()
    {
        $entities = Array();
        for ($i = 1; $i <= 10; $i++) {
            $user = new Utilisateur();
            $user->setNom('UserEntreprise'.$i);
            $user->setPrenom('Corporation'.$i);
            $user->setAdresse($i.'rue des entreprises');
            $user->setDateCreation(new \DateTime('NOW'));
            $user->setDateModification(new \DateTime('NOW'));
            $user->setTelephone('0201010101');
            
            //User FOSUserBundle
            $user->setUsername('Entreprise'.$i);
            $user->setEmail('emailEntreprise'.$i.'@domain.com');
            $user->setPlainPassword('password');            
            //$user->setPassword('3NCRYPT3D-V3R51ON');
            $user->setEnabled(true);
            $user->setRoles(array('ROLE_ENTREPRISE'));
            $user->addGroupe($this->entrepriseGroup);
            $this->addReference('entreprise'.$i, $user);
            $entities[] = $user;
        }
        return $entities;
    }
    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 3;
    }
   
}