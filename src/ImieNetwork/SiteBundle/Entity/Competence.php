<?php

namespace ImieNetwork\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Competence
 * @ORM\Entity(repositoryClass="ImieNetwork\SiteBundle\Repository\CompetenceRepository")
 * @ORM\Table()
 **/
 
 class  Competence
{
    /**
     * @var integer
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string", unique=true)
     */
    private $libelle;
    
    /**
     *
     * @var array of \ImieNetwork\SiteBundle\Entity\Utilisateur
     * @ORM\OneToMany(targetEntity="Utilisateurcompetence", mappedBy="competence")
     */
    private $utilisateurs;
    
    /**
     * 
     * @return libelle
     */
    public function __toString()
    {
        return $this->libelle;
    }
}
