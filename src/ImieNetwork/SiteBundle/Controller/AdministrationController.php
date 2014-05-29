<?php

namespace ImieNetwork\SiteBundle\Controller;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ImieNetwork\SiteBundle\Entity\Utilisateur;
use ImieNetwork\SiteBundle\Form\UtilisateurType;
use ImieNetwork\SiteBundle\Entity\Groupe;
use ImieNetwork\SiteBundle\Form\GroupeType;
use ImieNetwork\SiteBundle\Entity\Promotion;
use ImieNetwork\SiteBundle\Form\PromotionType;

class AdministrationController extends Controller
{
    //Page d'accueil de l'administration
     public function indexAction()
    {
       // $em = $this->getDoctrine()->getManager();

       // $entities = $em->getRepository('ImieNetworkSiteBundle:Utilisateur')->findAll();
        
        return $this->render("@Administration\index.html.twig");
    }

#---------------------------------------------------------------------------------------------------
#           Action du controller pour l'administration des utilisateurs 
#---------------------------------------------------------------------------------------------------

#---------------------------------------------------------------------------------------------------
#          Retourne la liste des utilisateurs
#---------------------------------------------------------------------------------------------------
    public function indexUtilisateurAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ImieNetworkSiteBundle:Utilisateur')->findAll();
        
        return $this->render("@Administration\Utilisateur\index.html.twig",array(
            'entities' => $entities,
        ));
    }
    
#---------------------------------------------------------------------------------------------------
#          Page permettant d'accéder aux détails d'un utilisateur
#---------------------------------------------------------------------------------------------------
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
 
