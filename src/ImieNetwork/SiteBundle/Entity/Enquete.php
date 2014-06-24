<?php

namespace ImieNetwork\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Enquete
 */
class Enquete
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $url;

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
