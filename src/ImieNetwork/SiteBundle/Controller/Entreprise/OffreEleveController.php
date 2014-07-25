<?php

namespace ImieNetwork\SiteBundle\Controller\Entreprise;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class OffreEleveController extends Controller {

    public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        $limit = $this->container->getParameter("preview_default");
        $request  = $this->getRequest();
        
        $idCompetences = $request->request->get('idCompetence');
        $idVille = $request->request->get('idVille');
        print_r($idVille) ;
        print_r($idCompetences);
        
        $utilisateurs = $em->getRepository('ImieNetworkSiteBundle:Utilisateur')->findAll($limit);

        return $this->render('@Entreprise/OffreEleve/index.html.twig', array(
                    'utilisateurs' => $utilisateurs,
        ));
    }
    public function showAction() {
        return $this->render('@Entreprise/OffreEleve/show.html.twig');
    }
    
    public function searchAction() {
        $em = $this->getDoctrine()->getManager();
        $competences = $em->getRepository('ImieNetworkSiteBundle:Competence')->findAll();
        $villes = $em->getRepository('ImieNetworkSiteBundle:Ville')->findAll();
        
        return $this->render('@Entreprise/OffreEleve/search.html.twig', array(
                    'competences' => $competences,
                    'villes' => $villes,
        ));
    }
}
