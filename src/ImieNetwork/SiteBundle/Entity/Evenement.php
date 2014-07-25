<?php

namespace ImieNetwork\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evenement
 * 
 * @ORM\Entity(repositoryClass="ImieNetwork\SiteBundle\Repository\EvenementRepository")
 * @ORM\HasLifecycleCallbacks
 */
class  Evenement
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
     * @ORM\Column(type="string", nullable=false)
     */
    private $libelle;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $description;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    private $datedebut;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    private $datemodification;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    private $datefin;

    /**
     * @var boolean
     * @ORM\Column(type="boolean")
     */
    private $statut;

    /**
     * @var \ImieNetwork\SiteBundle\Entity\Utilisateur
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     */
    private $auteur;
    
    /**
     *
     * @var \ImieNetwork\SiteBundle\Entity\Evenementutilisateur
     * @ORM\OneToMany(targetEntity="Evenementutilisateur", mappedBy="evenement")
     */
    private $evenement_utilisateurs;
    
    /**
     * 
     * @return libelle
     */
    public function __toString()
    {
        return $this->libelle;
    }

    public function __construct()
    {
        $this->evenement_utilisateurs = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set libelle
     *
     * @param string $libelle
     * @return Evenement
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string 
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Evenement
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set datedebut
     *
     * @param \DateTime $datedebut
     * @return Evenement
     */
    public function setDatedebut($datedebut)
    {
        $this->datedebut = $datedebut;

        return $this;
    }

    /**
     * Get datedebut
     *
     * @return \DateTime 
     */
    public function getDatedebut()
    {
        return $this->datedebut;
    }

    /**
     * Set datemodification
     *
     * @param \DateTime $datemodification
     * @return Evenement
     */
    public function setDatemodification($datemodification)
    {
        $this->datemodification = $datemodification;

        return $this;
    }

    /**
     * Get datemodification
     *
     * @return \DateTime 
     */
    public function getDatemodification()
    {
        return $this->datemodification;
    }

    /**
     * Set datefin
     *
     * @param \DateTime $datefin
     * @return Evenement
     */
    public function setDatefin($datefin)
    {
        $this->datefin = $datefin;

        return $this;
    }

    /**
     * Get datefin
     *
     * @return \DateTime 
     */
    public function getDatefin()
    {
        return $this->datefin;
    }

    /**
     * Set statut
     *
     * @param boolean $statut
     * @return Evenement
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return boolean 
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set auteur
     *
     * @param \ImieNetwork\SiteBundle\Entity\Utilisateur $auteur
     * @return Evenement
     */
    public function setAuteur(\ImieNetwork\SiteBundle\Entity\Utilisateur $auteur = null)
    {
        $this->auteur = $auteur;

        return $this;
    }

    /**
     * Get auteur
     *
     * @return \ImieNetwork\SiteBundle\Entity\Utilisateur 
     */
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * Add evenement_utilisateurs
     *
     * @param \ImieNetwork\SiteBundle\Entity\Evenementutilisateur $evenementUtilisateurs
     * @return Evenement
     */
    public function addEvenementUtilisateur(\ImieNetwork\SiteBundle\Entity\Evenementutilisateur $evenementUtilisateurs)
    {
        $this->evenement_utilisateurs[] = $evenementUtilisateurs;

        return $this;
    }

    /**
     * Remove evenement_utilisateurs
     *
     * @param \ImieNetwork\SiteBundle\Entity\Evenementutilisateur $evenementUtilisateurs
     */
    public function removeEvenementUtilisateur(\ImieNetwork\SiteBundle\Entity\Evenementutilisateur $evenementUtilisateurs)
    {
        $this->evenement_utilisateurs->removeElement($evenementUtilisateurs);
    }

    /**
     * Get evenement_utilisateurs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEvenementUtilisateurs()
    {
        return $this->evenement_utilisateurs;
    }
    
    
    /** @ORM\PrePersist */
    public function UpdateFunction()
    {
        $this->datemodification = new \DateTime('NOW');
    }
}
