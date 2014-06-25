<?php

namespace ImieNetwork\SiteBundle\Controller\Entreprise;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class OffreController extends Controller {

    public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        $utilisateur = $this->getUser();

        $offreNonActif = $em->getRepository('ImieNetworkSiteBundle:OffreRepository')->offresNonActivesParUtilisateur($utilisateur);
        $offreActif = $em->getRepository('ImieNetworkSiteBundle:OffreRepository')->offresActivesParUtilisateur($utilisateur);

        return $this->render('ImieNetworkSiteBundle:Entreprise:mesOffre.html.twig', array(
                    'offreNonActif' => $offreNonActif,
                    'offreActif' => $offreActif,
        ));
    }

}
