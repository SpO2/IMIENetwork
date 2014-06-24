<?php

namespace ImieNetwork\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Utilisateur
 * @ORM\Entity(repositoryClass="ImieNetwork\SiteBundle\Repository\UtilisateurRepository")
 * @ORM\Table()
 */class  Utilisateur
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
     * @ORM\Column(type="string")
     */
    private $nom;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $prenom;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $adresse;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $telephone;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetimetz", nullable=false)
     */
    private $date_creation;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetimetz", nullable=false)
     */
    private $date_modification;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $langue;

    /**
     * @var \ImieNetwork\SiteBundle\Entity\Ville
     * @ORM\ManyToOne(targetEntity="Ville")
     */
    private $ville;
    
    /**
     * @var \ImieNetwork\SiteBundle\Entity\Groupe
     * @ORM\ManyToMany(targetEntity="Groupe")
     */
    private $groupes;
    
    /**
     *
     * @var array of \ImieNetwork\SiteBundle\Entity\Utilisateurcompetence
     * @ORM\OneToMany(targetEntity="Utilisateurcompetence", mappedBy="utilisateur")
     */
    private $mes_competences;
    
    /**
     * 
     * @return nom prenom
     */
    public function __toString()
    {
        return $this->nom.' '.$this->prenom;
    }
}
