<?php

namespace ImieNetwork\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Invitation
 */
class Invitation
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $idevenement;

    /**
     * @var \ImieNetwork\SiteBundle\Entity\Message
     */
    private $idmessage;


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
     * Set idevenement
     *
     * @param integer $idevenement
     * @return Invitation
     */
    public function setIdevenement($idevenement)
    {
        $this->idevenement = $idevenement;

        return $this;
    }

    /**
     * Get idevenement
     *
     * @return integer 
     */
    public function getIdevenement()
    {
        return $this->idevenement;
    }

    /**
     * Set idmessage
     *
     * @param \ImieNetwork\SiteBundle\Entity\Message $idmessage
     * @return Invitation
     */
    public function setIdmessage(\ImieNetwork\SiteBundle\Entity\Message $idmessage = null)
    {
        $this->idmessage = $idmessage;

        return $this;
    }

    /**
     * Get idmessage
     *
     * @return \ImieNetwork\SiteBundle\Entity\Message 
     */
    public function getIdmessage()
    {
        return $this->idmessage;
    }
}
