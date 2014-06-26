<?php

namespace ImieNetwork\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Groupepropriete
 * @ORM\Entity(repositoryClass="ImieNetwork\SiteBundle\Repository\GroupeproprieteRepository")
 * @ORM\Table()
 */
class  Groupepropriete
{
     /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * 
     * @ORM\Column(type="string", nullable=false)
     */
    private $valeur;

    /**
     * @var \ImieNetwork\SiteBundle\Entity\Groupe
     * 
     * @ORM\ManyToOne(targetEntity="Groupe", inversedBy="proprietes_groupe", cascade={"persist"})
     */
    private $groupe;

    /**
     * @var \ImieNetwork\SiteBundle\Entity\Proprieteetendue
     * 
     *  @ORM\ManyToOne(targetEntity="Proprieteetendue")
     */
    private $propriete;

    public function __toString()
    {
        return $this->groupe." - ".$this->propriete." : ".$this->valeur;
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
     * @return string 
     */
    public function getValeur()
    {
        return $this->valeur;
    }

    /**
     * Set groupe
     *
     * @param \ImieNetwork\SiteBundle\Entity\Groupe $groupe
     * @return Groupepropriete
     */
    public function setGroupe(\ImieNetwork\SiteBundle\Entity\Groupe $groupe = null)
    {
        $this->groupe = $groupe;

        return $this;
    }

    /**
     * Get groupe
     *
     * @return \ImieNetwork\SiteBundle\Entity\Groupe 
     */
    public function getGroupe()
    {
        return $this->groupe;
    }

    /**
     * Set propriete
     *
     * @param \ImieNetwork\SiteBundle\Entity\Proprieteetendue $propriete
     * @return Groupepropriete
     */
    public function setPropriete(\ImieNetwork\SiteBundle\Entity\Proprieteetendue $propriete = null)
    {
        $this->propriete = $propriete;

        return $this;
    }

    /**
     * Get propriete
     *
     * @return \ImieNetwork\SiteBundle\Entity\Proprieteetendue 
     */
    public function getPropriete()
    {
        return $this->propriete;
    }
}
