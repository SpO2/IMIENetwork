<?php

namespace ImieNetwork\SiteBundle\Controller\Entreprise;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class OffreEleveController extends Controller {

    public function indexAction() {
        return $this->render('@Entreprise/OffreEleve/index.html.twig');
    }
    public function showAction() {
        return $this->render('@Entreprise/OffreEleve/show.html.twig');
    }
}
