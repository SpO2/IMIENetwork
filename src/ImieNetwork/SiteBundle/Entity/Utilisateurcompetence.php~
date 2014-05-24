<?php

namespace ImieNetwork\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Utilisateurcompetence
 */
/**
 * @ORM\Entity(repositoryClass="ImieNetwork\SiteBundle\Entity\UtilisateurcompetenceRepository")
 */

class Utilisateurcompetence
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $note;

    /**
     * @var \ImieNetwork\SiteBundle\Entity\Utilisateur
     */
    private $idutilisateur;

    /**
     * @var \ImieNetwork\SiteBundle\Entity\Competence
     */
    private $idcompetence;


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
     * Set idutilisateur
     *
     * @param \ImieNetwork\SiteBundle\Entity\Utilisateur $idutilisateur
     * @return Utilisateurcompetence
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
     * Set idcompetence
     *
     * @param \ImieNetwork\SiteBundle\Entity\Competence $idcompetence
     * @return Utilisateurcompetence
     */
    public function setIdcompetence(\ImieNetwork\SiteBundle\Entity\Competence $idcompetence = null)
    {
        $this->idcompetence = $idcompetence;

        return $this;
    }

    /**
     * Get idcompetence
     *
     * @return \ImieNetwork\SiteBundle\Entity\Competence 
     */
    public function getIdcompetence()
    {
        return $this->idcompetence;
    }
}
