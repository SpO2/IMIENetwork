<?php

namespace ImieNetwork\SiteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use ImieNetwork\SiteBundle\Entity\Offre;
use ImieNetwork\SiteBundle\Form\OffreType;
use ImieNetwork\SiteBundle\Entity\Offreville;
use ImieNetwork\SiteBundle\Entity\Offrecomp;

/**
 * Offre controller.
 *
 */
class OffreController extends Controller
{

    /**
     * Lists all Offre entities.
     *
     */
    public function indexAction()
    {
        $user_id = 123;
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('ImieNetworkSiteBundle:Offre')->findByUtilisateur($user_id);

        return $this->render('ImieNetworkSiteBundle:Offre:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new Offre entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new Offre();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $utilisateur = $em->getRepository('ImieNetworkSiteBundle:Utilisateur')->find(123);
            $entity->setIdutilisateur($utilisateur);
            $idville = $entity->getIdVille();
            $idcompetence = $entity->getIdCompetence();
            
            $em->persist($entity);
            $em->flush();
            
            $idoffre = $entity->getId();
            
            $offreville = new Offreville();
            $ville = $em->getRepository('ImieNetworkSiteBundle:Ville')->find($idville);
            $offre = $em->getRepository('ImieNetworkSiteBundle:Offre')->find($idoffre);
            $offreville->setIdoffre($offre);
            $offreville->setIdville($ville);
            $em->persist($offreville);
            
            $offrecompetence = new Offrecomp();
            $competence = $em->getRepository('ImieNetworkSiteBundle:Competence')->find($idcompetence);
            $offre = $em->getRepository('ImieNetworkSiteBundle:Offre')->find($idoffre);
            $offrecompetence->setIdoffre($offre);
            $offrecompetence->setIdcompetence($competence);
            $em->persist($offrecompetence);
            
            $em->flush();
            
            
            return $this->redirect($this->generateUrl('offre_show', array('id' => $entity->getId())));
        }

        return $this->render('ImieNetworkSiteBundle:Offre:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a Offre entity.
    *
    * @param Offre $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(Offre $entity)
    {
        $form = $this->createForm(new OffreType(), $entity, array(
            'action' => $this->generateUrl('offre_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Offre entity.
     *
     */
    public function newAction()
    {
        $entity = new Offre();
        $em = $this->getDoctrine()->getManager();
        $utilisateur = $em->getRepository('ImieNetworkSiteBundle:Utilisateur')->find(123);
        $entity->setUtilisateur($utilisateur);
        $form   = $this->createCreateForm($entity);

        return $this->render('ImieNetworkSiteBundle:Offre:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Offre entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ImieNetworkSiteBundle:Offre')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Offre entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ImieNetworkSiteBundle:Offre:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing Offre entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ImieNetworkSiteBundle:Offre')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Offre entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('ImieNetworkSiteBundle:Offre:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a Offre entity.
    *
    * @param Offre $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Offre $entity)
    {
        $form = $this->createForm(new OffreType(), $entity, array(
            'action' => $this->generateUrl('offre_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Offre entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('ImieNetworkSiteBundle:Offre')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Offre entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $datemodification = new \DateTime();
            $entity->setDatemodification($datemodification);
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('offre_edit', array('id' => $id)));
        }

        return $this->render('ImieNetworkSiteBundle:Offre:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a Offre entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $iduser = "1";
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('ImieNetworkSiteBundle:Offre')->find($id);
            
            $offrecomp_id = $em->getRepository('ImieNetworkSiteBundle:Offrecomp')->findIdComp($entity->getId());
            $offrecomp = $em->getRepository('ImieNetworkSiteBundle:Offrecomp')->find($offrecomp_id['id']);
            
            $offreville_id = $em->getRepository('ImieNetworkSiteBundle:Offreville')->findIdVille($entity->getId());
            $offreville = $em->getRepository('ImieNetworkSiteBundle:Offreville')->find($offreville_id['id']);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Offre entity.');
            }
            /*if (!$offreville) {
                throw $this->createNotFoundException('Unable to find Offre offreville.');
            }
            if (!$offrecomp) {
                throw $this->createNotFoundException('Unable to find Offre offrecomp.');
            }
            if($entity->getIdUtilisateur()->getId() == $iduser)
            {*/
                $em->remove($offrecomp);
                $em->flush();
                $em->remove($offreville);
                $em->flush();
                $em->remove($entity);
                $em->flush();
            //}
        }

        return $this->redirect($this->generateUrl('offre'));
    }

    /**
     * Creates a form to delete a Offre entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('offre_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
    
    public function searchAction()
    {
        $em = $this->getDoctrine()->getManager();
        $datacompetence = $em->getRepository('ImieNetworkSiteBundle:Competence')->findAll();
        $dataville = $em->getRepository('ImieNetworkSiteBundle:Ville')->findAll();
        return $this->render('ImieNetworkSiteBundle:Offre:search.html.twig', array('datacompetence' => $datacompetence, 'dataville' => $dataville));
    }
    
    public function showsearchAction()
    {
        return new Response('bim');
        $request = Request::createFromGlobals();
        $resultsearch = $request->request->all();
        $em = $this->getDoctrine()->getManager();
        if($resultsearch['selectville'] == "empty" && $resultsearch['selectcompetence'] == "empty")
            return $this->redirect($this->generateUrl('offre_search'));
        $showresult = $em->getRepository('ImieNetworkSiteBundle:Offre')->findSearch($resultsearch['selectville'], $resultsearch['selectcompetence']);
    
        //$res = $em->getRepository('ImieNetworkSiteBundle:Offreville')->findByIdville(1);
        
        
        //return new Response($showresult);
        return $this->render('ImieNetworkSiteBundle:Offre:showsearch.html.twig', array('res' => $showresult));
    }
}