<?php

namespace ImieNetwork\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ImieNetwork\SiteBundle\Entity\Utilisateur;

class EleveController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $limit = $this->container->getParameter("preview_default");

        $evenements = $em->getRepository('ImieNetworkSiteBundle:evenement')->findAll($limit);
        $enquetes = $em->getRepository('ImieNetworkSiteBundle:message')->findBy(array('type' => 'Enquête' ));
         
        return $this->render('ImieNetworkSiteBundle:Eleve:index.html.twig', array(
            'evenements' => $evenements,
            'enquetes' => $enquetes,
        ));
    }
    
}
