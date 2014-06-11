<?php

namespace ImieNetwork\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Groupemodule
 *@ORM\Entity(repositoryClass="ImieNetwork\SiteBundle\Repository\GroupemoduleRepository")
 */class  Groupemodule
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \ImieNetwork\SiteBundle\Entity\Groupe
     */
    private $idgroupe;

    /**
     * @var \ImieNetwork\SiteBundle\Entity\Module
     */
    private $idmodule;


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
     * Set idgroupe
     *
     * @param \ImieNetwork\SiteBundle\Entity\Groupe $idgroupe
     * @return Groupemodule
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
     * Set idmodule
     *
     * @param \ImieNetwork\SiteBundle\Entity\Module $idmodule
     * @return Groupemodule
     */
    public function setIdmodule(\ImieNetwork\SiteBundle\Entity\Module $idmodule = null)
    {
        $this->idmodule = $idmodule;

        return $this;
    }

    /**
     * Get idmodule
     *
     * @return \ImieNetwork\SiteBundle\Entity\Module 
     */
    public function getIdmodule()
    {
        return $this->idmodule;
    }
}
