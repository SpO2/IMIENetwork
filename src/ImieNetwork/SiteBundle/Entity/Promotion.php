<?php

namespace ImieNetwork\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Promotion
 *@ORM\Entity(repositoryClass="ImieNetwork\SiteBundle\Repository\PromotionRepository")
 */
class  Promotion
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
    private $libelle;

    /**
     * @var integer
     * @ORM\Column(type="integer")
     */
    private $annee;

    /**
     * @var string
     * @ORM\Column(type="string", unique=true)
     */
    private $email;

    /**
     * @var ArrayCollection \ImieNetwork\SiteBundle\Entity\Utilisateur
     * @ORM\ManyToMany(targetEntity="Utilisateur", inversedBy="mes_promotions")
     */
    private $utilisateurs;
    
    /**
     * 
     * @return libelle
     */
    public function __toString()
    {
        return $this->libelle;
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
     * Set libelle
     *
     * @param string $libelle
     * @return Promotion
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

    /**
     * Set annee
     *
     * @param integer $annee
     * @return Promotion
     */
    public function setAnnee($annee)
    {
        $this->annee = $annee;

        return $this;
    }

    /**
     * Get annee
     *
     * @return integer 
     */
    public function getAnnee()
    {
        return $this->annee;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Promotion
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set utilisateurs
     *
     * @param \ImieNetwork\SiteBundle\Entity\Utilisateur $utilisateurs
     * @return Promotion
     */
    public function setUtilisateurs(\ImieNetwork\SiteBundle\Entity\Utilisateur $utilisateurs = null)
    {
        $this->utilisateurs = $utilisateurs;

        return $this;
    }

    /**
     * Get utilisateurs
     *
     * @return \ImieNetwork\SiteBundle\Entity\Utilisateur 
     */
    public function getUtilisateurs()
    {
        return $this->utilisateurs;
    }
}
