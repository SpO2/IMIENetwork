<?php

namespace ImieNetwork\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Groupe
 *@ORM\Entity(repositoryClass="ImieNetwork\SiteBundle\Repository\GroupeRepository")
 * @ORM\Table()
 */
class  Groupe
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
     * @var string     *
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;
    /**
     * @var ArrayCollection \ImieNetwork\SiteBundle\Entity\groupepropriete
     *
     * @ORM\OneToMany(targetEntity="Groupepropriete", mappedBy="groupe")
     */
    private $proprietes_groupe;
    
    
    /**
     * @var ArrayCollection \ImieNetwork\SiteBundle\Entity\module
     * 
     * @ManyToMany(targetEntity="Module")
     * @JoinTable(name="groupemodule",
     *      joinColumns={@JoinColumn(name="idgroupe", referencedColumnName="id")},
     *      inverseJoinColumns={@JoinColumn(name="idmodule", referencedColumnName="id")}
     *      )
     **/
    private $modules;

}
