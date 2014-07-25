<?php

namespace ImieNetwork\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Message
 * @ORM\Entity(repositoryClass="ImieNetwork\SiteBundle\Repository\MessageRepository")
 * @ORM\HasLifecycleCallbacks 
 * 
 */class  Message
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
     * @ORM\Column(type="string")
     */
    private $contenu;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    private $datemessage;

    /**
     * @var \ImieNetwork\SiteBundle\Entity\Utilisateur
     * @ORM\ManyToOne(targetEntity="Utilisateur", inversedBy="mes_messages")
     */
    private $utilisateur;

    /**
     * @var \ImieNetwork\SiteBundle\Entity\Typemessage  
     * @ORM\ManyToOne(targetEntity="Typemessage")
     */
    private $type_message;

    /**
     * @var \ImieNetwork\SiteBundle\Entity\Conversation
     * @ORM\ManyToOne(targetEntity="Conversation", inversedBy="mes_messages")
     */
    private $conversation;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $url;
    
    /**
     *
     * @var string
     * @ORM\Column(type="string")
     */
    private $type;

    /**
     *
     * @var \ImieNetwork\SiteBundle\Entity\Evenement
     * @ORM\ManyToOne(targetEntity="Evenement")
     *  
     */
    private $evenement;
    
    /**
     * 
     * @return contenu
     */
    public function __toString()
    {
        return $this->contenu;
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
     * Set contenu
     *
     * @param string $contenu
     * @return Message
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string 
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set datemessage
     *
     * @param \DateTime $datemessage
     * @return Message
     */
    public function setDatemessage($datemessage)
    {
        $this->datemessage = $datemessage;

        return $this;
    }

    /**
     * Get datemessage
     *
     * @return \DateTime 
     */
    public function getDatemessage()
    {
        return $this->datemessage;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return Message
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
     * Set type
     *
     * @param string $type
     * @return Message
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set utilisateur
     *
     * @param \ImieNetwork\SiteBundle\Entity\Utilisateur $utilisateur
     * @return Message
     */
    public function setUtilisateur(\ImieNetwork\SiteBundle\Entity\Utilisateur $utilisateur = null)
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * Get utilisateur
     *
     * @return \ImieNetwork\SiteBundle\Entity\Utilisateur 
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }

    /**
     * Set type_message
     *
     * @param \ImieNetwork\SiteBundle\Entity\Typemessage $typeMessage
     * @return Message
     */
    public function setTypeMessage(\ImieNetwork\SiteBundle\Entity\Typemessage $typeMessage = null)
    {
        $this->type_message = $typeMessage;

        return $this;
    }

    /**
     * Get type_message
     *
     * @return \ImieNetwork\SiteBundle\Entity\Typemessage 
     */
    public function getTypeMessage()
    {
        return $this->type_message;
    }

    /**
     * Set conversation
     *
     * @param \ImieNetwork\SiteBundle\Entity\Conversation $conversation
     * @return Message
     */
    public function setConversation(\ImieNetwork\SiteBundle\Entity\Conversation $conversation = null)
    {
        $this->conversation = $conversation;

        return $this;
    }

    /**
     * Get conversation
     *
     * @return \ImieNetwork\SiteBundle\Entity\Conversation 
     */
    public function getConversation()
    {
        return $this->conversation;
    }

    /**
     * Set evenement
     *
     * @param \ImieNetwork\SiteBundle\Entity\Utilisateur $evenement
     * @return Message
     */
    public function setEvenement(\ImieNetwork\SiteBundle\Entity\Utilisateur $evenement = null)
    {
        $this->evenement = $evenement;

        return $this;
    }

    /**
     * Get evenement
     *
     * @return \ImieNetwork\SiteBundle\Entity\Utilisateur 
     */
    public function getEvenement()
    {
        return $this->evenement;
    }
    
    /** @ORM\PrePersist */
    public function UpdateFunction()
    {
        $this->datemessage = new \DateTime('NOW');
    }
}
