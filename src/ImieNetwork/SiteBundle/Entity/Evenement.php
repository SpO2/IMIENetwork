<?php

namespace ImieNetwork\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evenement
 * @ORM\Entity(repositoryClass="ImieNetwork\SiteBundle\Repository\EvenementRepository")
 * @ORM\Table()
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
     * @ORM\Column(type="string")
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
     * @var integer
     * @ORM\Column(type="integer")
     */
    private $statut;

    /**
     * @var \ImieNetwork\SiteBundle\Entity\Utilisateur
     * @ORM\ManyToOne(targetEntity="Utilisateur", inversedBy="mes_utilisateurs")
     * @ORM\JoinColumn(name="evenement_id", referencedColumnName="id")
     */
    private $utilisateurs;

    /**
     * @var \ImieNetwork\SiteBundle\Entity\Utilisateur
     * @ORM\ManyToOne(targetEntity="Utilisateur", inversedBy="mon_auteur")
     * @ORM\JoinColumn(name="evenement_id", referencedColumnName="id")
     */
    private $auteur;
    
    /**
     *
     * @var \ImieNetwork\SiteBundle\Entity\Evenementutilisateur
     * @ORM\OneToMany(targetEntity="EvenementUtilisateur", mappedBy="evenement")
     */
    private $mes_evenements;
    
    /**
     * 
     * @return libelle
     */
    public function __toString()
    {
        return $this->libelle;
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
     * @param integer $statut
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
     * @return integer 
     */
    public function getStatut()
    {
        return $this->statut;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->mes_evenements = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set utilisateurs
     *
     * @param \ImieNetwork\SiteBundle\Entity\Utilisateur $utilisateurs
     * @return Evenement
     */
    public function setUtilisateurs(\ImieNetwork\SiteBundle\Entity\Utilisateur $utilisateurs = null)
    {
        $this->utilisateurs = $utilisateurs;

        return $this;
    }

    /**
     * Get utilisateurs
     *
     * @return \ImieNetwork\SiteBundle\Entity\Utilisateur 
     */
    public function getUtilisateurs()
    {
        return $this->utilisateurs;
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
     * Add mes_evenements
     *
     * @param \ImieNetwork\SiteBundle\Entity\EvenementUtilisateur $mesEvenements
     * @return Evenement
     */
    public function addMesEvenement(\ImieNetwork\SiteBundle\Entity\EvenementUtilisateur $mesEvenements)
    {
        $this->mes_evenements[] = $mesEvenements;

        return $this;
    }

    /**
     * Remove mes_evenements
     *
     * @param \ImieNetwork\SiteBundle\Entity\EvenementUtilisateur $mesEvenements
     */
    public function removeMesEvenement(\ImieNetwork\SiteBundle\Entity\EvenementUtilisateur $mesEvenements)
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
}
