<?php

namespace ImieNetwork\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Utilisateuractivite
 * @ORM\Entity(repositoryClass="ImieNetwork\SiteBundle\Repository\UtilisateuractiviteRepository")
 * @ORM\Table()
 */
class  Utilisateuractivite
{
    /**
     * @var integer
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \ImieNetwork\SiteBundle\Entity\Utilisateur
     */
    private $idutilisateur;

    /**
     * @var \ImieNetwork\SiteBundle\Entity\Secteuractivite
     */
    private $idactivite;
    
    

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
     * @return Utilisateuractivite
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
     * Set idactivite
     *
     * @param \ImieNetwork\SiteBundle\Entity\Secteuractivite $idactivite
     * @return Utilisateuractivite
     */
    public function setIdactivite(\ImieNetwork\SiteBundle\Entity\Secteuractivite $idactivite = null)
    {
        $this->idactivite = $idactivite;

        return $this;
    }

    /**
     * Get idactivite
     *
     * @return \ImieNetwork\SiteBundle\Entity\Secteuractivite 
     */
    public function getIdactivite()
    {
        return $this->idactivite;
    }
}
