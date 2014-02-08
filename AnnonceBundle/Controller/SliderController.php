<?php

namespace Tuni\AnnonceBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Tuni\AnnonceBundle\Entity\Slider;
use Tuni\AnnonceBundle\Form\SliderType;
use Tuni\AnnonceBundle\Form\SliderEditType;
use Symfony\Component\HttpFoundation\Response;
/**
 * Slider controller.
 *
 * @Route("/Slider")
 */
class SliderController extends Controller
{
    /**
     * Lists all Slider entities.
     *
     * @Route("/", name="Slider")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQueryBuilder();
        $query->select('a')
              ->from('TuniAnnonceBundle:Slider', 'a')
              ->getQuery()
              ;
        $paginator  = $this->get('knp_paginator');
    $pagination = $paginator->paginate(
        $query,
        $this->get('request')->query->get('page', 1)/*Slider number*/,
        10/*limit per page*/
    );
    $total = $query->select('COUNT(a)')
                    ->getQuery()
                    ->getSingleScalarResult();
        
        return array('page'=>'Sliders','pagination' => $pagination,'total' => $total);

    }

    /**
     * Creates a new Slider entity.
     *
     * @Route("/", name="Slider_create")
     * @Method("POST")
     * @Template("TuniAnnonceBundle:Slider:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Slider();
        $form = $this->createForm(new SliderType(), $entity);
        $form->bind($request);
        $this->get('session')->setFlash(
            'notice',
            ' ERREUR ,Veuillez saisir de nouveau les informations du Slide ! '
        );
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            if($entity->getImg()!=NULL)
            $entity->uploadImage();
            
            $em->persist($entity);
            $em->flush();
                        $this->get('session')->setFlash(
                                                    'notice',
                                                     'Slide a été crée avec succée'
                                                  );
            return $this->redirect($this->generateUrl('Slider'));
            
        }

        return array('page'=>'Sliders',
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Slider entity.
     *
     * @Route("/new", name="Slider_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Slider();
        $form   = $this->createForm(new SliderType(), $entity);

        return array('page'=>'Sliders',
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Slider entity.
     *
     * @Route("/{id}", name="Slider_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TuniAnnonceBundle:Slider')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Slider entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array('page'=>'Sliders',
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Slider entity.
     *
     * @Route("/{id}/edit", name="Slider_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TuniAnnonceBundle:Slider')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Slider entity.');
        }

        $editForm = $this->createForm(new SliderEditType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array('page'=>'Sliders',
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Slider entity.
     *
     * @Route("/{id}", name="Slider_update")
     * @Method("GET")
     * @Template("TuniAnnonceBundle:Slider:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {try{
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TuniAnnonceBundle:Slider')->find($id);
        $oldImg=$entity->getImg();
       
$this->get('session')->setFlash(
            'notice',
            ' ERREUR ,Veuillez saisir de nouveau les informations de la Slider ! '
        );
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Slider entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new SliderEditType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            if($entity->getImg()!=NULL){
                    if($oldImg!=NULL&&$oldImg!="")
                        $entity->removeOldImage($oldImg);
                    $entity->uploadImage();
                }else {
                    if($oldImg!=NULL)
                        $entity->setImg($oldImg);
                }
            $em->persist($entity);
            $em->flush();
             $this->get('session')->setFlash(
                                                    'notice',
                                                     'Slider a été modifié avec succée'
                                                  );
            return $this->redirect($this->generateUrl('Slider'));
        }
            return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ); 
                }
catch (Exception $e){
 $this->get('session')->setFlash(
                                                    'notice',
                                                     'Erreur de modification du slider'
                                                  );
            return $this->redirect($this->generateUrl('Slider'));
            }
        
       
    }

    /**
     * Deletes a Slider entity.
     *
     * @Route("/{id}", name="Slider_delete")
     * @Method("GET")
     */
    public function deleteAction(Request $request, $id)
    {
        
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TuniAnnonceBundle:Slider')->find($id);
            $this->get('session')->setFlash(
            'notice',
            ' ERREUR de supprission du Slide ! '
        );
           
            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Slider entity.');
            }

            $em->remove($entity);
            $em->flush();
        $this->get('session')->setFlash(
                                                    'notice',
                                                     'Slide a été supprimé avec succée'
                                                  );
       
        return $this->redirect($this->generateUrl('Slider'));
    }

    /**
     * Creates a form to delete a Slider entity by id.
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
     * @Route("/deleteliste", name="Slider_deleteliste")
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
                ->getRepository('TuniAnnonceBundle:Slider');
            
            $Sliders=$repository->findAll();
                    foreach ($Sliders as $Slider) {
                    if(array_key_exists('admin_'.$Slider->getId(), $_POST)){
                            
                        if($_POST['admin_'.$Slider->getId()]){
                        $em->remove($Slider);
                        $em->flush();
                        $exist=TRUE;
                        }
                 }
                   
            
            }
            $this->get('session')->setFlash(
            'notice',
            'Pas de Slider à supprimer!'
        );
           
           if($exist) 
            $this->get('session')->setFlash(
            'notice',
            'Les Sliders ont été supprimés avec succée'
        );
           
                       return $response;  
     }}
}
