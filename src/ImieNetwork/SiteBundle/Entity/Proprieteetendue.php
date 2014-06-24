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
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
<<<<<<< HEAD
     * @ORM\Column(name="id", type="string", length=255, nullable=false)
=======
     * 
     * @ORM\Column(type="string", length=255, nullable=false)
>>>>>>> 6264a600d866d45082834a303a5e3100c50f30ad
     */
    private $libelle;

    /**
     * 
     * @return libelle
     */
    public function __toString()
    {
        return $this->libelle;
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
     * Set libelle
     *
     * @param string $libelle
     * @return Proprieteetendue
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string 
     */
    public function getLibelle()
    {
        return $this->libelle;
    }
}
