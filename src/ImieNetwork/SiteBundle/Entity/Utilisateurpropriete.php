<?php

namespace ImieNetwork\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Utilisateurpropriete
 * @ORM\Entity(repositoryClass="ImieNetwork\SiteBundle\Repository\UtilisateurproprieteRepository")
 * @ORM\Table()
 */
class  Utilisateurpropriete
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
    private $valeur;

    /**
     * @var \ImieNetwork\SiteBundle\Entity\Utilisateur
     * @ManyToOne(targetEntity="Utilisateur", inversedBy="mes_proprietes_utilisateur")
     * @ORM\JoinColumn(name="utilisateurpropriete_id", referencedColumnName="id")
     */
    private $utilisateur;

    /**
     * @var \ImieNetwork\SiteBundle\Entity\Proprieteetendue
     * 
     *  @ORM\ManyToOne(targetEntity="Proprieteetendue")
     */
    private $propriete_etendue;
    
    public function __toString()
    {
        return $this->valeur;
    }
}
