<?php

namespace ImieNetwork\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Groupepropriete
 */
class Groupepropriete
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $valeur;

    /**
     * @var \ImieNetwork\SiteBundle\Entity\Groupe
     */
    private $idgroupe;

    /**
     * @var \ImieNetwork\SiteBundle\Entity\Proprieteetendue
     */
    private $idpropriete;


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
     * Set valeur
     *
     * @param integer $valeur
     * @return Groupepropriete
     */
    public function setValeur($valeur)
    {
        $this->valeur = $valeur;

        return $this;
    }

    /**
     * Get valeur
     *
     * @return integer 
     */
    public function getValeur()
    {
        return $this->valeur;
    }

    /**
     * Set idgroupe
     *
     * @param \ImieNetwork\SiteBundle\Entity\Groupe $idgroupe
     * @return Groupepropriete
     */
    public function setIdgroupe(\ImieNetwork\SiteBundle\Entity\Groupe $idgroupe = null)
    {
        $this->idgroupe = $idgroupe;

        return $this;
    }

    /**
     * Get idgroupe
     *
     * @return \ImieNetwork\SiteBundle\Entity\Groupe 
     */
    public function getIdgroupe()
    {
        return $this->idgroupe;
    }

    /**
     * Set idpropriete
     *
     * @param \ImieNetwork\SiteBundle\Entity\Proprieteetendue $idpropriete
     * @return Groupepropriete
     */
    public function setIdpropriete(\ImieNetwork\SiteBundle\Entity\Proprieteetendue $idpropriete = null)
    {
        $this->idpropriete = $idpropriete;

        return $this;
    }

    /**
     * Get idpropriete
     *
     * @return \ImieNetwork\SiteBundle\Entity\Proprieteetendue 
     */
    public function getIdpropriete()
    {
        return $this->idpropriete;
    }
}
