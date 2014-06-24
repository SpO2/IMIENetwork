<?php

namespace ImieNetwork\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Offre
 *@ORM\Entity(repositoryClass="ImieNetwork\SiteBundle\Repository\OffreRepository")
 */class  Offre
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
    private $titre;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $description;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $detailcontact;

    /**
     * @var integer
     * @ORM\Column(type="integer")
     */
    private $duree;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $typeposte;

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
    private $datefinpublication;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    private $datefin;

    /**
     * @var \ImieNetwork\SiteBundle\Entity\Typecontrat
     * @ORM\ManyToOne(targetEntity="Typecontrat", inversedBy="mon_offre")
     * @ORM\JoinColumn(name="offre_id", referencedColumnName="id")
     */
    private $type_contrat;

    /**
     * @var \ImieNetwork\SiteBundle\Entity\Utilisateur
     * @ORM\ManyToOne(targetEntity="Utilisateur", inversedBy="mes_offres")
     * @ORM\JoinColumn(name="offre_id", referencedColumnName="id")
     */
    private $utilisateur;

    /**
     * 
     * @return titre
     */
    public function __toString()
    {
        return $this->titre;
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
}
