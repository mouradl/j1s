<?php

namespace Tuni\AnnonceBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Tuni\AnnonceBundle\Entity\Temoignage;
use Tuni\AnnonceBundle\Entity\Multichoix;
use Tuni\AnnonceBundle\Form\TemoignageType;
use Symfony\Component\HttpFoundation\Response;

/**
 * Temoignage controller.
 *
 * @Route("/temoignage")
 */
class TemoignageController extends Controller
{
    /**
     * Lists all Temoignage entities.
     *
     * @Route("/", name="temoignage")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQueryBuilder();
        $query->select('a')
              ->from('TuniAnnonceBundle:Temoignage', 'a')
              ->getQuery()
              ;
        $paginator  = $this->get('knp_paginator');
    $pagination = $paginator->paginate(
        $query,
        $this->get('request')->query->get('page', 1)/*page number*/,
        10/*limit per page*/
    );
    $total = $query->select('COUNT(a)')
                    ->getQuery()
                    ->getSingleScalarResult();
        
        return array('page'=>'Temoignage','pagination' => $pagination,'total' => $total);
    }

    /**
     * Creates a new Temoignage entity.
     *
     * @Route("/", name="temoignage_create")
     * @Method("POST")
     * @Template("TuniAnnonceBundle:Temoignage:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Temoignage();
        
        $form = $this->createForm(new TemoignageType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            
            $em->persist($entity);
            
            $em->flush();
                        $this->get('session')->setFlash(
                                                    'notice',
                                                     'Le temoignage a été crée avec succée'
                                                  );
            return $this->redirect($this->generateUrl('temoignage'));
            //return $this->redirect($this->generateUrl('temoignage_show', array('id' => $entity->getId())));
        }

        return array('page'=>'temoignage',
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Temoignage entity.
     *
     * @Route("/new", name="temoignage_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Temoignage();
        $form   = $this->createForm(new TemoignageType(), $entity);

        return array('page'=>'Temoignage',
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Temoignage entity.
     *
     * @Route("/{id}", name="temoignage_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TuniAnnonceBundle:Temoignage')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Temoignage entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array('page'=>'temoignage',
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Temoignage entity.
     *
     * @Route("/{id}/edit", name="temoignage_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TuniAnnonceBundle:Temoignage')->find($id);
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Temoignage entity.');
        }

        $editForm = $this->createForm(new TemoignageType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array('page'=>'temoignage',
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Temoignage entity.
     *
     * @Route("/{id}", name="temoignage_update")
     * @Method("POST")
     * @Template("TuniAnnonceBundle:Temoignage:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {$em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TuniAnnonceBundle:Temoignage')->find($id);
$this->get('session')->setFlash(
            'notice',
            ' ERREUR ,Veuillez saisir de nouveau les informations de temoignage ! '
        );
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Temoignage entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new TemoignageType(), $entity);
        $editForm->bind($request);

        if (TRUE) {
            $em->persist($entity);
            $em->flush();
             $this->get('session')->setFlash(
                                                    'notice',
                                                     'La temoignage a été modifié avec succée'
                                                  );
            return $this->redirect($this->generateUrl('temoignage'));
        }

        return array('page'=>'temoignage',
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Temoignage entity.
     *
     * @Route("/{id}/delete", name="temoignage_delete")
     * @Method("GET")
     */
    public function deleteAction(Request $request, $id)
    { 
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TuniAnnonceBundle:Temoignage')->find($id);
             $this->get('session')->setFlash(
            'notice',
            ' ERREUR de supprission de temoignage ! '
        );
            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Temoignage entity.');
            }
             
            $em->remove($entity);
            $em->flush();
        $this->get('session')->setFlash(
                                                    'notice',
                                                     'Le temoignage a été supprimé avec succée'
                                                  );
       

        return $this->redirect($this->generateUrl('temoignage'));
    }

    /**
     * Creates a form to delete a Temoignage entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder(array('id' => $id))
            ->add('id', 'hidden')
            ->getForm()
        ;
    }
}
