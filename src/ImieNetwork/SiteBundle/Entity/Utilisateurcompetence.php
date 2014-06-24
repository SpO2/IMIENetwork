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
     * @ORM\JoinColumn(name="utilisateur_id", referencedColumnName="id")
     */
    private $utilisateur;

    /**
     * @var \ImieNetwork\SiteBundle\Entity\Competence
     * @ORM\ManyToOne(targetEntity="Competence", inversedBy="utilisateurs")
     * @ORM\JoinColumn(name="competence_id", referencedColumnName="id")
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
