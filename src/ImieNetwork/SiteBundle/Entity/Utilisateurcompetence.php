<?php

namespace ImieNetwork\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Utilisateurcompetence
 * @ORM\Entity(repositoryClass="ImieNetwork\SiteBundle\Repository\UtilisateurcompetenceRepository")
 * @ORM\Table()
 */
class  Utilisateurcompetence
{
    /**
     * @var integer
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var integer
     * @ORM\Column(type="integer")
     */
    private $note;

    /**
     * @var \ImieNetwork\SiteBundle\Entity\Utilisateur
     * @ORM\ManyToOne(targetEntity="Utilisateur", inversedBy="mes_competences")
     */
    private $utilisateur;

    /**
     * @var \ImieNetwork\SiteBundle\Entity\Competence
     * @ORM\ManyToOne(targetEntity="Competence")
     */
    private $competence;
    
    /**
     * 
     * @return note
     */
    public function __toString()
    {
        return $this->note;
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
     * Set note
     *
     * @param integer $note
     * @return Utilisateurcompetence
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return integer 
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set utilisateur
     *
     * @param \ImieNetwork\SiteBundle\Entity\Utilisateur $utilisateur
     * @return Utilisateurcompetence
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

    /**
     * Set competence
     *
     * @param \ImieNetwork\SiteBundle\Entity\Competence $competence
     * @return Utilisateurcompetence
     */
    public function setCompetence(\ImieNetwork\SiteBundle\Entity\Competence $competence = null)
    {
        $this->competence = $competence;

        return $this;
    }

    /**
     * Get competence
     *
     * @return \ImieNetwork\SiteBundle\Entity\Competence 
     */
    public function getCompetence()
    {
        return $this->competence;
    }
}
