<?php

namespace ImieNetwork\SiteBundle\Controller\Administration;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use ImieNetwork\SiteBundle\Entity\Groupe;
use ImieNetwork\SiteBundle\Form\GroupeType;

class GroupeController extends Controller {
#---------------------------------------------------------------------------------------------------
#           Actions du controller pour l'administration des groupes 
#---------------------------------------------------------------------------------------------------

#---------------------------------------------------------------------------------------------------
#          Retourne la liste des groupes
#---------------------------------------------------------------------------------------------------
public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ImieNetworkSiteBundle:Groupe')->findAll();

        return $this->render("@Administration/Groupe/index.html.twig", array(
            'entities' => $entities,
        ));
    }

#---------------------------------------------------------------------------------------------------
#          Page permettant d'accéder aux détails d'un groupe
#---------------------------------------------------------------------------------------------------
     public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ImieNetworkSiteBundle:Groupe')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Groupe entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render("@Administration/Groupe/show.html.twig", array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

#---------------------------------------------------------------------------------------------------
#          Page renvoyée pour l'ajout d'un groupe
#---------------------------------------------------------------------------------------------------
    public function newAction()
    {
        $entity = new Groupe();
        $form   = $this->createCreateForm($entity);

        return $this->render("@Administration/Groupe/new.html.twig", array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }
    
#---------------------------------------------------------------------------------------------------
#          Permet de créer un groupe
#---------------------------------------------------------------------------------------------------
    public function createAction(Request $request)
    {
        $entity = new Groupe();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('groupe_show', array('id' => $entity->getId())));
        }

        return $this->render("@Administration/Groupe/new.html.twig", array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }
    
#---------------------------------------------------------------------------------------------------
#          Crée le formulaire de création d'un groupe
#---------------------------------------------------------------------------------------------------
    private function createCreateFormGroupes(Groupe $entity)
    {
        $form = $this->createForm(new GroupeType(), $entity, array(
            'action' => $this->generateUrl('groupe_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

#---------------------------------------------------------------------------------------------------
#          Page permettant d'éditer les informations des groupes
#---------------------------------------------------------------------------------------------------
    public function editGroupesAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ImieNetworkSiteBundle:Groupe')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Groupe entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render("@Administration/Groupe/edit.html.twig", array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    
#---------------------------------------------------------------------------------------------------
#          Page permettant de mettre à jour les informations d'un groupe 
#---------------------------------------------------------------------------------------------------
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ImieNetworkSiteBundle:Groupe')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Groupe entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('groupe_edit', array('id' => $id)));
        }

        return $this->render("@Administration/Groupe/edit.html.twig", array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

#---------------------------------------------------------------------------------------------------
#          Crée le formulaire d'édition d'un groupe 
#---------------------------------------------------------------------------------------------------
    private function createEditForm(Groupe $entity)
    {
        $form = $this->createForm(new GroupeType(), $entity, array(
            'action' => $this->generateUrl('groupe_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

#---------------------------------------------------------------------------------------------------
#          Permet de supprimer un goupe en base
#---------------------------------------------------------------------------------------------------
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ImieNetworkSiteBundle:Groupe')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Groupe entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('groupe'));
    }
    
#---------------------------------------------------------------------------------------------------
#          Crée le formulaire de suppression d'un groupe
#---------------------------------------------------------------------------------------------------
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('groupe_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
