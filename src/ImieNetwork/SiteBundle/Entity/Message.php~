<?php

namespace ImieNetwork\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Message
 */
/**
 * @ORM\Entity(repositoryClass="ImieNetwork\SiteBundle\Entity\MessageRepository")
 */

class Message
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $contenu;

    /**
     * @var \DateTime
     */
    private $datemessage;

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
