<?php

namespace ImieNetwork\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Offreville
 *@ORM\Entity(repositoryClass="ImieNetwork\SiteBundle\Repository\OffrevilleRepository")
 */
 class  Offreville
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \ImieNetwork\SiteBundle\Entity\Offre
     */
    private $idoffre;

    /**
     * @var \ImieNetwork\SiteBundle\Entity\Ville
     */
    private $idville;


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
     * Set idoffre
     *
     * @param \ImieNetwork\SiteBundle\Entity\Offre $idoffre
     * @return Offreville
     */
    public function setIdoffre(\ImieNetwork\SiteBundle\Entity\Offre $idoffre = null)
    {
        $this->idoffre = $idoffre;

        return $this;
    }

    /**
     * Get idoffre
     *
     * @return \ImieNetwork\SiteBundle\Entity\Offre 
     */
    public function getIdoffre()
    {
        return $this->idoffre;
    }

    /**
     * Set idville
     *
     * @param \ImieNetwork\SiteBundle\Entity\Ville $idville
     * @return Offreville
     */
    public function setIdville(\ImieNetwork\SiteBundle\Entity\Ville $idville = null)
    {
        $this->idville = $idville;

        return $this;
    }

    /**
     * Get idville
     *
     * @return \ImieNetwork\SiteBundle\Entity\Ville 
     */
    public function getIdville()
    {
        return $this->idville;
    }
}
