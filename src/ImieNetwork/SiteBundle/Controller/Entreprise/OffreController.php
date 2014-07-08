<?php

namespace ImieNetwork\SiteBundle\Controller\Entreprise;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class OffreController extends Controller {

    public function indexAction() {
        return $this->render('@Entreprise/Offre/index.html.twig');
    }
    public function showAction() {
        return $this->render('@Entreprise/Offre/show.html.twig');
    }
}
