<?php

namespace ImieNetwork\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Utilisateurpromotion
 */
/**
 * @ORM\Entity(repositoryClass="ImieNetwork\SiteBundle\Entity\UtilisateurpromotionRepository")
 */

class Utilisateurpromotion
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \ImieNetwork\SiteBundle\Entity\Utilisateur
     */
    private $idutilisateur;

    /**
     * @var \ImieNetwork\SiteBundle\Entity\Promotion
     */
    private $idpromotion;


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
     * Set idutilisateur
     *
     * @param \ImieNetwork\SiteBundle\Entity\Utilisateur $idutilisateur
     * @return Utilisateurpromotion
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
     * Set idpromotion
     *
     * @param \ImieNetwork\SiteBundle\Entity\Promotion $idpromotion
     * @return Utilisateurpromotion
     */
    public function setIdpromotion(\ImieNetwork\SiteBundle\Entity\Promotion $idpromotion = null)
    {
        $this->idpromotion = $idpromotion;

        return $this;
    }

    /**
     * Get idpromotion
     *
     * @return \ImieNetwork\SiteBundle\Entity\Promotion 
     */
    public function getIdpromotion()
    {
        return $this->idpromotion;
    }
}
