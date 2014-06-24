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

<<<<<<< HEAD
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
=======
>>>>>>> 6264a600d866d45082834a303a5e3100c50f30ad
}
