<?php

namespace ImieNetwork\SiteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Module
 *@ORM\Entity(repositoryClass="ImieNetwork\SiteBundle\Repository\ModuleRepository") 
 */
class  Module
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
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;

    /**
     * @var string
     * 
     * @ORM\Column(name="code", type="string", length=255)
     */
    private $code;

}
