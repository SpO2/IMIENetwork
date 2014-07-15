<?php

namespace ImieNetwork\SiteBundle\Controller;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdministrationController extends Controller
{
    //Page d'accueil de l'administration
     public function indexAction()
    {
       // $em = $this->getDoctrine()->getManager();

       // $entities = $em->getRepository('ImieNetworkSiteBundle:Utilisateur')->findAll();
        
        return $this->render("@Administration\index.html.twig");
    }
}