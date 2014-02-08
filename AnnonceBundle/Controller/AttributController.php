<?php

namespace Tuni\AnnonceBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Tuni\AnnonceBundle\Entity\Attribut;
use Tuni\AnnonceBundle\Entity\Multichoix;
use Tuni\AnnonceBundle\Form\AttributType;
use Symfony\Component\HttpFoundation\Response;
/**
 * Attribut controller.
 *
 * @Route("/attribut")
 */
class AttributController extends Controller
{
    /**
     * Lists all Attribut entities.
     *
     * @Route("/", name="attribut")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQueryBuilder();
        $query->select('a')
              ->from('TuniAnnonceBundle:Attribut', 'a')
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
        
        return array('page'=>'categories_att','pagination' => $pagination,'total' => $total);
    }

    /**
     * Creates a new Attribut entity.
     *
     * @Route("/", name="attribut_create")
     * @Method("POST")
     * @Template("TuniAnnonceBundle:Attribut:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Attribut();
        
        $form = $this->createForm(new AttributType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            
            $em->persist($entity);
            if($entity->getIsSelectbox()){
            if($request->get('val')){
                $choises=$request->get('val');
                foreach ($choises as $ch) {
                    $Choix  = new Multichoix();
                    $Choix->setVal($ch);
                    $Choix->setAttribut($entity);
                     $em->persist($Choix);
                }
            }
            
                }
            $em->flush();
                        $this->get('session')->setFlash(
                                                    'notice',
                                                     'L\'attribut a été crée avec succée'
                                                  );
            return $this->redirect($this->generateUrl('attribut'));
            //return $this->redirect($this->generateUrl('attribut_show', array('id' => $entity->getId())));
        }

        return array('page'=>'attribut',
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Attribut entity.
     *
     * @Route("/new", name="attribut_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Attribut();
        $form   = $this->createForm(new AttributType(), $entity);

        return array('page'=>'add_categorie_att',
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Attribut entity.
     *
     * @Route("/{id}", name="attribut_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TuniAnnonceBundle:Attribut')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Attribut entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array('page'=>'attribut',
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Attribut entity.
     *
     * @Route("/{id}/edit", name="attribut_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TuniAnnonceBundle:Attribut')->find($id);
        $repository = $this->getDoctrine()
                                        ->getManager()
                                        ->getRepository('TuniAnnonceBundle:Multichoix'); 
                         $Multichoix=$repository->findBy(array('attribut' => $entity->getId()));
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Attribut entity.');
        }

        $editForm = $this->createForm(new AttributType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array('page'=>'attribut',
            'entity'      => $entity,
            'Multichoix'      => $Multichoix,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Attribut entity.
     *
     * @Route("/{id}", name="attribut_update")
     * @Method("POST")
     * @Template("TuniAnnonceBundle:Attribut:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TuniAnnonceBundle:Attribut')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Attribut entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new AttributType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            
            $repository = $this->getDoctrine()
                                        ->getManager()
                                        ->getRepository('TuniAnnonceBundle:Multichoix'); 
                         $Multichoix=$repository->findBy(array('attribut' => $entity->getId()));
                         foreach ($Multichoix as $choixOld) {
                              $em->remove($choixOld);
                              $em->flush();
                         }
            $em->persist($entity);
            if($entity->getIsSelectbox()){
            if($request->get('val')){
                $choises=$request->get('val');
                foreach ($choises as $ch) {
                    $Choix  = new Multichoix();
                    $Choix->setVal($ch);
                    $Choix->setAttribut($entity);
                     $em->persist($Choix);
                }
            }
            
                }
            
            $em->flush();
            $this->get('session')->setFlash(
                                                    'notice',
                                                     'L\'attribut a été modifié avec succée'
                                                  );
                return $this->redirect($this->generateUrl('attribut'));   
            //return $this->redirect($this->generateUrl('attribut_edit', array('id' => $id)));
        }
                        $repository = $this->getDoctrine()
                                        ->getManager()
                                        ->getRepository('TuniAnnonceBundle:Multichoix'); 
                         $Multichoix=$repository->findBy(array('attribut' => $entity->getId()));
          $this->get('session')->setFlash(
            'notice',
            ' ERREUR ,Veuillez saisir de nouveau les informations de l\'attribut ! '
        );
        return array('page'=>'attribut',
            'entity'      => $entity,
            'Multichoix'      => $Multichoix,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Attribut entity.
     *
     * @Route("/{id}/delete", name="attribut_delete")
     * @Method("GET")
     */
    public function deleteAction(Request $request, $id)
    { 
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TuniAnnonceBundle:Attribut')->find($id);
             $this->get('session')->setFlash(
            'notice',
            ' ERREUR de supprission de l\'attribut ! '
        );
            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Attribut entity.');
            }
             $repository = $this->getDoctrine()
                                        ->getManager()
                                        ->getRepository('TuniAnnonceBundle:Multichoix'); 
                         $Multichoix=$repository->findBy(array('attribut' => $entity->getId()));
                         foreach ($Multichoix as $choixOld) {
                              $em->remove($choixOld);
                             $em->flush();
                         }
            $em->remove($entity);
            $em->flush();
        $this->get('session')->setFlash(
                                                    'notice',
                                                     'L\'attribut a été supprimé avec succée'
                                                  );
       

        return $this->redirect($this->generateUrl('attribut'));
    }

    /**
     * Creates a form to delete a Attribut entity by id.
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
     * @Route("/deleteliste", name="attribut_deleteliste")
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
                ->getRepository('TuniAnnonceBundle:Attribut');
            
            $Attributs=$repository->findAll();
                    foreach ($Attributs as $Attribut) {
                    if(array_key_exists('admin_'.$Attribut->getId(), $_POST)){
                            
                        if($_POST['admin_'.$Attribut->getId()]){
                        $em->remove($Attribut);
                        $em->flush();
                        $exist=TRUE;
                        }
                 }
                   
            
            }
            $this->get('session')->setFlash(
            'notice',
            'Pas d\'Attribut à supprimer!'
        );
           
           if($exist) 
            $this->get('session')->setFlash(
            'notice',
            'Les Attributs ont été supprimés avec succée'
        );
           
                       return $response;  
     }}
}
