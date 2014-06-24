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
     */
    private $titre;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $detailcontact;

    /**
     * @var integer
     */
    private $duree;

    /**
     * @var string
     */
    private $typeposte;

    /**
     * @var \DateTime
     */
    private $datedebut;

    /**
     * @var \DateTime
     */
    private $datemodification;

    /**
     * @var \DateTime
     */
    private $datefinpublication;

    /**
     * @var \DateTime
     */
    private $datefin;

    /**
     * @var \ImieNetwork\SiteBundle\Entity\Typecontrat
     */
    private $idtypecontrat;

    /**
     * @var \ImieNetwork\SiteBundle\Entity\Utilisateur
     */
    private $idutilisateur;

    /**
     * 
     * @return titre
     */
    public function __toString()
    {
        return $this->titre;
    }
}
