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
use ImieNetwork\SiteBundle\Entity\Evenement;

class LoadEventData extends AbstractFixture implements OrderedFixtureInterface
{
    public $event1;
    public $event2;
    public function load(ObjectManager $manager)
    {
       foreach($this->createEvents() as $entity)
       {
           $manager->persist($entity);
           $manager->flush();
       }
    }
    public function createEvents()
    {
        
        $this->event1 = new Evenement();
        $this->event1->setDatedebut(new \DateTime("2014-10-08 10:00"));
        $this->event1->setDatefin(new \DateTime("2014-10-08 14:00"));
        $this->event1->setDatemodification(new \DateTime('NOW'));
        $this->event1->setStatut(1);
        $this->event1->setLibelle('Event 1');
        $this->event1->setDescription('Event 1 created from DataFixtures');
        $this->addReference('event1', $this->event1);
        
        $this->event2 = new Evenement();
        $this->event2->setDatedebut(new \DateTime("2014-11-08 10:00"));
        $this->event2->setDatefin(new \DateTime("2014-11-08 14:00"));
        $this->event2->setStatut(1);
        $this->event2->setDatemodification(new \DateTime('NOW'));
        $this->event2->setLibelle('Event 2');
        $this->event2->setDescription('Event 2 created from DataFixtures');
        $this->addReference('event2', $this->event2);
        
        $entities = Array();
        $entities[] = $this->event1;
        $entities[] = $this->event2;
        
        for ($i = 3; $i <= 10; $i++) {
           $event = new Evenement();
           $event->setDatedebut(new \DateTime("2015-".$i."-01 10:00"));
            $event->setDatefin(new \DateTime("2015-".$i."-01 14:00"));
            $event->setStatut(1);
            $event->setDatemodification(new \DateTime('NOW'));
            $event->setLibelle('Event '.$i);
            $event->setDescription('Event '.$i.' created from DataFixtures');
            $this->addReference('Event'.$i, $event);
            $entities[] =$event;
        }
        return $entities;

    } 
    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 2;
    }
   
}