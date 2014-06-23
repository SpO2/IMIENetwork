<?php

namespace ImieNetwork\SiteBundle\Manager;

use Doctrine\ORM\EntityManager;
use ImieNetwork\SiteBundle\Manager\BaseManager;
use ImieNetwork\SiteBundle\Entity\Utilisateur;
use ImieNetwork\SiteBundle\Repository\UtilisateurRepository;

class UtilisateurManager extends BaseManager{
    protected $em;

    public function __construct(EntityManager $em)
    {
        $this->em = $em;
    }
    public function saveUserGroup($utilisateur, $groupe)
    {
     echo '<h1>TEEEEEEEEEEEEEEEEEEEESSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSSST</H1>';
    }    
    /**
     * Get Repository
     *
     * @return \ImieNetwork\SiteBundle\Repository\UtilisateurRepository 
     */
    public function getRepository()
    {
        return $this->em->getRepository('ImieNetworkSiteBundle:Utilisateur');
    }
}
