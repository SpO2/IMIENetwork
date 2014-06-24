<?php

namespace ImieNetwork\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Utilisateurpromotion
 * @ORM\Entity(repositoryClass="ImieNetwork\SiteBundle\Repository\UtilisateurpromotionRepository")
 * @ORM\Table() 
 */
class  Utilisateurpromotion
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
     * @var \ImieNetwork\SiteBundle\Entity\Promotion
     */
    private $idpromotion;

}
