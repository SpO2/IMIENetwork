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

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Utilisateur
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     * @return Utilisateur
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     * @return Utilisateur
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string 
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     * @return Utilisateur
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string 
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set date_creation
     *
     * @param \DateTime $dateCreation
     * @return Utilisateur
     */
    public function setDateCreation($dateCreation)
    {
        $this->date_creation = $dateCreation;

        return $this;
    }

    /**
     * Get date_creation
     *
     * @return \DateTime 
     */
    public function getDateCreation()
    {
        return $this->date_creation;
    }

    /**
     * Set date_modification
     *
     * @param \DateTime $dateModification
     * @return Utilisateur
     */
    public function setDateModification($dateModification)
    {
        $this->date_modification = $dateModification;

        return $this;
    }

    /**
     * Get date_modification
     *
     * @return \DateTime 
     */
    public function getDateModification()
    {
        return $this->date_modification;
    }

    /**
     * Set langue
     *
     * @param string $langue
     * @return Utilisateur
     */
    public function setLangue($langue)
    {
        $this->langue = $langue;

        return $this;
    }

    /**
     * Get langue
     *
     * @return string 
     */
    public function getLangue()
    {
        return $this->langue;
    }

    /**
     * Set ville
     *
     * @param \ImieNetwork\SiteBundle\Entity\Ville $ville
     * @return Utilisateur
     */
    public function setVille(\ImieNetwork\SiteBundle\Entity\Ville $ville = null)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return \ImieNetwork\SiteBundle\Entity\Ville 
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Add groupes
     *
     * @param \ImieNetwork\SiteBundle\Entity\Groupe $groupes
     * @return Utilisateur
     */
    public function addGroupe(\ImieNetwork\SiteBundle\Entity\Groupe $groupes)
    {
        $this->groupes[] = $groupes;

        return $this;
    }

    /**
     * Remove groupes
     *
     * @param \ImieNetwork\SiteBundle\Entity\Groupe $groupes
     */
    public function removeGroupe(\ImieNetwork\SiteBundle\Entity\Groupe $groupes)
    {
        $this->groupes->removeElement($groupes);
    }

    /**
     * Get groupes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getGroupes()
    {
        return $this->groupes;
    }

    /**
     * Add mes_competences
     *
     * @param \ImieNetwork\SiteBundle\Entity\Utilisateurcompetence $mesCompetences
     * @return Utilisateur
     */
    public function addMesCompetence(\ImieNetwork\SiteBundle\Entity\Utilisateurcompetence $mesCompetences)
    {
        $this->mes_competences[] = $mesCompetences;

        return $this;
    }

    /**
     * Remove mes_competences
     *
     * @param \ImieNetwork\SiteBundle\Entity\Utilisateurcompetence $mesCompetences
     */
    public function removeMesCompetence(\ImieNetwork\SiteBundle\Entity\Utilisateurcompetence $mesCompetences)
    {
        $this->mes_competences->removeElement($mesCompetences);
    }

    /**
     * Get mes_competences
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMesCompetences()
    {
        return $this->mes_competences;
    }

    /**
     * Add mes_experiences
     *
     * @param \ImieNetwork\SiteBundle\Entity\Experience $mesExperiences
     * @return Utilisateur
     */
    public function addMesExperience(\ImieNetwork\SiteBundle\Entity\Experience $mesExperiences)
    {
        $this->mes_experiences[] = $mesExperiences;

        return $this;
    }

    /**
     * Remove mes_experiences
     *
     * @param \ImieNetwork\SiteBundle\Entity\Experience $mesExperiences
     */
    public function removeMesExperience(\ImieNetwork\SiteBundle\Entity\Experience $mesExperiences)
    {
        $this->mes_experiences->removeElement($mesExperiences);
    }

    /**
     * Get mes_experiences
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMesExperiences()
    {
        return $this->mes_experiences;
    }

    /**
     * Add utilisateur_proprietes
     *
     * @param \ImieNetwork\SiteBundle\Entity\Utilisateurpropriete $utilisateurProprietes
     * @return Utilisateur
     */
    public function addUtilisateurPropriete(\ImieNetwork\SiteBundle\Entity\Utilisateurpropriete $utilisateurProprietes)
    {
        $this->utilisateur_proprietes[] = $utilisateurProprietes;

        return $this;
    }

    /**
     * Remove utilisateur_proprietes
     *
     * @param \ImieNetwork\SiteBundle\Entity\Utilisateurpropriete $utilisateurProprietes
     */
    public function removeUtilisateurPropriete(\ImieNetwork\SiteBundle\Entity\Utilisateurpropriete $utilisateurProprietes)
    {
        $this->utilisateur_proprietes->removeElement($utilisateurProprietes);
    }

    /**
     * Get utilisateur_proprietes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUtilisateurProprietes()
    {
        return $this->utilisateur_proprietes;
    }

    /**
     * Add mes_documents
     *
     * @param \ImieNetwork\SiteBundle\Entity\Document $mesDocuments
     * @return Utilisateur
     */
    public function addMesDocument(\ImieNetwork\SiteBundle\Entity\Document $mesDocuments)
    {
        $this->mes_documents[] = $mesDocuments;

        return $this;
    }

    /**
     * Remove mes_documents
     *
     * @param \ImieNetwork\SiteBundle\Entity\Document $mesDocuments
     */
    public function removeMesDocument(\ImieNetwork\SiteBundle\Entity\Document $mesDocuments)
    {
        $this->mes_documents->removeElement($mesDocuments);
    }

    /**
     * Get mes_documents
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMesDocuments()
    {
        return $this->mes_documents;
    }

    /**
     * Add mes_conversations
     *
     * @param \ImieNetwork\SiteBundle\Entity\Conversation $mesConversations
     * @return Utilisateur
     */
    public function addMesConversation(\ImieNetwork\SiteBundle\Entity\Conversation $mesConversations)
    {
        $this->mes_conversations[] = $mesConversations;

        return $this;
    }

    /**
     * Remove mes_conversations
     *
     * @param \ImieNetwork\SiteBundle\Entity\Conversation $mesConversations
     */
    public function removeMesConversation(\ImieNetwork\SiteBundle\Entity\Conversation $mesConversations)
    {
        $this->mes_conversations->removeElement($mesConversations);
    }

    /**
     * Get mes_conversations
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMesConversations()
    {
        return $this->mes_conversations;
    }

    /**
     * Add mes_evenements
     *
     * @param \ImieNetwork\SiteBundle\Entity\Evenementutilisateur $mesEvenements
     * @return Utilisateur
     */
    public function addMesEvenement(\ImieNetwork\SiteBundle\Entity\Evenementutilisateur $mesEvenements)
    {
        $this->mes_evenements[] = $mesEvenements;

        return $this;
    }

    /**
     * Remove mes_evenements
     *
     * @param \ImieNetwork\SiteBundle\Entity\Evenementutilisateur $mesEvenements
     */
    public function removeMesEvenement(\ImieNetwork\SiteBundle\Entity\Evenementutilisateur $mesEvenements)
    {
        $this->mes_evenements->removeElement($mesEvenements);
    }

    /**
     * Get mes_evenements
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMesEvenements()
    {
        return $this->mes_evenements;
    }
    

    /**
     * Add mes_proprietes_utilisateur
     *
     * @param \ImieNetwork\SiteBundle\Entity\Utilisateurpropriete $mesProprietesUtilisateur
     * @return Utilisateur
     */
    public function addMesProprietesUtilisateur(\ImieNetwork\SiteBundle\Entity\Utilisateurpropriete $mesProprietesUtilisateur)
    {
        $this->mes_proprietes_utilisateur[] = $mesProprietesUtilisateur;

        return $this;
    }

    /**
     * Remove mes_proprietes_utilisateur
     *
     * @param \ImieNetwork\SiteBundle\Entity\Utilisateurpropriete $mesProprietesUtilisateur
     */
    public function removeMesProprietesUtilisateur(\ImieNetwork\SiteBundle\Entity\Utilisateurpropriete $mesProprietesUtilisateur)
    {
        $this->mes_proprietes_utilisateur->removeElement($mesProprietesUtilisateur);
    }

    /**
     * Get mes_proprietes_utilisateur
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMesProprietesUtilisateur()
    {
        return $this->mes_proprietes_utilisateur;
    }

    /**
     * Add mes_utilisateurs
     *
     * @param \ImieNetwork\SiteBundle\Entity\Evenement $mesUtilisateurs
     * @return Utilisateur
     */
    public function addMesUtilisateur(\ImieNetwork\SiteBundle\Entity\Evenement $mesUtilisateurs)
    {
        $this->mes_utilisateurs[] = $mesUtilisateurs;

        return $this;
    }

    /**
     * Remove mes_utilisateurs
     *
     * @param \ImieNetwork\SiteBundle\Entity\Evenement $mesUtilisateurs
     */
    public function removeMesUtilisateur(\ImieNetwork\SiteBundle\Entity\Evenement $mesUtilisateurs)
    {
        $this->mes_utilisateurs->removeElement($mesUtilisateurs);
    }

    /**
     * Get mes_utilisateurs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMesUtilisateurs()
    {
        return $this->mes_utilisateurs;
    }

    /**
     * Add mon_auteur
     *
     * @param \ImieNetwork\SiteBundle\Entity\Evenement $monAuteur
     * @return Utilisateur
     */
    public function addMonAuteur(\ImieNetwork\SiteBundle\Entity\Evenement $monAuteur)
    {
        $this->mon_auteur[] = $monAuteur;

        return $this;
    }

    /**
     * Remove mon_auteur
     *
     * @param \ImieNetwork\SiteBundle\Entity\Evenement $monAuteur
     */
    public function removeMonAuteur(\ImieNetwork\SiteBundle\Entity\Evenement $monAuteur)
    {
        $this->mon_auteur->removeElement($monAuteur);
    }

    /**
     * Get mon_auteur
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMonAuteur()
    {
        return $this->mon_auteur;
    }

    /**
     * Add mes_messages
     *
     * @param \ImieNetwork\SiteBundle\Entity\Message $mesMessages
     * @return Utilisateur
     */
    public function addMesMessage(\ImieNetwork\SiteBundle\Entity\Message $mesMessages)
    {
        $this->mes_messages[] = $mesMessages;

        return $this;
    }

    /**
     * Remove mes_messages
     *
     * @param \ImieNetwork\SiteBundle\Entity\Message $mesMessages
     */
    public function removeMesMessage(\ImieNetwork\SiteBundle\Entity\Message $mesMessages)
    {
        $this->mes_messages->removeElement($mesMessages);
    }

    /**
     * Get mes_messages
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMesMessages()
    {
        return $this->mes_messages;
    }

    /**
     * Add mon_secteur_activite
     *
     * @param \ImieNetwork\SiteBundle\Entity\Secteuractivite $monSecteurActivite
     * @return Utilisateur
     */
    public function addMonSecteurActivite(\ImieNetwork\SiteBundle\Entity\Secteuractivite $monSecteurActivite)
    {
        $this->mon_secteur_activite[] = $monSecteurActivite;

        return $this;
    }

    /**
     * Remove mon_secteur_activite
     *
     * @param \ImieNetwork\SiteBundle\Entity\Secteuractivite $monSecteurActivite
     */
    public function removeMonSecteurActivite(\ImieNetwork\SiteBundle\Entity\Secteuractivite $monSecteurActivite)
    {
        $this->mon_secteur_activite->removeElement($monSecteurActivite);
    }

    /**
     * Get mon_secteur_activite
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMonSecteurActivite()
    {
        return $this->mon_secteur_activite;
    }

    /**
     * Add ma_promotion
     *
     * @param \ImieNetwork\SiteBundle\Entity\Promotion $maPromotion
     * @return Utilisateur
     */
    public function addMaPromotion(\ImieNetwork\SiteBundle\Entity\Promotion $maPromotion)
    {
        $this->ma_promotion[] = $maPromotion;

        return $this;
    }

    /**
     * Remove ma_promotion
     *
     * @param \ImieNetwork\SiteBundle\Entity\Promotion $maPromotion
     */
    public function removeMaPromotion(\ImieNetwork\SiteBundle\Entity\Promotion $maPromotion)
    {
        $this->ma_promotion->removeElement($maPromotion);
    }

    /**
     * Get ma_promotion
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMaPromotion()
    {
        return $this->ma_promotion;
    }
}
