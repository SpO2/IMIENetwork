<?php

namespace ImieNetwork\SiteBundle\Repository;

use Doctrine\ORM\EntityRepository;
use ImieNetwork\SiteBundle\Entity\Utilisateur;
use ImieNetwork\SiteBundle\Entity\Groupe as Groupe;
use ImieNetwork\SiteBundle\Entity\Groupeutilisateur;

/**
 * UtilisateurRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UtilisateurRepository extends EntityRepository
{
    
#---------------------------------------------------------------------------------------------------
#          Récupère le(s) groupe(s) d'une entité utilisateur.
#--------------------------------------------------------------------------------------------------- 
    public function getGroupeUtilisateur(Utilisateur $utilisateur)
    {
        $em = $this->_em;
        
        $groupeutilisateurentites = $em->getRepository('ImieNetworkSiteBundle:Groupeutilisateur')->findOneBy(array('idutilisateur'=>$utilisateur));
        if(isset($groupeutilisateurentites))
       {
            $groupeentities = $em->getRepository('ImieNetworkSiteBundle:Groupe')->find($groupeutilisateurentites->getIdgroupe()->getId());
            return $groupeentities;
       }
       else 
       {
           return null;
       }
    }
            
    public function Test()
    {
        
    }
}
