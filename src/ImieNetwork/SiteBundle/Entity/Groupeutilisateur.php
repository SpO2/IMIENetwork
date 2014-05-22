<?php

namespace ImieNetwork\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Groupeutilisateur
 */
class Groupeutilisateur
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
     * @var \ImieNetwork\SiteBundle\Entity\Groupe
     */
    private $idgroupe;


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
     * @return Groupeutilisateur
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
     * Set idgroupe
     *
     * @param \ImieNetwork\SiteBundle\Entity\Groupe $idgroupe
     * @return Groupeutilisateur
     */
    public function setIdgroupe(\ImieNetwork\SiteBundle\Entity\Groupe $idgroupe = null)
    {
        $this->idgroupe = $idgroupe;

        return $this;
    }

    /**
     * Get idgroupe
     *
     * @return \ImieNetwork\SiteBundle\Entity\Groupe 
     */
    public function getIdgroupe()
    {
        return $this->idgroupe;
    }
}
