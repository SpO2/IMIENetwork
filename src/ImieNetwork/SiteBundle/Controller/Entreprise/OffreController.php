<?php

namespace ImieNetwork\SiteBundle\Controller\Entreprise;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class OffreController extends Controller {

    public function indexAction() {
        
        $session = new Session();
        $em = $this->getDoctrine()->getEntityManager();

        $offres = $em->getRepository('ImieNetworkSiteBundle:Offre')->findBy(array(
           'utilisateur' => $session->get('user_id')
        ));
        
        return $this->render('@Entreprise/Offre/show.html.twig', array(
                    'offres' => $offres,
        ));
    }
    
    public function showAction($id) {
        
        $em = $this->getDoctrine()->getEntityManager();

        $offre = $em->getRepository('ImieNetworkSiteBundle:Offre')->findBy($id);
        $typeContrat = $em->getRepository('ImieNetworkSiteBundle:Offre')->find($offre.getTypeContrat());
        
        return $this->render('@Entreprise/Offre/show.html.twig', array(
                    'offre' => $offre,
                    'typeContrat' => $typeContrat,
        ));
    }
    
    public function updateAction($id) {
        
        $em = $this->getDoctrine()->getEntityManager();

        $offre = $em->getRepository('ImieNetworkSiteBundle:Offre')->findBy($id);
        $typeContrat = $em->getRepository('ImieNetworkSiteBundle:Offre')->find($offre.getTypeContrat());
        
        return $this->render('@Entreprise/Offre/show.html.twig', array(
                    'offre' => $offre,
                    'typeContrat' => $typeContrat,
        ));
    }
    
    
    public function deleteAction($id) {

        $em = $this->getDoctrine()->getEntityManager();

        $offre = $em->getRepository('ImieNetworkSiteBundle:Offre')->findBy($id);
        $em->remove($offre);
        $em->flush();
        
        return $this->redirect($this->generateUrl('offre'));
    }
}
