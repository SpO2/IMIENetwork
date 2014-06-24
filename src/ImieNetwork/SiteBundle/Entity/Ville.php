<?php

namespace ImieNetwork\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ville
 * @ORM\Entity(repositoryClass="ImieNetwork\SiteBundle\Repository\VilleRepository")
 * @ORM\Table()
 */
class  Ville
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
    private $codepostal;

    /**
     * 
     * @return code postal libelle
     */
    public function __toString()
    {
        return $this->codepostal.' '.$this->libelle;
    }

}
