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
use ImieNetwork\SiteBundle\Entity\Competence;
use ImieNetwork\SiteBundle\Entity\Typecontrat;
use ImieNetwork\SiteBundle\Entity\Ville;
use ImieNetwork\SiteBundle\Entity\SecteurActivite;


class LoadFixedTables extends AbstractFixture implements OrderedFixtureInterface
{
    public $competence1;
    public $competence2;
    public $competence3;
    
    public $typeContrat1;
    public $typeContrat2;
    public $typeContrat3;
    
    public $ville1;
    public $ville2;
    public $ville3;
    
    public $secteurActivite1;
    public $secteurActivite2;
    public $secteurActivite3;
    
    public function load(ObjectManager $manager)
    {       
       foreach($this->createCompetences() as $entity)
       {
           $manager->persist($entity);
           $manager->flush();
       }
       
       foreach($this->createTypeContrat() as $entity)
       {
           $manager->persist($entity);
           $manager->flush();
       }
       
       foreach($this->createVille() as $entity)
       {
           $manager->persist($entity);
           $manager->flush();
       }     
       
    }
    public function createCompetences()
    {
        $this->competence1 = new Competence();
        $this->competence1->setLibelle('Java');
        
        $this->competence2 = new Competence();
        $this->competence2->setLibelle('c#');
        
        $this->competence3 = new Competence();
        $this->competence3->setLibelle('Php');
        
        $entities = Array();
        $entities[] = $this->competence1;
        $entities[] = $this->competence2;
        $entities[] = $this->competence3;
        
        return $entities;
    } 
    public function createTypeContrat()
    {
        $this->typeContrat1 = new Typecontrat();
        $this->typeContrat1->setLibelle('CDI');
        $this->addReference('typeContrat1', $this->typeContrat1);
        
        $this->typeContrat2 = new Typecontrat();
        $this->typeContrat2->setLibelle('CDD');
        $this->addReference('typeContrat2', $this->typeContrat2);
        
        $this->typeContrat3 = new Typecontrat();
        $this->typeContrat3->setLibelle('Chinois dans une cave');
        $this->addReference('typeContrat3', $this->typeContrat3);
        
        $entities = Array();
        $entities[] = $this->typeContrat1;
        $entities[] = $this->typeContrat2;
        $entities[] = $this->typeContrat3;
        
        return $entities;
    }
    
    public function createVille()
    {
        $this->ville1 = new Ville();
        $this->ville1->setCodepostal('35000');
        $this->ville1->setLibelle('Rennes');
        $this->addReference('ville1', $this->ville1);
        
        $this->ville2 = new Ville();
        $this->ville2->setCodepostal('75000');
        $this->ville2->setLibelle('Rennes');
        $this->addReference('ville2', $this->ville2);
        
        $this->ville3 = new Ville();
        $this->ville3->setCodepostal('12345');
        $this->ville3->setLibelle('FakeVille');      
        $this->addReference('ville3', $this->ville3);
        
        $entities = Array();
        $entities[] = $this->ville1;
        $entities[] = $this->ville2;
        $entities[] = $this->ville3;
        
        return $entities;
    }
    
    public function createSecteurActivite()
    {
        $this->secteurActivite1 = new SecteurActivite();
        $this->secteurActivite1->setLibelle('Developpement Web');
        $this->addReference('secteurActivite1', $this->secteurActivite1);
        
        $this->secteurActivite2 = new SecteurActivite();
        $this->secteurActivite2->setLibelle('Developpement Mobile');
        $this->addReference('secteurActivite2', $this->secteurActivite2);
        
        $this->secteurActivite3 = new SecteurActivite();
        $this->secteurActivite3->setLibelle('Developpement Applications');
        $this->addReference('secteurActivite3', $this->secteurActivite3);
        
        $entities = Array();
        $entities[] = $this->secteurActivite1;
        $entities[] = $this->secteurActivite2;
        $entities[] = $this->secteurActivite3;
        
        return $entities;
    }
    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1;
    }
   
}