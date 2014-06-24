<?php

namespace ImieNetwork\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Utilisateur
 * @ORM\Entity(repositoryClass="ImieNetwork\SiteBundle\Repository\UtilisateurRepository")
 * @ORM\Table()
 */
class  Utilisateur
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
     * @ORM\ManyToOne(targetEntity="Ville", inversedBy="mon_utilisateur")
     * @ORM\JoinColumn(name="utilisateur_id", referencedColumnName="id")
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
     * @var \ImieNetwork\SiteBundle\Entity\Experience
     * @ORM\OneToMany(targetEntity="Experience", mappedBy="experience")
     */
    private $mes_experiences;
   
    /**
     *
     * @var \ImieNetwork\SiteBundle\Entity\Utilisateurpropriete
     * @ORM\OneToMany(targetEntity="Utilisateurpropriete", mappedBy="utilisateur")
     */
    private $mes_proprietes_utilisateur;
    
    /**
     *
     * @var \ImieNetwork\SiteBundel\Entity\Document
     * @ORM\OneToMany(targetEntity="Document", mappedBy="utilisateur") 
     */
    private $mes_documents;
    
    /**
     *
     * @var \ImieNetwork\SiteBundle\Entity\Conversation
     * @ORM\OneToMany(targetEntity="Conversation", mappedBy="utilisateur")
     */
    private $mes_conversations;
    
    /**
     *
     * @var \ImieNetwork\SiteBundle\Entity\Evenementutilisateur
     * @ORM\OneToMany(targetEntity="Evenementutilisateur", mappedBy="utilisateur")
     */
    private $mes_evenements;
    
    /**
     *
     * @var \ImieNetwork\SiteBundle\Entity\Evenement
     * @ORM\OneToMany(targetEntity="Evenement", mappedBy="utilisateurs")
     */
    private $mes_utilisateurs;
    
    /**
     *
     * @var \ImieNetwork\SiteBundle\Entity\Evenement
     * @ORM\OneToMany(targetEntity="Evenement", mappedBy="auteur")
     */
    private $mon_auteur;
    
    /**
     *
     * @var \ImieNetwork\SiteBundle\Entity\Message
     * @ORM\OneToMany(targetEntity="Message", mappedBy="utilisateur")
     */
    private $mes_messages;
    
    /**
     *
     * @var \ImieNetwork\SiteBundle\Entity\Secteuractivite;
     * @ORM\OneToMany(targetEntity="Secteuractivite", mappedBy="utilisateur")
     */
    private $mon_secteur_activite;
    
    /**
     *
     * @var \ImieNetwork\SiteBundle\Entity\Promotion;
     * @ORM\OneToMany(targetEntity="Promotion", mappedBy="utilisateur")
     */
    private $ma_promotion;
    
    /**
     * 
     * @return nom prenom
     */
    public function __toString()
    {
        return $this->nom.' '.$this->prenom;
    }
}
