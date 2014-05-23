<?php

namespace ImieNetwork\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ImieNetwork\SiteBundle\Entity\Utilisateur;

class EntrepriseController extends Controller
{
    public function indexAction()
    {
        return $this->render('ImieNetworkSiteBundle:Entreprise:index.html.twig');
    }
      
}
