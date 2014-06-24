<?php

namespace ImieNetwork\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Groupepropriete
 * @ORM\Entity(repositoryClass="ImieNetwork\SiteBundle\Repository\GroupeproprieteRepository")
 * @ORM\Table()
 */
class  Groupepropriete
{
     /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * 
     * @Column(type="string",length=255, nullable=false)
     */
    private $valeur;

    /**
     * @var \ImieNetwork\SiteBundle\Entity\Groupe
     * 
     * @ManyToOne(targetEntity="Groupe", inversedBy="proprietes_groupe")
     */
    private $groupe;

    /**
     * @var \ImieNetwork\SiteBundle\Entity\Proprieteetendue
     * 
     *  @ORM\ManyToOne(targetEntity="Proprieteetendue")
     */
    private $propriete;

   
}
