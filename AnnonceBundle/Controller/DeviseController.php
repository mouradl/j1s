<?php

namespace Tuni\AnnonceBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Tuni\AnnonceBundle\Entity\Devise;
use Tuni\AnnonceBundle\Form\DeviseType;
use Symfony\Component\HttpFoundation\Response;
/**
 * Devise controller.
 *
 * @Route("/Devise")
 */
class DeviseController extends Controller
{
    /**
     * Lists all Devise entities.
     *
     * @Route("/", name="Devise")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQueryBuilder();
        $query->select('a')
              ->from('TuniAnnonceBundle:Devise', 'a')
              ->getQuery()
              ;
        $paginator  = $this->get('knp_paginator');
    $pagination = $paginator->paginate(
        $query,
        $this->get('request')->query->get('page', 1)/*Devise number*/,
        10/*limit per page*/
    );
    $total = $query->select('COUNT(a)')
                    ->getQuery()
                    ->getSingleScalarResult();
        
        return array('page'=>'Devises','pagination' => $pagination,'total' => $total);

    }

    /**
     * Creates a new Devise entity.
     *
     * @Route("/", name="Devise_create")
     * @Method("POST")
     * @Template("TuniAnnonceBundle:Devise:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Devise();
        $form = $this->createForm(new DeviseType(), $entity);
        $form->bind($request);
        $this->get('session')->setFlash(
            'notice',
            ' ERREUR ,Veuillez saisir de nouveau les informations du Devise ! '
        );
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            
            $em->persist($entity);
            $em->flush();
                        $this->get('session')->setFlash(
                                                    'notice',
                                                     'Devise a été crée avec succée'
                                                  );
            return $this->redirect($this->generateUrl('Devise'));
            
        }

        return array('page'=>'Devises',
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Devise entity.
     *
     * @Route("/new", name="Devise_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Devise();
        $form   = $this->createForm(new DeviseType(), $entity);

        return array('page'=>'Devises',
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Devise entity.
     *
     * @Route("/{id}", name="Devise_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TuniAnnonceBundle:Devise')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Devise entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array('page'=>'Devises',
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Devise entity.
     *
     * @Route("/{id}/edit", name="Devise_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TuniAnnonceBundle:Devise')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Devise entity.');
        }

        $editForm = $this->createForm(new DeviseType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array('page'=>'Devises',
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Devise entity.
     *
     * @Route("/{id}", name="Devise_update")
     * @Method("GET")
     * @Template("TuniAnnonceBundle:Devise:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TuniAnnonceBundle:Devise')->find($id);
        
$this->get('session')->setFlash(
            'notice',
            ' ERREUR ,Veuillez saisir de nouveau les informations de la Devise ! '
        );
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Devise entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new DeviseType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
          
            $em->persist($entity);
            $em->flush();
             $this->get('session')->setFlash(
                                                    'notice',
                                                     'Devise a été modifié avec succée'
                                                  );
            return $this->redirect($this->generateUrl('Devise'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Devise entity.
     *
     * @Route("/{id}", name="Devise_delete")
     * @Method("GET")
     */
    public function deleteAction(Request $request, $id)
    {
        
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TuniAnnonceBundle:Devise')->find($id);
            $this->get('session')->setFlash(
            'notice',
            ' ERREUR de supprission du Devise ! '
        );
           
            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Devise entity.');
            }

            $em->remove($entity);
            $em->flush();
        $this->get('session')->setFlash(
                                                    'notice',
                                                     'Devise a été supprimé avec succée'
                                                  );
       
        return $this->redirect($this->generateUrl('Devise'));
    }

    /**
     * Creates a form to delete a Devise entity by id.
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
    
        /**
     * .
     *
     * @Route("/deleteliste", name="Devise_deleteliste")
     * @Method("post")
     *
     * @Template()
     */
    public function deletelisteAction() {
        $request = $this->get('request');
	 if ($request->isXMLHttpRequest())
        //if ('POST' == $request->getMethod())
         {
             $response = new Response();
      
       $em = $this->getDoctrine()->getEntityManager();
       
          $exist=FALSE;
            $repository = $this->getDoctrine()
                ->getEntityManager()
                ->getRepository('TuniAnnonceBundle:Devise');
            
            $Devises=$repository->findAll();
                    foreach ($Devises as $Devise) {
                    if(array_key_exists('admin_'.$Devise->getId(), $_POST)){
                            
                        if($_POST['admin_'.$Devise->getId()]){
                        $em->remove($Devise);
                        $em->flush();
                        $exist=TRUE;
                        }
                 }
                   
            
            }
            $this->get('session')->setFlash(
            'notice',
            'Pas de Devise à supprimer!'
        );
           
           if($exist) 
            $this->get('session')->setFlash(
            'notice',
            'Les Devises ont été supprimés avec succée'
        );
           
                       return $response;  
     }}
}
