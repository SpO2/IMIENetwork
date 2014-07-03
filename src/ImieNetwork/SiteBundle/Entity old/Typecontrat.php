<?php

namespace ImieNetwork\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Typecontrat
 * @ORM\Entity(repositoryClass="ImieNetwork\SiteBundle\Repository\TypecontratRepository")
 * @ORM\Table()
 */
class  Typecontrat
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
     * @var \ImieNetwork\SiteBundle\Entity\Offre
     * @ORM\OneToMany(targetEntity="Offre", mappedBy="typecontrat")
     */
    private $mon_offre;
    
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
     * @return Typecontrat
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
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->mon_offre = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add mon_offre
     *
     * @param \ImieNetwork\SiteBundle\Entity\Offre $monOffre
     * @return Typecontrat
     */
    public function addMonOffre(\ImieNetwork\SiteBundle\Entity\Offre $monOffre)
    {
        $this->mon_offre[] = $monOffre;

        return $this;
    }

    /**
     * Remove mon_offre
     *
     * @param \ImieNetwork\SiteBundle\Entity\Offre $monOffre
     */
    public function removeMonOffre(\ImieNetwork\SiteBundle\Entity\Offre $monOffre)
    {
        $this->mon_offre->removeElement($monOffre);
    }

    /**
     * Get mon_offre
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getMonOffre()
    {
        return $this->mon_offre;
    }
}
