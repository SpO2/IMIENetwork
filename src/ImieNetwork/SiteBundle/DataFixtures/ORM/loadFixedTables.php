<?php
namespace ImieNetwork\SiteBundle\DataFixtures\ORM;
/**
 * Description of loadUserData
 *
 * @author damien
 */

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use ImieNetwork\SiteBundle\Entity\Offres;



class LoadUserData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
       
    }
    public function createOffres()
    {
        $event = new Offres();

    } 
   
}