<?php

namespace ImieNetwork\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Secteuractivite
 * @ORM\Entity(repositoryClass="ImieNetwork\SiteBundle\Repository\SecteuractiviteRepository")
 * @ORM\Table()
 */
class  Secteuractivite
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
     * @var \ImieNetwork\SiteBundle\Entity\Utilisateur
     * @ORM\ManyToOne(targetEntity="Utilisateur", inversedBy="mon_secteur_activite")
     * @ORM\JoinColumn(name="secteuractivite_id", referencedColumnName="id")
     */
    private $utilisateur;
    
    /**
     * 
     * @return libelle
     */
    public function __toString()
    {
        return $this->libelle;
    }

}
