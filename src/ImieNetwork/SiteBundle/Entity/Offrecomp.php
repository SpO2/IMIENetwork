<?php

namespace ImieNetwork\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Offrecomp
 */
class Offrecomp
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
     * @var \ImieNetwork\SiteBundle\Entity\Competence
     */
    private $idcompetence;


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
     * @return Offrecomp
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
     * Set idcompetence
     *
     * @param \ImieNetwork\SiteBundle\Entity\Competence $idcompetence
     * @return Offrecomp
     */
    public function setIdcompetence(\ImieNetwork\SiteBundle\Entity\Competence $idcompetence = null)
    {
        $this->idcompetence = $idcompetence;

        return $this;
    }

    /**
     * Get idcompetence
     *
     * @return \ImieNetwork\SiteBundle\Entity\Competence 
     */
    public function getIdcompetence()
    {
        return $this->idcompetence;
    }
}
