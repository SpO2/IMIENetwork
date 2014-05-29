<?php

namespace ImieNetwork\SiteBundle\Controller\Administration;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use ImieNetwork\SiteBundle\Entity\Promotion;
use ImieNetwork\SiteBundle\Form\PromotionType;


class PromotionController extends Controller {
#---------------------------------------------------------------------------------------------------
#           Actions du controller pour l'administration des promotions 
#---------------------------------------------------------------------------------------------------

#---------------------------------------------------------------------------------------------------
#          Retourne la liste des promotions
#---------------------------------------------------------------------------------------------------
public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ImieNetworkSiteBundle:Promotion')->findAll();

        return $this->render("@Administration/Promotion/index.html.twig", array(
            'entities' => $entities,
        ));
    }
 
#---------------------------------------------------------------------------------------------------
#          Page permettant d'accéder aux détails d'une promotion
#---------------------------------------------------------------------------------------------------
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ImieNetworkSiteBundle:Promotion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Promotion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render("@Administration/Promotion/show.html.twig", array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }
    
#---------------------------------------------------------------------------------------------------
#          Page renvoyée pour l'ajout d'une promotion
#---------------------------------------------------------------------------------------------------
    public function newAction()
    {
        $entity = new Promotion();
        $form   = $this->createCreateForm($entity);

        return $this->render("@Administration/Promotion/new.html.twig", array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }
    
#---------------------------------------------------------------------------------------------------
#          Permet de créer une promotion
#---------------------------------------------------------------------------------------------------
    public function createAction(Request $request)
    {
        $entity = new Promotion();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('promotion_show', array('id' => $entity->getId())));
        }

        return $this->render("@Administration/Promotion/new.html.twig", array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }
    
#---------------------------------------------------------------------------------------------------
#          Crée le formulaire de création d'une promotion
#---------------------------------------------------------------------------------------------------
    private function createCreateForm(Promotion $entity)
    {
        $form = $this->createForm(new PromotionType(), $entity, array(
            'action' => $this->generateUrl('promotion_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }
   
#---------------------------------------------------------------------------------------------------
#          Page permettant d'éditer les informations d'une promotion
#---------------------------------------------------------------------------------------------------
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ImieNetworkSiteBundle:Promotion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Promotion entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render("@Administration/Promotion/edit.html.twig", array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
 
#---------------------------------------------------------------------------------------------------
#          Page permettant de mettre à jour les informations d'une promotion 
#---------------------------------------------------------------------------------------------------
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ImieNetworkSiteBundle:Promotion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Promotion entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('promotion_edit', array('id' => $id)));
        }

        return $this->render("@Administration/Promotion/edit.html.twig", array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

#---------------------------------------------------------------------------------------------------
#          Crée le formulaire d'édition d'une promotion 
#---------------------------------------------------------------------------------------------------
    private function createEditForm(Promotion $entity)
    {
        $form = $this->createForm(new PromotionType(), $entity, array(
            'action' => $this->generateUrl('promotion_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    
#---------------------------------------------------------------------------------------------------
#          Permet de supprimer une promotion en base
#---------------------------------------------------------------------------------------------------
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ImieNetworkSiteBundle:Promotion')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Promotion entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('promotion'));
    }
 
#---------------------------------------------------------------------------------------------------
#          Crée le formulaire de suppression d'une promotion
#---------------------------------------------------------------------------------------------------
     private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('promotion_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
