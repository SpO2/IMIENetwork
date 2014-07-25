<?php

namespace ImieNetwork\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Utilisateurpropriete
 * @ORM\Entity(repositoryClass="ImieNetwork\SiteBundle\Repository\UtilisateurproprieteRepository")
 * @ORM\Table()
 */
class  Utilisateurpropriete
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
     * @ORM\Column(type="string", nullable=false)
     */
    private $valeur;

    /**
     * @var \ImieNetwork\SiteBundle\Entity\Utilisateur
     * 
     * @ORM\ManyToOne(targetEntity="Utilisateur", inversedBy="mes_proprietes_utilisateur")
     */
    private $utilisateur;

    /**
     * @var \ImieNetwork\SiteBundle\Entity\Proprieteetendue
     * 
     *  @ORM\ManyToOne(targetEntity="Proprieteetendue")
     */
    private $propriete_etendue;

    public function __toString()
    {
        return $this->valeur;
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

    /**
     * Set valeur
     *
     * @param string $valeur
     * @return Utilisateurpropriete
     */
    public function setValeur($valeur)
    {
        $this->valeur = $valeur;

        return $this;
    }

    /**
     * Get valeur
     *
     * @return string 
     */
    public function getValeur()
    {
        return $this->valeur;
    }

    /**
     * Set utilisateur
     *
     * @param \ImieNetwork\SiteBundle\Entity\Utilisateur $utilisateur
     * @return Utilisateurpropriete
     */
    public function setUtilisateur(\ImieNetwork\SiteBundle\Entity\Utilisateur $utilisateur = null)
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * Get utilisateur
     *
     * @return \ImieNetwork\SiteBundle\Entity\Utilisateur 
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }

    /**
     * Set propriete_etendue
     *
     * @param \ImieNetwork\SiteBundle\Entity\Proprieteetendue $proprieteEtendue
     * @return Utilisateurpropriete
     */
    public function setProprieteEtendue(\ImieNetwork\SiteBundle\Entity\Proprieteetendue $proprieteEtendue = null)
    {
        $this->propriete_etendue = $proprieteEtendue;

        return $this;
    }

    /**
     * Get propriete_etendue
     *
     * @return \ImieNetwork\SiteBundle\Entity\Proprieteetendue 
     */
    public function getProprieteEtendue()
    {
        return $this->propriete_etendue;
    }
}
