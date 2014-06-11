<?php

namespace ImieNetwork\SiteBundle\Controller\Administration;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use ImieNetwork\SiteBundle\Entity\Groupe;
use ImieNetwork\SiteBundle\Entity\Utilisateur;
use ImieNetwork\SiteBundle\Form\UtilisateurType;

class UtilisateurController extends Controller {
#---------------------------------------------------------------------------------------------------
#           Action du controller pour l'administration des utilisateurs 
#---------------------------------------------------------------------------------------------------

#---------------------------------------------------------------------------------------------------
#          Retourne la liste des utilisateurs
#---------------------------------------------------------------------------------------------------
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ImieNetworkSiteBundle:Utilisateur')->findAll();
        
        $groupeentities = $em->getRepository('ImieNetworkSiteBundle:Groupe')->findAll();
        
        $groupeutilisateurentites = $em->getRepository('ImieNetworkSiteBundle:Groupeutilisateur')->findAll();
        
        return $this->render("@Administration/Utilisateur\index.html.twig",array(
            'entities' => $entities,
            'groupeentitie' => $groupeentities,
            'groupeutilisateurentities' => $groupeutilisateurentites,
        ));
    }
    
#---------------------------------------------------------------------------------------------------
#          Page permettant d'accéder aux détails d'un utilisateur
#---------------------------------------------------------------------------------------------------
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ImieNetworkSiteBundle:Utilisateur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Utilisateur entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('@Administration/Utilisateur\show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),));
    }
 
#---------------------------------------------------------------------------------------------------
#          Page renvoyée pour l'ajout d'un utilisateur
#---------------------------------------------------------------------------------------------------
    public function newAction()
    {
        $entity = new Utilisateur();
        $em = $this->getDoctrine()->getManager();
        $groupentities = $em->getRepository('ImieNetworkSiteBundle:Groupe')->findAll();
        $form   = $this->createCreateForm($entity);

        return $this->render('@Administration/Utilisateur\new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
            'groupentities' => $groupentities,
        ));
    }

#---------------------------------------------------------------------------------------------------
#          Permet de créer un utilisateur
#---------------------------------------------------------------------------------------------------
    public function createAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = new Utilisateur();
        $groupeutilisateurentity = new \ImieNetwork\SiteBundle\Entity\Groupeutilisateur();
        $groupe =  $request->request->get('toto');
        
        $groupid =  $em->getRepository('ImieNetworkSiteBundle:Groupe')->find($groupe);
        var_dump($groupe);
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);
        
        $groupeutilisateurentity->setIdgroupe($groupid);
        
        if ($form->isValid()) {
            $em->persist($entity);
            $groupeutilisateurentity->setIdutilisateur($entity);
            $em->persist($groupeutilisateurentity);
            $em->flush();

            return $this->redirect($this->generateUrl('utilisateur_show', array('id' => $entity->getId())));
        }

        return $this->render("@Administration/Utilisateur/new.html.twig", array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }
 
#---------------------------------------------------------------------------------------------------
#          Crée le formulaire de création d'un utilisateur
#---------------------------------------------------------------------------------------------------
    private function createCreateForm(Utilisateur $entity)
    {
        $form = $this->createForm(new UtilisateurType(), $entity, array(
            'action' => $this->generateUrl('utilisateur_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }
 
#---------------------------------------------------------------------------------------------------
#          Page permettant d'éditer les informations d'un utilisateur
#---------------------------------------------------------------------------------------------------
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ImieNetworkSiteBundle:Utilisateur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Utilisateur entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render("@Administration/Utilisateur/edit.html.twig", array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView()
        ));
    }
 
#---------------------------------------------------------------------------------------------------
#          Page permettant de mettre à jour les informations d'un utilisateur 
#---------------------------------------------------------------------------------------------------
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ImieNetworkSiteBundle:Utilisateur')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Utilisateur entity.');
        }
       
        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $entity->setNom('FAFA');
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('utilisateur_edit', array('id' => $id)));
        }

            return $this->render("@Administration/Utilisateur/edit.html.twig", array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

#---------------------------------------------------------------------------------------------------
#          Crée le formulaire d'édition d'un utilisateur 
#---------------------------------------------------------------------------------------------------
    private function createEditForm(Utilisateur $entity)
    {
        $form = $this->createForm(new UtilisateurType(), $entity, array(
            'action' => $this->generateUrl('utilisateur_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        )); 

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
 
#---------------------------------------------------------------------------------------------------
#          Permet de supprimer un utilisateur en base
#---------------------------------------------------------------------------------------------------
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
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

        return $this->redirect($this->generateUrl('utilisateur'));
    }

#---------------------------------------------------------------------------------------------------
#          Crée le formulaire de suppression d'un utilisateur
#---------------------------------------------------------------------------------------------------
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('utilisateur_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm();
    }
}
