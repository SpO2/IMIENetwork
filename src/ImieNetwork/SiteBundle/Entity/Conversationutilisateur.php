<?php

namespace ImieNetwork\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Conversationutilisateur
 *@ORM\Entity(repositoryClass="ImieNetwork\SiteBundle\Repository\ConversationutilisateurRepository") 
 */class  Conversationutilisateur
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \ImieNetwork\SiteBundle\Entity\Conversation
     */
    private $idconversation;

    /**
     * @var \ImieNetwork\SiteBundle\Entity\Utilisateur
     */
    private $idutilisateur;


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
     * Set idconversation
     *
     * @param \ImieNetwork\SiteBundle\Entity\Conversation $idconversation
     * @return Conversationutilisateur
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

    /**
     * Set idutilisateur
     *
     * @param \ImieNetwork\SiteBundle\Entity\Utilisateur $idutilisateur
     * @return Conversationutilisateur
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
}
