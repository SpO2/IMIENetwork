<?php

namespace ImieNetwork\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Evenement
 * @ORM\Entity(repositoryClass="ImieNetwork\SiteBundle\Repository\EvenementRepository")
 * @ORM\Table()
 */
class  Evenement
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
     * @ORM\Column(type="string")
     */
    private $libelle;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $description;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    private $datedebut;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    private $datemodification;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    private $datefin;

    /**
     * @var integer
     * @ORM\Column(type="integer")
     */
    private $statut;

    /**
     * @var \ImieNetwork\SiteBundle\Entity\Utilisateur
     * @ORM\ManyToOne(targetEntity="Utilisateur", inversedBy="mes_utilisateurs")
     * @ORM\JoinColumn(name="evenement_id", referencedColumnName="id")
     */
    private $utilisateurs;

    /**
     * @var \ImieNetwork\SiteBundle\Entity\Utilisateur
     * @ORM\ManyToOne(targetEntity="Utilisateur", inversedBy="mon_auteur")
     * @ORM\JoinColumn(name="evenement_id", referencedColumnName="id")
     */
    private $auteur;
    
    /**
     *
     * @var \ImieNetwork\SiteBundle\Entity\Evenementutilisateur
     * @ORM\OneToMany(targetEntity="EvenementUtilisateur", mappedBy="evenement")
     */
    private $mes_evenements;
    
    /**
     * 
     * @return libelle
     */
    public function __toString()
    {
        return $this->libelle;
    }
    
}
