<?php

namespace ImieNetwork\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;

/**
 * Utilisateur
 * @ORM\Entity(repositoryClass="ImieNetwork\SiteBundle\Repository\UtilisateurRepository")
 * @ORM\Table()
 */
class  Utilisateur extends BaseUser
{
    /**
     * @var integer
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

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
     * @var \ImieNetwork\SiteBundle\Entity\Experience
     * @ORM\OneToMany(targetEntity="Experience", mappedBy="experience")
     */
    private $mes_experiences;
   
    /**
     *
     * @var \ImieNetwork\SiteBundle\Entity\Utilisateurpropriete
     * @ORM\OneToMany(targetEntity="Utilisateurpropriete", mappedBy="utilisateur")
     */
    private $utilisateur_proprietes;
    
    /**
     *
     * @var \ImieNetwork\SiteBundel\Entity\Document
     * @ORM\OneToMany(targetEntity="Document", mappedBy="utilisateur") 
     */
    private $mes_documents;
    
    /**
     *
     * @var \ImieNetwork\SiteBundle\Entity\Conversion
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
     * @return nom prenom
     */
    public function __toString()
    {
        return $this->nom.' '.$this->prenom;
    }

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

}
