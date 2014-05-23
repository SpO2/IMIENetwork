<?php

namespace ImieNetwork\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ImieNetwork\SiteBundle\Entity\Utilisateur;

class AdministrationController extends Controller {

    public function indexAction() {
        return $this->render('ImieNetworkSiteBundle:Administration:index.html.twig');
    }


}
