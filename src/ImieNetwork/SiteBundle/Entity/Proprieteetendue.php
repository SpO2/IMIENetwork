<?php

namespace ImieNetwork\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Proprieteetendue
 *@ORM\Entity(repositoryClass="ImieNetwork\SiteBundle\Repository\ProprieteetendueRepository") 
 */
class  Proprieteetendue
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
     * @ORM\Column(name="id", type="string", length=255, nullable=false)
     */
    private $libelle;

}
