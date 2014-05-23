<?php

namespace ImieNetwork\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use ImieNetwork\SiteBundle\Entity\Utilisateur;
use ImieNetwork\SiteBundle\Form\UtilisateurType;

class AdministrationController extends Controller
{
    public function indexUtilisateurAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ImieNetworkSiteBundle:Utilisateur')->findAll();
        
        return $this->render("@Administration\Utilisateur\index.html.twig",array(
            'entities' => $entities,
        ));
    }  
    public function newUtilisateurAction()
    {
        $entity = new Utilisateur();
        $form   = $this->createCreateFormUtilisateur($entity);

        return $this->render('@Administration\Utilisateur\new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }
    
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
    
    public function deleteUtilisateurAction(Request $request, $id)
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

        return $this->redirect($this->generateUrl('administrationutilisateurIndex'));
    }
    
    private function createCreateFormUtilisateur(Utilisateur $entity)
    {
        $form = $this->createForm(new UtilisateurType(), $entity, array(
            'action' => $this->generateUrl('admnistrationutilisateurnew'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }
    
    private function createEditFormUtilisateur(Utilisateur $entity)
    {
        $form = $this->createForm(new UtilisateurType(), $entity, array(
            'action' => $this->generateUrl('administrationutilisateuredit', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    
    private function createDeleteFormUtilisateur($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('administrationutilisateurdelete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm();
    }
}
