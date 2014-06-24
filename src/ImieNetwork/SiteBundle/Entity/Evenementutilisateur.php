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

}
