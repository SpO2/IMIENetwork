<?php

namespace ImieNetwork\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Conversation
 * @ORM\Entity(repositoryClass="ImieNetwork\SiteBundle\Repository\ConversationRepository")
 * @ORM\Table()
 */
 class  Conversation
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
    private $titre;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $contenu;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime")
     */
    private $date_modification;

    /**
     * @var \ImieNetwork\SiteBundle\Entity\Utilisateur
     * @ORM\ManyToOne(targetEntity="Utilisateur", inversedBy="mes_conversations")
     */
    private $utilisateur;
    
    /**
     *
     * @var \ImieNetwork\SiteBundle\Entity\Message
     * @ORM\OneToMany(targetEntity="Message", mappedBy="conversation")
     */
    private $mes_messages;
    
    /**
     * 
     * @return titre
     */
    public function __toString()
    {
        return $this->titre;
    }


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->mes_messages = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set titre
     *
     * @param string $titre
     * @return Conversation
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set contenu
     *
     * @param string $contenu
     * @return Conversation
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
     * Set date_modification
     *
     * @param \DateTime $dateModification
     * @return Conversation
     */
    public function setDateModification($dateModification)
    {
        $this->date_modification = $dateModification;

        return $this;
    }

    /**
     * Get date_modification
     *
     * @return \DateTime 
     */
    public function getDateModification()
    {
        return $this->date_modification;
    }

    /**
     * Set utilisateur
     *
     * @param \ImieNetwork\SiteBundle\Entity\Utilisateur $utilisateur
     * @return Conversation
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
     * Add mes_messages
     *
     * @param \ImieNetwork\SiteBundle\Entity\Message $mesMessages
     * @return Conversation
     */
    public function addMesMessage(\ImieNetwork\SiteBundle\Entity\Message $mesMessages)
    {
        $this->mes_messages[] = $mesMessages;

        return $this;
    }

    /**
     * Remove mes_messages
     *
     * @param \ImieNetwork\SiteBundle\Entity\Message $mesMessages
     */
    public function removeMesMessage(\ImieNetwork\SiteBundle\Entity\Message $mesMessages)
    {
        $this->mes_messages->removeElement($mesMessages);
    }

    /**
     * Get mes_messages
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMesMessages()
    {
        return $this->mes_messages;
    }
}
