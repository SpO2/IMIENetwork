<?php

namespace ImieNetwork\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ville
 * @ORM\Entity(repositoryClass="ImieNetwork\SiteBundle\Repository\VilleRepository")
 * @ORM\Table()
 */
class  Ville
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
     * @ORM\Column(type="string", nullable=false)
     */
    private $codepostal;
    
    /**
     *
     * @var \ImieNetwork\SiteBundle\Entity\Utilisateur
     * @ORM\OneToMany(targetEntity="Utilisateur", mappedBy="ville")
     */
    private $mon_utilisateur;

    /**
     * 
     * @return code postal libelle
     */
    public function __toString()
    {
        return $this->codepostal.' '.$this->libelle;
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
     * @return Ville
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
     * Set codepostal
     *
     * @param string $codepostal
     * @return Ville
     */
    public function setCodepostal($codepostal)
    {
        $this->codepostal = $codepostal;

        return $this;
    }

    /**
     * Get codepostal
     *
     * @return string 
     */
    public function getCodepostal()
    {
        return $this->codepostal;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->mon_utilisateur = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add mon_utilisateur
     *
     * @param \ImieNetwork\SiteBundle\Entity\Utilisateur $monUtilisateur
     * @return Ville
     */
    public function addMonUtilisateur(\ImieNetwork\SiteBundle\Entity\Utilisateur $monUtilisateur)
    {
        $this->mon_utilisateur[] = $monUtilisateur;

        return $this;
    }

    /**
     * Remove mon_utilisateur
     *
     * @param \ImieNetwork\SiteBundle\Entity\Utilisateur $monUtilisateur
     */
    public function removeMonUtilisateur(\ImieNetwork\SiteBundle\Entity\Utilisateur $monUtilisateur)
    {
        $this->mon_utilisateur->removeElement($monUtilisateur);
    }

    /**
     * Get mon_utilisateur
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMonUtilisateur()
    {
        return $this->mon_utilisateur;
    }
}
