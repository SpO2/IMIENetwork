<?php

namespace ImieNetwork\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Groupe
 * @ORM\Entity(repositoryClass="ImieNetwork\SiteBundle\Repository\GroupeRepository")
 * @ORM\Table()
 */
class  Groupe
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
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;
    /**
     * @var ArrayCollection \ImieNetwork\SiteBundle\Entity\groupepropriete
     *
     * @ORM\OneToMany(targetEntity="Groupepropriete", mappedBy="groupe", cascade={"persist"})
     */
    private $proprietes_groupe;
    
    /**
     * @var \ImieNetwork\SiteBundle\Entity\Module
     * @ORM\ManyToOne(targetEntity="Module")
     */
    private $modules;


    public function __toString()
    {
        return $this->libelle;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->proprietes_groupe = new \Doctrine\Common\Collections\ArrayCollection();
        $this->modules = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Groupe
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
     * Add proprietes_groupe
     *
     * @param \ImieNetwork\SiteBundle\Entity\Groupepropriete $proprietesGroupe
     * @return Groupe
     */
    public function addProprietesGroupe(\ImieNetwork\SiteBundle\Entity\Groupepropriete $proprietesGroupe)
    {
        $this->proprietes_groupe[] = $proprietesGroupe;
        $proprietesGroupe->setGroupe($this);

        return $this;
    }

    /**
     * Remove proprietes_groupe
     *
     * @param \ImieNetwork\SiteBundle\Entity\Groupepropriete $proprietesGroupe
     */
    public function removeProprietesGroupe(\ImieNetwork\SiteBundle\Entity\Groupepropriete $proprietesGroupe)
    {
        $this->proprietes_groupe->removeElement($proprietesGroupe);
    }

    /**
     * Get proprietes_groupe
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getProprietesGroupe()
    {
        return $this->proprietes_groupe;
    }

    /**
     * Add modules
     *
     * @param \ImieNetwork\SiteBundle\Entity\Module $modules
     * @return Groupe
     */
    public function addModule(\ImieNetwork\SiteBundle\Entity\Module $modules)
    {
        $this->modules[] = $modules;

        return $this;
    }

    /**
     * Remove modules
     *
     * @param \ImieNetwork\SiteBundle\Entity\Module $modules
     */
    public function removeModule(\ImieNetwork\SiteBundle\Entity\Module $modules)
    {
        $this->modules->removeElement($modules);
    }

    /**
     * Get modules
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getModules()
    {
        return $this->modules;
    }

    /**
     * Set modules
     *
     * @param \ImieNetwork\SiteBundle\Entity\Module $modules
     * @return Groupe
     */
    public function setModules(\ImieNetwork\SiteBundle\Entity\Module $modules = null)
    {
        $this->modules = $modules;

        return $this;
    }
}
