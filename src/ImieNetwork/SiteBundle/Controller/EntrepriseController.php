<?php

namespace ImieNetwork\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EntrepriseController extends Controller {

    public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        $limit = $this->container->getParameter("preview_default");

        $evenements = $em->getRepository('ImieNetworkSiteBundle:Evenement')->findAll($limit);
        $enquetes = $em->getRepository('ImieNetworkSiteBundle:Message')->findBy(array('type' => 'Enquête'), array('datemessage' => 'desc'), $limit, 0);

        return $this->render('ImieNetworkSiteBundle:Entreprise:index.html.twig', array(
                    'evenements' => $evenements,
                    'enquetes' => $enquetes,
        ));
    }


}
