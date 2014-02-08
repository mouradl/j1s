<?php

namespace Tuni\AnnonceBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Tuni\AnnonceBundle\Entity\Social;
use Tuni\AnnonceBundle\Form\SocialType;
use Tuni\AnnonceBundle\Form\SocialEditType;
use Symfony\Component\HttpFoundation\Response;
/**
 * Social controller.
 *
 * @Route("/Social")
 */
class SocialController extends Controller
{
    /**
     * Lists all Social entities.
     *
     * @Route("/", name="Social")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQueryBuilder();
        $query->select('a')
              ->from('TuniAnnonceBundle:Social', 'a')
              ->getQuery()
              ;
        $paginator  = $this->get('knp_paginator');
    $pagination = $paginator->paginate(
        $query,
        $this->get('request')->query->get('page', 1)/*Social number*/,
        10/*limit per page*/
    );
    $total = $query->select('COUNT(a)')
                    ->getQuery()
                    ->getSingleScalarResult();
        
        return array('page'=>'Socials','pagination' => $pagination,'total' => $total);

    }

    /**
     * Creates a new Social entity.
     *
     * @Route("/", name="Social_create")
     * @Method("POST")
     * @Template("TuniAnnonceBundle:Social:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Social();
        $form = $this->createForm(new SocialType(), $entity);
        $form->bind($request);
        $this->get('session')->setFlash(
            'notice',
            ' ERREUR ,Veuillez saisir de nouveau les informations du Social ! '
        );
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            if($entity->getIcon()!=NULL)
            $entity->uploadImage();
            
            $em->persist($entity);
            $em->flush();
                        $this->get('session')->setFlash(
                                                    'notice',
                                                     'Social a été crée avec succée'
                                                  );
            return $this->redirect($this->generateUrl('Social'));
            
        }

        return array('page'=>'Socials',
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Social entity.
     *
     * @Route("/new", name="Social_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Social();
        $form   = $this->createForm(new SocialType(), $entity);

        return array('page'=>'Socials',
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Social entity.
     *
     * @Route("/{id}", name="Social_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TuniAnnonceBundle:Social')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Social entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array('page'=>'Socials',
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Social entity.
     *
     * @Route("/{id}/edit", name="Social_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TuniAnnonceBundle:Social')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Social entity.');
        }

        $editForm = $this->createForm(new SocialEditType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array('page'=>'Socials',
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Social entity.
     *
     * @Route("/{id}", name="Social_update")
     * @Method("GET")
     * @Template("TuniAnnonceBundle:Social:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TuniAnnonceBundle:Social')->find($id);
        $oldIcon=$entity->getIcon();
       
$this->get('session')->setFlash(
            'notice',
            ' ERREUR ,Veuillez saisir de nouveau les informations de la Social ! '
        );
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Social entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new SocialEditType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            if($entity->getIcon()!=NULL){
                    if($oldIcon!=NULL)
                        $entity->removeOldImage($oldIcon);
                    $entity->uploadImage();
                }else {
                    if($oldIcon!=NULL)
                        $entity->setIcon($oldIcon);
                }
            $em->persist($entity);
            $em->flush();
             $this->get('session')->setFlash(
                                                    'notice',
                                                     'Social a été modifié avec succée'
                                                  );
            return $this->redirect($this->generateUrl('Social'));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Social entity.
     *
     * @Route("/{id}", name="Social_delete")
     * @Method("GET")
     */
    public function deleteAction(Request $request, $id)
    {
        
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TuniAnnonceBundle:Social')->find($id);
            $this->get('session')->setFlash(
            'notice',
            ' ERREUR de supprission du Social ! '
        );
           
            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Social entity.');
            }

            $em->remove($entity);
            $em->flush();
        $this->get('session')->setFlash(
                                                    'notice',
                                                     'Social a été supprimé avec succée'
                                                  );
       
        return $this->redirect($this->generateUrl('Social'));
    }

    /**
     * Creates a form to delete a Social entity by id.
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
     * @Route("/deleteliste", name="Social_deleteliste")
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
                ->getRepository('TuniAnnonceBundle:Social');
            
            $Socials=$repository->findAll();
                    foreach ($Socials as $Social) {
                    if(array_key_exists('admin_'.$Social->getId(), $_POST)){
                            
                        if($_POST['admin_'.$Social->getId()]){
                        $em->remove($Social);
                        $em->flush();
                        $exist=TRUE;
                        }
                 }
                   
            
            }
            $this->get('session')->setFlash(
            'notice',
            'Pas de Social à supprimer!'
        );
           
           if($exist) 
            $this->get('session')->setFlash(
            'notice',
            'Les Socials ont été supprimés avec succée'
        );
           
                       return $response;  
     }}
}
