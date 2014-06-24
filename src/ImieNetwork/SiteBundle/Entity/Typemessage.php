<?php

namespace ImieNetwork\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Typemessage
 * @ORM\Entity(repositoryClass="ImieNetwork\SiteBundle\Repository\TypemessageRepository")
 * @ORM\Table()
 */
class  Typemessage
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
    private $libelle;

    /**
     *
     * @var \ImieNetwork\SiteBundle\Entity\Typemessage
     * @ORM\OneToMany(targetEntity="Message", mappedBy="type_message")
     */
    private $mon_type_message;
    
    /**
     * 
     * @return libelle
     */
    public function __toString()
    {
        return $this->libelle;
    }
}
