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
    
}
