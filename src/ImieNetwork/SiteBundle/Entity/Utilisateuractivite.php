<?php

namespace ImieNetwork\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Utilisateuractivite
 * @ORM\Entity(repositoryClass="ImieNetwork\SiteBundle\Repository\UtilisateuractiviteRepository")
 * @ORM\Table()
 */
class  Utilisateuractivite
{
    /**
     * @var integer
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \ImieNetwork\SiteBundle\Entity\Utilisateur
     */
    private $idutilisateur;

    /**
     * @var \ImieNetwork\SiteBundle\Entity\Secteuractivite
     */
    private $idactivite;
    
    
}
