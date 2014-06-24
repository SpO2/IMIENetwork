<?php

namespace ImieNetwork\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Message
 * @ORM\Entity(repositoryClass="ImieNetwork\SiteBundle\Repository\MessageRepository")
 * @ORM\Table()
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
     */
    private $utilisateur;

    /**
     * @var \ImieNetwork\SiteBundle\Entity\Typemessage
     */
    private $type_message;

    /**
     * @var \ImieNetwork\SiteBundle\Entity\Conversation
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
     * @ORM\ManyToOne(targetEntity="Utilisateur", inversedBy="mes_experiences")
     * @ORM\JoinColumn(name="experience_id", referencedColumnName="id")
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
     * @var \ImieNetwork\SiteBundle\Entity\Utilisateur
     */
    private $idutilisateur;

    /**
     * @var \ImieNetwork\SiteBundle\Entity\Typemessage
     */
    private $idtypemessage;

    /**
     * @var \ImieNetwork\SiteBundle\Entity\Conversation
     */
    private $idconversation;


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
     * Set idutilisateur
     *
     * @param \ImieNetwork\SiteBundle\Entity\Utilisateur $idutilisateur
     * @return Message
     */
    public function setIdutilisateur(\ImieNetwork\SiteBundle\Entity\Utilisateur $idutilisateur = null)
    {
        $this->idutilisateur = $idutilisateur;

        return $this;
    }

    /**
     * Get idutilisateur
     *
     * @return \ImieNetwork\SiteBundle\Entity\Utilisateur 
     */
    public function getIdutilisateur()
    {
        return $this->idutilisateur;
    }

    /**
     * Set idtypemessage
     *
     * @param \ImieNetwork\SiteBundle\Entity\Typemessage $idtypemessage
     * @return Message
     */
    public function setIdtypemessage(\ImieNetwork\SiteBundle\Entity\Typemessage $idtypemessage = null)
    {
        $this->idtypemessage = $idtypemessage;

        return $this;
    }

    /**
     * Get idtypemessage
     *
     * @return \ImieNetwork\SiteBundle\Entity\Typemessage 
     */
    public function getIdtypemessage()
    {
        return $this->idtypemessage;
    }

    /**
     * Set idconversation
     *
     * @param \ImieNetwork\SiteBundle\Entity\Conversation $idconversation
     * @return Message
     */
    public function setIdconversation(\ImieNetwork\SiteBundle\Entity\Conversation $idconversation = null)
    {
        $this->idconversation = $idconversation;

        return $this;
    }

    /**
     * Get idconversation
     *
     * @return \ImieNetwork\SiteBundle\Entity\Conversation 
     */
    public function getIdconversation()
    {
        return $this->idconversation;
    }
}
