<?php

namespace ImieNetwork\SiteBundle\Controller;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ImieNetwork\SiteBundle\Entity\Utilisateur;
use ImieNetwork\SiteBundle\Form\UtilisateurType;

class AdministrationController extends Controller
{
    //Page d'accueil de l'administration
     public function indexAction()
    {
       // $em = $this->getDoctrine()->getManager();

       // $entities = $em->getRepository('ImieNetworkSiteBundle:Utilisateur')->findAll();
        
        return $this->render("@Administration\index.html.twig");
    }
    
    //Retourne la liste des utilisateurs
    public function indexUtilisateurAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ImieNetworkSiteBundle:Utilisateur')->findAll();
        
        return $this->render("@Administration\Utilisateur\index.html.twig",array(
            'entities' => $entities,
        ));
    }
    
    //Page permettant d'accéder aux détails d'un utilisateur
    public function showUtilisateurAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ImieNetworkSiteBundle:Utilisateur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Utilisateur entity.');
        }

        $deleteForm = $this->createDeleteFormUtilisateur($id);

        return $this->render('@Administration\Utilisateur\show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),));
    }
    
    //Page renvoyée pour l'ajout d'un utilisateur
    public function newUtilisateurAction()
    {
        $entity = new Utilisateur();
        $form   = $this->createCreateFormUtilisateur($entity);

        return $this->render('@Administration\Utilisateur\new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }
    
    //Permet de créer un utilisateur
    public function createUtilisateurAction(Request $request)
    {
        $entity = new Utilisateur();
        $form = $this->createCreateFormUtilisateur($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('administrationutilisateurshow', array('id' => $entity->getId())));
        }

        return $this->render("@Administration\Utilisateur/new.html.twig", array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }
    
    //Crée le formulaire de création d'un utilisateur
    private function createCreateFormUtilisateur(Utilisateur $entity)
    {
        $form = $this->createForm(new UtilisateurType(), $entity, array(
            'action' => $this->generateUrl('administrationutilisateurcreate'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }
    
    //Page permettant d'éditer les informations d'un utilisateur
    public function editUtilisateurAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ImieNetworkSiteBundle:Utilisateur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Utilisateur entity.');
        }

        $editForm = $this->createEditFormUtilisateur($entity);
        $deleteForm = $this->createDeleteFormUtilisateur($id);

        return $this->render("@Administration\Utilisateur/edit.html.twig", array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView()
        ));
    }
    
    //Page permettant de mettre à jour les informations d'un utilisateur 
    public function updateUtilisateurAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ImieNetworkSiteBundle:Utilisateur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Utilisateur entity.');
        }

        $deleteForm = $this->createDeleteFormUtilisateur($id);
        $editForm = $this->createEditFormUtilisateur($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('administrationutilisateuredit', array('id' => $id)));
        }

            return $this->render("@Administration\Utilisateur/edit.html.twig", array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    
        //Crée le formulaire d'édition d'un utilisateur
    private function createEditFormUtilisateur(Utilisateur $entity)
    {
        $form = $this->createForm(new UtilisateurType(), $entity, array(
            'action' => $this->generateUrl('administrationutilisateurupdate', array('id' => $entity->getId())),
            'method' => 'PUT',
        )); 

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    
    //Permet de supprimer un utilisateur en base
    public function deleteUtilisateurAction(Request $request, $id)
    {
        $form = $this->createDeleteFormUtilisateur($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ImieNetworkSiteBundle:Utilisateur')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Utilisateur entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('administrationutilisateurIndex'));
    }
    
    //Crée le formulaire de suppression d'un utilisateur
    private function createDeleteFormUtilisateur($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('administrationutilisateurdelete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm();
    }
}
