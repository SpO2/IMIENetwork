<?php

namespace ImieNetwork\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Typecontrat
 */
/**
 * @ORM\Entity(repositoryClass="ImieNetwork\SiteBundle\Entity\TypecontratRepository")
 */

class Typecontrat
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     * @return Typecontrat
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string 
     */
    public function getLibelle()
    {
        return $this->libelle;
    }
}