#---------------------------------------------------------------------------------------------------
#          Page renvoyée pour l'ajout d'un utilisateur
#---------------------------------------------------------------------------------------------------
    public function newUtilisateurAction()
    {
        $entity = new Utilisateur();
        $form   = $this->createCreateFormUtilisateur($entity);

        return $this->render('@Administration\Utilisateur\new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

#---------------------------------------------------------------------------------------------------
#          Permet de créer un utilisateur
#---------------------------------------------------------------------------------------------------
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
 
#---------------------------------------------------------------------------------------------------
#          Crée le formulaire de création d'un utilisateur
#---------------------------------------------------------------------------------------------------
    private function createCreateFormUtilisateur(Utilisateur $entity)
    {
        $form = $this->createForm(new UtilisateurType(), $entity, array(
            'action' => $this->generateUrl('administrationutilisateurcreate'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }
 
#---------------------------------------------------------------------------------------------------
#          Page permettant d'éditer les informations d'un utilisateur
#---------------------------------------------------------------------------------------------------
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
 
#---------------------------------------------------------------------------------------------------
#          Page permettant de mettre à jour les informations d'un utilisateur 
#---------------------------------------------------------------------------------------------------
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

#---------------------------------------------------------------------------------------------------
#          Crée le formulaire d'édition d'un utilisateur 
#---------------------------------------------------------------------------------------------------
    private function createEditFormUtilisateur(Utilisateur $entity)
    {
        $form = $this->createForm(new UtilisateurType(), $entity, array(
            'action' => $this->generateUrl('administrationutilisateurupdate', array('id' => $entity->getId())),
            'method' => 'PUT',
        )); 

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
 
#---------------------------------------------------------------------------------------------------
#          Permet de supprimer un utilisateur en base
#---------------------------------------------------------------------------------------------------
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

#---------------------------------------------------------------------------------------------------
#          Crée le formulaire de suppression d'un utilisateur
#---------------------------------------------------------------------------------------------------
    private function createDeleteFormUtilisateur($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('administrationutilisateurdelete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm();
    }

#---------------------------------------------------------------------------------------------------
#           Actions du controller pour l'administration des promotions 
#---------------------------------------------------------------------------------------------------

#---------------------------------------------------------------------------------------------------
#          Retourne la liste des promotions
#---------------------------------------------------------------------------------------------------
public function indexPromotionAction()
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
    public function showPromotionAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ImieNetworkSiteBundle:Promotion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Promotion entity.');
        }

        $deleteForm = $this->createDeleteFormPromotion($id);

        return $this->render("@Administration/Promotion/show.html.twig", array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }
    
#---------------------------------------------------------------------------------------------------
#          Page renvoyée pour l'ajout d'une promotion
#---------------------------------------------------------------------------------------------------
    public function newPromotionAction()
    {
        $entity = new Promotion();
        $form   = $this->createCreateFormPromotion($entity);

        return $this->render("@Administration/Promotion/new.html.twig", array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }
    
#---------------------------------------------------------------------------------------------------
#          Permet de créer une promotion
#---------------------------------------------------------------------------------------------------
    public function createPromotionAction(Request $request)
    {
        $entity = new Promotion();
        $form = $this->createCreateFormPromotion($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('administrationpromotionshow', array('id' => $entity->getId())));
        }

        return $this->render("@Administration/Promotion/new.html.twig", array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }
    
#---------------------------------------------------------------------------------------------------
#          Crée le formulaire de création d'une promotion
#---------------------------------------------------------------------------------------------------
    private function createCreateFormPromotion(Promotion $entity)
    {
        $form = $this->createForm(new PromotionType(), $entity, array(
            'action' => $this->generateUrl('administrationpromotioncreate'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }
   
#---------------------------------------------------------------------------------------------------
#          Page permettant d'éditer les informations d'une promotion
#---------------------------------------------------------------------------------------------------
    public function editPromotionAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ImieNetworkSiteBundle:Promotion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Promotion entity.');
        }

        $editForm = $this->createEditFormPromotion($entity);
        $deleteForm = $this->createDeleteFormPromotion($id);

        return $this->render("@Administration/Promotion/edit.html.twig", array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
 
#---------------------------------------------------------------------------------------------------
#          Page permettant de mettre à jour les informations d'une promotion 
#---------------------------------------------------------------------------------------------------
    public function updatePromotionAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ImieNetworkSiteBundle:Promotion')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Promotion entity.');
        }

        $deleteForm = $this->createDeleteFormPromotion($id);
        $editForm = $this->createEditFormPromotion($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('administrationpromotionedit', array('id' => $id)));
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
    private function createEditFormPromotion(Promotion $entity)
    {
        $form = $this->createForm(new PromotionType(), $entity, array(
            'action' => $this->generateUrl('administrationpromotionupdate', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    
#---------------------------------------------------------------------------------------------------
#          Permet de supprimer une promotion en base
#---------------------------------------------------------------------------------------------------
    public function deletePromotionAction(Request $request, $id)
    {
        $form = $this->createDeleteFormPromotion($id);
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

        return $this->redirect($this->generateUrl('administrationpromotionIndex'));
    }
 
#---------------------------------------------------------------------------------------------------
#          Crée le formulaire de suppression d'une promotion
#---------------------------------------------------------------------------------------------------
     private function createDeleteFormPromotion($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('administrationpromotiondelete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
    
#---------------------------------------------------------------------------------------------------
#           Actions du controller pour l'administration des groupes 
#---------------------------------------------------------------------------------------------------

#---------------------------------------------------------------------------------------------------
#          Retourne la liste des groupes
#---------------------------------------------------------------------------------------------------
public function indexGroupesAction()
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
     public function showGroupesAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ImieNetworkSiteBundle:Groupe')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Groupe entity.');
        }

        $deleteForm = $this->createDeleteFormGroupes($id);

        return $this->render("@Administration/Groupe/show.html.twig", array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

#---------------------------------------------------------------------------------------------------
#          Page renvoyée pour l'ajout d'un groupe
#---------------------------------------------------------------------------------------------------
    public function newGroupesAction()
    {
        $entity = new Groupe();
        $form   = $this->createCreateFormGroupes($entity);

        return $this->render("@Administration/Groupe/new.html.twig", array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }
    
#---------------------------------------------------------------------------------------------------
#          Permet de créer un groupe
#---------------------------------------------------------------------------------------------------
    public function createGroupesAction(Request $request)
    {
        $entity = new Groupe();
        $form = $this->createCreateFormGroupes($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('administrationgroupeshow', array('id' => $entity->getId())));
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
            'action' => $this->generateUrl('administrationgroupecreate'),
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

        $editForm = $this->createEditFormGroupes($entity);
        $deleteForm = $this->createDeleteFormGroupes($id);

        return $this->render("@Administration/Groupe/edit.html.twig", array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    
#---------------------------------------------------------------------------------------------------
#          Page permettant de mettre à jour les informations d'un groupe 
#---------------------------------------------------------------------------------------------------
    public function updateGroupesAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ImieNetworkSiteBundle:Groupe')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Groupe entity.');
        }

        $deleteForm = $this->createDeleteFormGroupes($id);
        $editForm = $this->createEditFormGroupes($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('administrationgroupeedit', array('id' => $id)));
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
    private function createEditFormGroupes(Groupe $entity)
    {
        $form = $this->createForm(new GroupeType(), $entity, array(
            'action' => $this->generateUrl('administrationgroupeupdate', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

#---------------------------------------------------------------------------------------------------
#          Permet de supprimer un goupe en base
#---------------------------------------------------------------------------------------------------
    public function deleteGroupesAction(Request $request, $id)
    {
        $form = $this->createDeleteFormGroupes($id);
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

        return $this->redirect($this->generateUrl('administrationgroupeIndex'));
    }
    
#---------------------------------------------------------------------------------------------------
#          Crée le formulaire de suppression d'un groupe
#---------------------------------------------------------------------------------------------------
    private function createDeleteFormGroupes($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('administrationgroupedelete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}