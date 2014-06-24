<?php

namespace ImieNetwork\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evenementutilisateur
 * @ORM\Entity(repositoryClass="ImieNetwork\SiteBundle\Repository\EvenementutilisateurRepository")
 * @ORM\Table()
 */
class  Evenementutilisateur
{
    /**
     * @var integer
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var boolean
     * @ORM\Column(type="boolean")
     */
    private $participe;

    /**
     * @var \ImieNetwork\SiteBundle\Entity\Utilisateur
     * @ORM\ManyToOne(targetEntity="Utilisateur", inversedBy="mes_evenements")
     * @ORM\JoinColumn(name="evenementutilisateur_id", referencedColumnName="id")
     */
    private $utilisateur;

    /**
     * @var \ImieNetwork\SiteBundle\Entity\Evenement
     * @ORM\ManyToOne(targetEntity="Evenement", inversedBy="mes_evenements")
     * @ORM\JoinColumn(name="evenementutilisateur_id", referencedColumnName="id")
     */
    private $evenement;
    
    /**
     * 
     * @return participe
     */
    public function __toString()
    {
        return $this->participe;
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
     * Set utilisateur
     *
     * @param \ImieNetwork\SiteBundle\Entity\Utilisateur $utilisateur
     * @return Evenementutilisateur
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
