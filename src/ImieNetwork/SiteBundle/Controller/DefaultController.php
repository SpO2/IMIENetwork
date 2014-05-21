<?php

namespace ImieNetwork\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ImieNetwork\SiteBundle\Entity\Utilisateur;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('ImieNetworkSiteBundle:Default:index.html.twig', array('name' => $name));
    }
    public function testAction() {
        /*$user = new Utilisateur();
        $user->setNom("toto");
        $user->setPrenom("test");
        $em = $this->getDoctrine()->getEntityManager();
        $em->persist($user);
        $em->flush();*/
        return $this->render('ImieNetworkSiteBundle:Default:testing.html.twig', array('name' => "test"));
    }
}
