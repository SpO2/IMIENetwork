<?php

namespace ImieNetwork\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ImieNetwork\SiteBundle\Entity\Utilisateur;
use ImieNetwork\SiteBundle\Entity\Ville;
use ImieNetwork\SiteBundle\Entity\Experience;
use ImieNetwork\SiteBundle\Entity\Competence;
use ImieNetwork\SiteBundle\Entity\Utilisateurcompetence;
use ImieNetwork\SiteBundle\Entity\Promotion;

class EleveController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $limit = $this->container->getParameter("preview_default");

        $evenements = $em->getRepository('ImieNetworkSiteBundle:Evenement')->findAll($limit);
        $enquetes = $em->getRepository('ImieNetworkSiteBundle:Message')->findBy(array('type' => 'Enquête' ),
                                                                                array('datemessage' => 'desc'),
                                                                                $limit,
                                                                                0);
         
        return $this->render('ImieNetworkSiteBundle:Eleve:index.html.twig', array(
            'evenements' => $evenements,
            'enquetes' => $enquetes,
        ));
    }
    
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();

        $entity = $em->getRepository('ImieNetworkSiteBundle:Utilisateur')->find($id);
        
        if (!$entity) {
            throw $this->createNotFoundException('L\'utilisateur n\'existe pas');
        }
        
        $ville = new Ville(1, 'Rennes', '35000');
        $user = $entity; //new Utilisateur(1, 'Doe', 'John', '25 avenue de la paix', '0684256479', 1, 'JDoe', 'azerty', 'jdoe@gmail.com', $date, $date, 'Fr', 1);  
        $user->setVille($ville);
        
        // Liste des expèriences
        $experiences = array();
        array_push($experiences, new Experience(1, 'Stage1', new \DateTime(), new \DateTime(), 'Un super stage', $user));
        array_push($experiences, new Experience(1, 'Stage2', new \DateTime(), new \DateTime(), 'Un super stage', $user));
        array_push($experiences, new Experience(1, 'Stage3', new \DateTime(), new \DateTime(), 'Un super stage', $user));
        
        // Liste des compétences
        $competences1 = new Competence(1, 'PHP');
        $competences2 = new Competence(2, 'HTML5');
        $competences3 = new Competence(3, 'CSS3');
        
        // Liste des compétences User
        $userSkills = array();
        array_push($userSkills, new Utilisateurcompetence(1, 3, $user, $competences1));
        array_push($userSkills, new Utilisateurcompetence(2, 5, $user, $competences2));
        array_push($userSkills, new Utilisateurcompetence(3, 3, $user, $competences3));
        
        // Liste des promotions
        
        return $this->render('ImieNetworkSiteBundle:Eleve:showProfil.html.twig', array(
            'user' => $user,
            'experiences' => $experiences,
            'competences' => $userSkills,
        ));
    }   
    
}
