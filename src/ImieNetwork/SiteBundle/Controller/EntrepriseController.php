<?php

namespace ImieNetwork\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ImieNetwork\SiteBundle\Entity\Utilisateur;

class EntrepriseController extends Controller {

    public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        $limit = $this->container->getParameter("preview_default");

        $evenements = $em->getRepository('ImieNetworkSiteBundle:evenement')->findAll($limit);
        $enquetes = $em->getRepository('ImieNetworkSiteBundle:message')->findBy(array('type' => 'Enquête'), array('datemessage' => 'desc'), $limit, 0);

        return $this->render('ImieNetworkSiteBundle:Entreprise:index.html.twig', array(
                    'evenements' => $evenements,
                    'enquetes' => $enquetes,
        ));
    }

    public function mesOffresAction() {
        $em = $this->getDoctrine()->getManager();
        $utilisateur =  $this->getUser();
        
        $offreNonActif = $em->getRepository('ImieNetworkSiteBundle:OffreRepository')->offresNonActivesParUtilisateur($utilisateur);
        $offreActif = $em->getRepository('ImieNetworkSiteBundle:OffreRepository')->offresActivesParUtilisateur($utilisateur);
        
        return $this->render('ImieNetworkSiteBundle:Entreprise:mesOffre.html.twig', array(
                    'offreNonActif' => $offreNonActif,
                    'offreActif' => $offreActif,
        ));
    }
}
