<?php

namespace ImieNetwork\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ImieNetwork\SiteBundle\Entity\Utilisateur;

class AdministrationController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ImieNetworkSiteBundle:Administration:index.html.twig', array('name' => $name));
    }   
}
