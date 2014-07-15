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
     * @ORM\Column(type="string", nullable=false)
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
     * @ORM\Column(type="string", nullable=true)
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
     * @ORM\OneToMany(targetEntity="Experience", mappedBy="utilisateur")
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
     * @var ArrayCollection \ImieNetwork\SiteBundel\Entity\Offre
     * @ORM\OneToMany(targetEntity="Offre", mappedBy="utilisateur") 
     */
    private $mes_offres;
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
     * @ORM\OneToMany(targetEntity="Evenementutilisateur", mappedBy="utilisateur", cascade={"persist"})
     */
    private $participations_evenements;
    
      
    /**
     *
     * @var \ImieNetwork\SiteBundle\Entity\Message
     * @ORM\OneToMany(targetEntity="Message", mappedBy="utilisateur")
     */
    private $mes_messages;
   
    /**
     * @var ArrayCollection \ImieNetwork\SiteBundle\Entity\Secteuractivite;
     * 
     * @ORM\ManyToMany(targetEntity="Secteuractivite")
     * @ORM\JoinTable(name="utilisateur_secteuractivite",
     *      joinColumns={@ORM\JoinColumn(name="utilisateur_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="secteuractivite_id", referencedColumnName="id")}
     *      )
     **/
    private $mes_secteurs_activite;
    
    /**
     *
     * @var \ImieNetwork\SiteBundle\Entity\Promotion;
     * @ORM\ManyToMany(targetEntity="Promotion", mappedBy="utilisateur")
     * 
     */
    private $mes_promotion;
    
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
     * Add mes_offres
     *
     * @param \ImieNetwork\SiteBundle\Entity\Offre $mesOffres
     * @return Utilisateur
     */
    public function addMesOffre(\ImieNetwork\SiteBundle\Entity\Offre $mesOffres)
    {
        $this->mes_offres[] = $mesOffres;

        return $this;
    }

    /**
     * Remove mes_offres
     *
     * @param \ImieNetwork\SiteBundle\Entity\Offre $mesOffres
     */
    public function removeMesOffre(\ImieNetwork\SiteBundle\Entity\Offre $mesOffres)
    {
        $this->mes_offres->removeElement($mesOffres);
    }

    /**
     * Get mes_offres
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMesOffres()
    {
        return $this->mes_offres;
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
     * Add participations_evenements
     *
     * @param \ImieNetwork\SiteBundle\Entity\Evenementutilisateur $participationsEvenements
     * @return Utilisateur
     */
    public function addParticipationsEvenement(\ImieNetwork\SiteBundle\Entity\Evenementutilisateur $participationsEvenements)
    {
        $this->participations_evenements[] = $participationsEvenements;

        return $this;
    }

    /**
     * Remove participations_evenements
     *
     * @param \ImieNetwork\SiteBundle\Entity\Evenementutilisateur $participationsEvenements
     */
    public function removeParticipationsEvenement(\ImieNetwork\SiteBundle\Entity\Evenementutilisateur $participationsEvenements)
    {
        $this->participations_evenements->removeElement($participationsEvenements);
    }

    /**
     * Get participations_evenements
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getParticipationsEvenements()
    {
        return $this->participations_evenements;
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
     * Add mes_secteurs_activite
     *
     * @param \ImieNetwork\SiteBundle\Entity\Secteuractivite $mesSecteursActivite
     * @return Utilisateur
     */
    public function addMesSecteursActivite(\ImieNetwork\SiteBundle\Entity\Secteuractivite $mesSecteursActivite)
    {
        $this->mes_secteurs_activite[] = $mesSecteursActivite;

        return $this;
    }

    /**
     * Remove mes_secteurs_activite
     *
     * @param \ImieNetwork\SiteBundle\Entity\Secteuractivite $mesSecteursActivite
     */
    public function removeMesSecteursActivite(\ImieNetwork\SiteBundle\Entity\Secteuractivite $mesSecteursActivite)
    {
        $this->mes_secteurs_activite->removeElement($mesSecteursActivite);
    }

    /**
     * Get mes_secteurs_activite
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMesSecteursActivite()
    {
        return $this->mes_secteurs_activite;
    }

    /**
     * Add mes_promotion
     *
     * @param \ImieNetwork\SiteBundle\Entity\Promotion $mesPromotion
     * @return Utilisateur
     */
    public function addMesPromotion(\ImieNetwork\SiteBundle\Entity\Promotion $mesPromotion)
    {
        $this->mes_promotion[] = $mesPromotion;

        return $this;
    }

    /**
     * Remove mes_promotion
     *
     * @param \ImieNetwork\SiteBundle\Entity\Promotion $mesPromotion
     */
    public function removeMesPromotion(\ImieNetwork\SiteBundle\Entity\Promotion $mesPromotion)
    {
        $this->mes_promotion->removeElement($mesPromotion);
    }

    /**
     * Get mes_promotion
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMesPromotion()
    {
        return $this->mes_promotion;
    }
    
     /*---------------------------------------------
                Methodes supplémentaires
     ---------------------------------------------*/
    
    /*
     * @param \ImieNetwork\SiteBundle\Entity\Evenement $event
     * @param \Boolean $participe
     * 
     * IMPORTANT: IL FAUT PERSISTER L ENTITE DE RETOUR
     * @return \ImieNetwork\SiteBundle\Entity\Evenementutilisateur
     */
    public function setParticipationEvenement(\ImieNetwork\SiteBundle\Entity\Evenement $event, $participe)
    {
        $participationEvenement = new \ImieNetwork\SiteBundle\Entity\Evenementutilisateur();
        $participationEvenement->setEvenement($event);
        $participationEvenement->setUtilisateur($this);
        $participationEvenement->setParticipe($participe);        
        $this->addParticipationsEvenement($participationEvenement);
        
        return $participationEvenement;
    }

}
