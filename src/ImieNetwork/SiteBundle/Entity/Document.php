<?php

namespace ImieNetwork\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Document
 * @ORM\Entity(repositoryClass="ImieNetwork\SiteBundle\Repository\DocumentRepository")
 * @ORM\Table()
 */
class  Document
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
     * @ORM\Column(type="string", nullable=false)
     */
    private $libelle;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=false)
     */
    private $url;

    /**
     * @var integer
     * @ORM\Column(type="integer", nullable=false)
     */
    private $statut;

    /**
     * @var \ImieNetwork\SiteBundle\Entity\Utilisateur
     * @ORM\ManyToOne(targetEntity="Utilisateur", inversedBy="mes_documents")
     * @ORM\JoinColumn(name="document_id", referencedColumnName="id")
     */
    private $utilisateur;
    
    /**
     * 
     * @return libelle
     */
    public function __toString()
    {
        return $this->libelle;
    }
}
