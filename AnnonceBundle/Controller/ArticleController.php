<?php

namespace Tuni\AnnonceBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Tuni\AnnonceBundle\Entity\Article;
use Tuni\AnnonceBundle\Form\ArticleType;
use Tuni\AnnonceBundle\Form\ArticleEditType;
use Symfony\Component\HttpFoundation\Response;
/**
 * Article controller.
 *
 * @Route("/Article")
 */
class ArticleController extends Controller
{
    /**
     * Lists all Article entities.
     *
     * @Route("/", name="Article")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQueryBuilder();
        $query->select('a')
              ->from('TuniAnnonceBundle:Article', 'a')
              ->getQuery()
              ;
        $query3 = $em->createQuery("
    SELECT a, p
    FROM TuniAnnonceBundle:Article a
    JOIN a.page p
    
    
");
        $paginator  = $this->get('knp_paginator');
    $pagination = $paginator->paginate(
        $query3,
        $this->get('request')->query->get('page', 1)/*Article number*/,
        10/*limit per page*/
    );
    $total = $query->select('COUNT(a)')
                    ->getQuery()
                    ->getSingleScalarResult();
        
        return array('page'=>'Articles','pagination' => $pagination,'total' => $total);

    }

    /**
     * Creates a new Article entity.
     *
     * @Route("/", name="Article_create")
     * @Method("POST")
     * @Template("TuniAnnonceBundle:Article:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new Article();
        $form = $this->createForm(new ArticleType(), $entity);
        $form->bind($request);
        $this->get('session')->setFlash(
            'notice',
            ' ERREUR ,Veuillez saisir de nouveau les informations de l\'Article ! '
        );
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            if($entity->getImg()!=NULL)
            $entity->uploadImage();
            
            $em->persist($entity);
            $em->flush();
                        $this->get('session')->setFlash(
                                                    'notice',
                                                     'Article a été crée avec succée'
                                                  );
            return $this->redirect($this->generateUrl('Article'));
            
        }

        return array('page'=>'Articles',
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Article entity.
     *
     * @Route("/new", name="Article_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Article();
        $form   = $this->createForm(new ArticleType(), $entity);

        return array('page'=>'Articles',
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Article entity.
     *
     * @Route("/{id}", name="Article_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TuniAnnonceBundle:Article')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Article entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array('page'=>'Articles',
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Article entity.
     *
     * @Route("/{id}/edit", name="Article_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TuniAnnonceBundle:Article')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Article entity.');
        }

        $editForm = $this->createForm(new ArticleEditType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array('page'=>'Articles',
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Article entity.
     *
     * @Route("/{id}", name="Article_update")
     * @Method("GET")
     * @Template("TuniAnnonceBundle:Article:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TuniAnnonceBundle:Article')->find($id);
        $oldImg=$entity->getImg();
       
$this->get('session')->setFlash(
            'notice',
            ' ERREUR ,Veuillez saisir de nouveau les informations de la Article ! '
        );
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Article entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ArticleEditType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            if($entity->getImg()!=NULL){
                    if($oldImg!=NULL)
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
                                                     'Article a été modifié avec succée'
                                                  );
            return $this->redirect($this->generateUrl('Article'));
        }
        return $this->redirect($this->generateUrl('Article_edit',array("id"=>$id)));

    }

    /**
     * Deletes a Article entity.
     *
     * @Route("/{id}", name="Article_delete")
     * @Method("GET")
     */
    public function deleteAction(Request $request, $id)
    {
        
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TuniAnnonceBundle:Article')->find($id);
            $this->get('session')->setFlash(
            'notice',
            ' ERREUR de supprission de l\'Article ! '
        );
           
            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Article entity.');
            }

            $em->remove($entity);
            $em->flush();
        $this->get('session')->setFlash(
                                                    'notice',
                                                     'Article a été supprimé avec succée'
                                                  );
       
        return $this->redirect($this->generateUrl('Article'));
    }

    /**
     * Creates a form to delete a Article entity by id.
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
     * @Route("/deleteliste", name="Article_deleteliste")
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
                ->getRepository('TuniAnnonceBundle:Article');
            
            $Articles=$repository->findAll();
                    foreach ($Articles as $Article) {
                    if(array_key_exists('admin_'.$Article->getId(), $_POST)){
                            
                        if($_POST['admin_'.$Article->getId()]){
                        $em->remove($Article);
                        $em->flush();
                        $exist=TRUE;
                        }
                 }
                   
            
            }
            $this->get('session')->setFlash(
            'notice',
            'Pas d\'Article à supprimer!'
        );
           
           if($exist) 
            $this->get('session')->setFlash(
            'notice',
            'Les Articles ont été supprimés avec succée'
        );
           
                       return $response;  
     }}
    
}
