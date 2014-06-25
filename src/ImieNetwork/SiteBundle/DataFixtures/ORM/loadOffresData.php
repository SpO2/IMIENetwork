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
use ImieNetwork\SiteBundle\Entity\Offre;



class LoadOffresData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
       foreach($this->createOffres() as $entity)
       {
           $manager->persist($entity);
           $manager->flush();
       }
    }  
    public function createOffres()
    {
        $entities = Array();       
        /*
        for ($i = 0; $i <= 10; $i++) {
            $offre = new Offre();
            $offre->setDatedebut(new \DateTime("2015-".$i."-01 14:00"));
            $offre->setDatefin(new \DateTime("2015-".$i."-01 14:00"));
            $offre->setDetailcontact('Contact mail@test.tst');
            $offre->setDuree(10);
            $offre->setTitre('Offre N°'.$i);
            $offre->setIdtypecontrat($this->getReference('typeContrat1'));
            $offre->setDescription('Offre '.$i.' created from DataFixtures');
            $this->addReference('offre'.$i, $offre);
            $entities[] = $offre;
        }*/
        return $entities;
    }
    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 4;
    }
}