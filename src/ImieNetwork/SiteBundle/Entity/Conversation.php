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
     * @ORM\JoinColumn(name="conversation_id", referencedColumnName="id")
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

}
