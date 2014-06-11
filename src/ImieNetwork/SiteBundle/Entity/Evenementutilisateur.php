<?php

namespace ImieNetwork\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evenementutilisateur
 *@ORM\Entity(repositoryClass="ImieNetwork\SiteBundle\Repository\EvenementutilisateurRepository") 
 */class  Evenementutilisateur
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var boolean
     */
    private $participe;

    /**
     * @var \ImieNetwork\SiteBundle\Entity\Utilisateur
     */
    private $idutilisateur;

    /**
     * @var \ImieNetwork\SiteBundle\Entity\Evenement
     */
    private $idevenement;


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
     * Set participe
     *
     * @param boolean $participe
     * @return Evenementutilisateur
     */
    public function setParticipe($participe)
    {
        $this->participe = $participe;

        return $this;
    }

    /**
     * Get participe
     *
     * @return boolean 
     */
    public function getParticipe()
    {
        return $this->participe;
    }

    /**
     * Set idutilisateur
     *
     * @param \ImieNetwork\SiteBundle\Entity\Utilisateur $idutilisateur
     * @return Evenementutilisateur
     */
    public function setIdutilisateur(\ImieNetwork\SiteBundle\Entity\Utilisateur $idutilisateur = null)
    {
        $this->idutilisateur = $idutilisateur;

        return $this;
    }

    /**
     * Get idutilisateur
     *
     * @return \ImieNetwork\SiteBundle\Entity\Utilisateur 
     */
    public function getIdutilisateur()
    {
        return $this->idutilisateur;
    }

    /**
     * Set idevenement
     *
     * @param \ImieNetwork\SiteBundle\Entity\Evenement $idevenement
     * @return Evenementutilisateur
     */
    public function setIdevenement(\ImieNetwork\SiteBundle\Entity\Evenement $idevenement = null)
    {
        $this->idevenement = $idevenement;

        return $this;
    }

    /**
     * Get idevenement
     *
     * @return \ImieNetwork\SiteBundle\Entity\Evenement 
     */
    public function getIdevenement()
    {
        return $this->idevenement;
    }
}
