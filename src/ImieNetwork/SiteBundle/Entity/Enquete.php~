<?php

namespace ImieNetwork\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Enquete
 */
/**
 * @ORM\Entity(repositoryClass="ImieNetwork\SiteBundle\Entity\EnqueteRepository")
 */
class Enquete
{
    /**
     * @var string
     */
    private $url;

    /**
     * @var \ImieNetwork\SiteBundle\Entity\Message
     */
    private $id;


    /**
     * Set url
     *
     * @param string $url
     * @return Enquete
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set id
     *
     * @param \ImieNetwork\SiteBundle\Entity\Message $id
     * @return Enquete
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
    /**
     * @var \ImieNetwork\SiteBundle\Entity\Message
     */
    private $idmessage;


    /**
     * Set idmessage
     *
     * @param \ImieNetwork\SiteBundle\Entity\Message $idmessage
     * @return Enquete
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
