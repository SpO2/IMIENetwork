<?php

namespace ImieNetwork\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Promotion
 *@ORM\Entity(repositoryClass="ImieNetwork\SiteBundle\Repository\PromotionRepository")
 */class  Promotion
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $libelle;

    /**
     * @var integer
     */
    private $annee;

    /**
     * @var string
     */
    private $email;

    /**
     *
     * @var \ImieNetwork\SiteBundle\Entity\Utilisateur
     * @ORM\ManyToOne(targetEntity="Utilisateur", inversedBy="ma_promotion")
     * @ORM\JoinColumn(name="promotion_id", referencedColumnName="id")
     */
    private $utilisateur;
    
    /**
     * 
     * @return libelle
     */
    public function __toString()
    {
        return $this->libelle;
    }
}
