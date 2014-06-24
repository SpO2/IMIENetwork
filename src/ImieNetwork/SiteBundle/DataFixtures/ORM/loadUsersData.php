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
        
        
        $eleveGroup = new Groupe();
        
        
        $entrepriseGroup = new Groupe();
    } 
   
}