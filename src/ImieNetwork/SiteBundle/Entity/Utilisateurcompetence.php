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

}
