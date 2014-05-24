<?php

namespace ImieNetwork\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Documentmessage
 */
/**
 * @ORM\Entity(repositoryClass="ImieNetwork\SiteBundle\Entity\DocumentmessageRepository")
 */

class Documentmessage
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \ImieNetwork\SiteBundle\Entity\Document
     */
    private $iddocument;

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
     * Set iddocument
     *
     * @param \ImieNetwork\SiteBundle\Entity\Document $iddocument
     * @return Documentmessage
     */
    public function setIddocument(\ImieNetwork\SiteBundle\Entity\Document $iddocument = null)
    {
        $this->iddocument = $iddocument;

        return $this;
    }

    /**
     * Get iddocument
     *
     * @return \ImieNetwork\SiteBundle\Entity\Document 
     */
    public function getIddocument()
    {
        return $this->iddocument;
    }

    /**
     * Set idmessage
     *
     * @param \ImieNetwork\SiteBundle\Entity\Message $idmessage
     * @return Documentmessage
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
