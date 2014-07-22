<?php

namespace ImieNetwork\SiteBundle\Controller\Entreprise;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class OffreEleveController extends Controller {

    public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        $limit = $this->container->getParameter("preview_default");

        $utilisateurs = $em->getRepository('ImieNetworkSiteBundle:Utilisateur')->findAll($limit);

        return $this->render('@Entreprise/OffreEleve/index.html.twig', array(
                    'utilisateurs' => $utilisateurs,
        ));
    }
    public function showAction() {
        return $this->render('@Entreprise/OffreEleve/show.html.twig');
    }
}
