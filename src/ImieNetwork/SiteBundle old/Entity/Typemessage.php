<?php

namespace ImieNetwork\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Typemessage
 * @ORM\Entity(repositoryClass="ImieNetwork\SiteBundle\Repository\TypemessageRepository")
 * @ORM\Table()
 */
class  Typemessage
{
    /**
     * @var integer
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string", unique=true)
     */
    private $libelle;

    /**
     *
     * @var \ImieNetwork\SiteBundle\Entity\Typemessage
     * @ORM\OneToMany(targetEntity="Message", mappedBy="type_message")
     */
    private $mon_type_message;
    
    /**
     * 
     * @return libelle
     */
    public function __toString()
    {
        return $this->libelle;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->mon_type_message = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Typemessage
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
     * Add mon_type_message
     *
     * @param \ImieNetwork\SiteBundle\Entity\Message $monTypeMessage
     * @return Typemessage
     */
    public function addMonTypeMessage(\ImieNetwork\SiteBundle\Entity\Message $monTypeMessage)
    {
        $this->mon_type_message[] = $monTypeMessage;

        return $this;
    }

    /**
     * Remove mon_type_message
     *
     * @param \ImieNetwork\SiteBundle\Entity\Message $monTypeMessage
     */
    public function removeMonTypeMessage(\ImieNetwork\SiteBundle\Entity\Message $monTypeMessage)
    {
        $this->mon_type_message->removeElement($monTypeMessage);
    }

    /**
     * Get mon_type_message
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMonTypeMessage()
    {
        return $this->mon_type_message;
    }
}
