<?php

namespace ImieNetwork\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Offre
 *@ORM\Entity(repositoryClass="ImieNetwork\SiteBundle\Repository\OffreRepository")
 */
class  Offre
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
    private $titre;

    /**
     * @var string
     * @ORM\Column(type="text", nullable=false)
     */
    private $description;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $detailcontact;

    /**
     * @var integer
     * @ORM\Column(type="integer")
     */
    private $duree;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $type_poste;
    
     /**
     * @var \ImieNetwork\SiteBundle\Entity\Typecontrat
     * @ORM\ManyToOne(targetEntity="Typecontrat")
     */
    private $type_contrat;

    /**
     * @var \DateTime
     */
    private $datedebut;
    
    /**
     * @var \DateTime
     */
    private $datefin;
    /**
     * @var \DateTime
     */
    private $datemodification;

    /**
     * @var \DateTime
     */
    private $datefinpublication;

    /**
     * @var \ImieNetwork\SiteBundle\Entity\Utilisateur
     * @ORM\ManyToOne(targetEntity="Utilisateur", inversedBy="mes_offres")
     */
    private $utilisateur;

    /**
     * 
     * @return titre
     */
    public function __toString()
    {
        return $this->titre;
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
     * Set titre
     *
     * @param string $titre
     * @return Offre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Offre
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
     * Set detailcontact
     *
     * @param string $detailcontact
     * @return Offre
     */
    public function setDetailcontact($detailcontact)
    {
        $this->detailcontact = $detailcontact;

        return $this;
    }

    /**
     * Get detailcontact
     *
     * @return string 
     */
    public function getDetailcontact()
    {
        return $this->detailcontact;
    }

    /**
     * Set duree
     *
     * @param integer $duree
     * @return Offre
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * Get duree
     *
     * @return integer 
     */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * Set type_poste
     *
     * @param string $typePoste
     * @return Offre
     */
    public function setTypePoste($typePoste)
    {
        $this->type_poste = $typePoste;

        return $this;
    }

    /**
     * Get type_poste
     *
     * @return string 
     */
    public function getTypePoste()
    {
        return $this->type_poste;
    }

    /**
     * Set type_contrat
     *
     * @param \ImieNetwork\SiteBundle\Entity\Typecontrat $typeContrat
     * @return Offre
     */
    public function setTypeContrat(\ImieNetwork\SiteBundle\Entity\Typecontrat $typeContrat = null)
    {
        $this->type_contrat = $typeContrat;

        return $this;
    }

    /**
     * Get type_contrat
     *
     * @return \ImieNetwork\SiteBundle\Entity\Typecontrat 
     */
    public function getTypeContrat()
    {
        return $this->type_contrat;
    }

    /**
     * Set utilisateur
     *
     * @param \ImieNetwork\SiteBundle\Entity\Utilisateur $utilisateur
     * @return Offre
     */
    public function setUtilisateur(\ImieNetwork\SiteBundle\Entity\Utilisateur $utilisateur = null)
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * Get utilisateur
     *
     * @return \ImieNetwork\SiteBundle\Entity\Utilisateur 
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }
}
