<?php

namespace ImieNetwork\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ImieNetwork\SiteBundle\Entity\Utilisateur;
use ImieNetwork\SiteBundle\Entity\Ville;
use ImieNetwork\SiteBundle\Entity\Experience;
use ImieNetwork\SiteBundle\Entity\Competence;
use ImieNetwork\SiteBundle\Entity\Utilisateurcompetence;
use ImieNetwork\SiteBundle\Entity\Promotion;

use ImieNetwork\SiteBundle\Form\ProfilType;

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
    
    public function showprofilAction()
    {
        $id = 123;
        $em = $this->getDoctrine()->getManager();
        $data = $em->getRepository('ImieNetworkSiteBundle:Utilisateur')->findById($id);
        $competence = $em->getRepository('ImieNetworkSiteBundle:Utilisateurcompetence')->findByUtilisateur($data);
        return $this->render('ImieNetworkSiteBundle:Eleve:show.html.twig', array(
            'data' => $data,
            'competences' => $competence,
        ));
    }
    
    public function editprofilAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ImieNetworkSiteBundle:Utilisateur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Expense entity.');
        }

        $editForm = $this->createprofilEditForm($entity);

        return $this->render('ImieNetworkSiteBundle:Eleve:editprofil.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        ));
    }
    
    private function createprofilEditForm(Utilisateur $entity)
    {
        $form = $this->createForm(new ProfilType(), $entity, array(
            'action' => $this->generateUrl('eleve_profil_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    
    public function updateprofilAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ImieNetworkSiteBundle:Utilisateur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Expense entity.');
        }

        $editForm = $this->createprofilEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) 
        {
            $datemodification = new \DateTime();
            $entity->setDatemodification($datemodification);                    
            $em->flush();

            return $this->redirect($this->generateUrl('eleve_profil'));
        }

        return $this->render('ImieNetworkSiteBundle:Eleve:editprofil.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        ));
    }
    
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

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
    
    public function changePasswordAction()
    {
        return $this->render('ImieNetworkSiteBundle:ChangePassword:changepassword.html.twig');
    }  
    
}
