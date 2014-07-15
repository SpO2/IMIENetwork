<?php

namespace ImieNetwork\SiteBundle\Controller\Administration;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use ImieNetwork\SiteBundle\Entity\Typecontrat;
use ImieNetwork\SiteBundle\Form\TypecontratType;

/**
 * Typecontrat controller.
 *
 */
class TypecontratController extends Controller
{

    /**
     * Lists all Typecontrat entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ImieNetworkSiteBundle:Typecontrat')->findAll();

        return $this->render("@Administration/Typecontrat/index.html.twig", array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Typecontrat entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Typecontrat();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('typecontrat_show', array('id' => $entity->getId())));
        }

        return $this->render("@Administration/Typecontratnew.html.twig", array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Typecontrat entity.
    *
    * @param Typecontrat $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Typecontrat $entity)
    {
        $form = $this->createForm(new TypecontratType(), $entity, array(
            'action' => $this->generateUrl('typecontrat_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Typecontrat entity.
     *
     */
    public function newAction()
    {
        $entity = new Typecontrat();
        $form   = $this->createCreateForm($entity);

        return $this->render("@Administration/Typecontrat/new.html.twig", array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Typecontrat entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ImieNetworkSiteBundle:Typecontrat')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Typecontrat entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render("@Administration/Typecontrat/show.html.twig", array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Typecontrat entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ImieNetworkSiteBundle:Typecontrat')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Typecontrat entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render("@Administration/Typecontrat/edit.html.twig", array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Typecontrat entity.
    *
    * @param Typecontrat $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Typecontrat $entity)
    {
        $form = $this->createForm(new TypecontratType(), $entity, array(
            'action' => $this->generateUrl('typecontrat_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Typecontrat entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ImieNetworkSiteBundle:Typecontrat')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Typecontrat entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('typecontrat_edit', array('id' => $id)));
        }

        return $this->render("@Administration/Typecontrat/edit.html.twig", array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Typecontrat entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ImieNetworkSiteBundle:Typecontrat')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Typecontrat entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('typecontrat'));
    }

    /**
     * Creates a form to delete a Typecontrat entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('typecontrat_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
