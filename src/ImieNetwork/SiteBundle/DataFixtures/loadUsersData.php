<?php
namespace ImieNetwork\SiteBundle\DataFixtures\ORM;
/**
 * Description of loadUserData
 *
 * @author damien
 */

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use ImieNetwork\SiteBundle\Entity\Utilisateur;
use ImieNetwork\SiteBundle\Entity\Groupe;
use ImieNetwork\SiteBundle\Entity\GroupeUtilisateur;

class LoadUserData implements FixtureInterface
{
    private $adminGroup;
    private $eleveGroup;
    private $entrepriseGroup;
    
    public function load(ObjectManager $manager)
    {
       
    }
    public function createUsersGroups()
    {
        $adminGroup = new Groupe();
        $adminGroup->setLibelle('Administration');
        
        $eleveGroup = new Groupe();
        $eleveGroup->setLibelle('Eleve');
        
        $entrepriseGroup = new Groupe();
        $entrepriseGroup->setLibelle('Entreprise');
    } 
    public function createUsers()
    {
        //admin Users
        for ($i = 1; $i <= 10; $i++) {
            $user = new Utilisateur();
            $user->setNom('UserName'.$i);
            $user->setAdresse('Adresse '.$i);
        }
    }
   
}