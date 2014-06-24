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
     * @ORM\Column(type="string", unique=true)
     */
    private $valeur;

    /**
     * @var \ImieNetwork\SiteBundle\Entity\Utilisateur
     * 
     * @ManyToOne(targetEntity="Utilisateur", inversedBy="utilisateur_propriete")
     */
    private $utilisateur;

    /**
     * @var \ImieNetwork\SiteBundle\Entity\Proprieteetendue
     * 
     *  @ORM\ManyToOne(targetEntity="Proprieteetendue")
     */
    private $propriete_etendue;
    /**
     * @var \ImieNetwork\SiteBundle\Entity\Utilisateur
     */
    private $idutilisateur;

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
     * Set idutilisateur
     *
     * @param \ImieNetwork\SiteBundle\Entity\Utilisateur $idutilisateur
     * @return Utilisateurpropriete
     */
    public function setIdutilisateur(\ImieNetwork\SiteBundle\Entity\Utilisateur $idutilisateur = null)
    {
        $this->idutilisateur = $idutilisateur;

        return $this;
    }

    /**
     * Get idutilisateur
     *
     * @return \ImieNetwork\SiteBundle\Entity\Utilisateur 
     */
    public function getIdutilisateur()
    {
        return $this->idutilisateur;
    }

    /**
     * Set idpropriete
     *
     * @param \ImieNetwork\SiteBundle\Entity\Proprieteetendue $idpropriete
     * @return Utilisateurpropriete
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
