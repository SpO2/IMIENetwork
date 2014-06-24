<?php

namespace ImieNetwork\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Competence
 * @ORM\Entity(repositoryClass="ImieNetwork\SiteBundle\Repository\CompetenceRepository")
 * @ORM\Table()
 **/
class  Competence
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
     * @ORM\Column(type="string", unique=true)
     */
    private $libelle;
    
    /**
     *
     * @var array of \ImieNetwork\SiteBundle\Entity\Utilisateur
     * @ORM\OneToMany(targetEntity="Utilisateurcompetence", mappedBy="competence")
     */
    private $utilisateurs;
    
    /**
     * 
     * @return libelle
     */
    public function __toString()
    {
        return $this->libelle;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->utilisateurs = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Competence
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
     * Add utilisateurs
     *
     * @param \ImieNetwork\SiteBundle\Entity\Utilisateurcompetence $utilisateurs
     * @return Competence
     */
    public function addUtilisateur(\ImieNetwork\SiteBundle\Entity\Utilisateurcompetence $utilisateurs)
    {
        $this->utilisateurs[] = $utilisateurs;

        return $this;
    }

    /**
     * Remove utilisateurs
     *
     * @param \ImieNetwork\SiteBundle\Entity\Utilisateurcompetence $utilisateurs
     */
    public function removeUtilisateur(\ImieNetwork\SiteBundle\Entity\Utilisateurcompetence $utilisateurs)
    {
        $this->utilisateurs->removeElement($utilisateurs);
    }

    /**
     * Get utilisateurs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUtilisateurs()
    {
        return $this->utilisateurs;
    }
}
