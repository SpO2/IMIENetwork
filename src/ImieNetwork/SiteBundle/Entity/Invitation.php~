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
    private $idevenement;

    /**
     * @var \ImieNetwork\SiteBundle\Entity\Message
     */
    private $id;


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
     * Set id
     *
     * @param \ImieNetwork\SiteBundle\Entity\Message $id
     * @return Invitation
     */
    public function setId(\ImieNetwork\SiteBundle\Entity\Message $id = null)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return \ImieNetwork\SiteBundle\Entity\Message 
     */
    public function getId()
    {
        return $this->id;
    }
}
