<?php

namespace Tuni\AnnonceBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Tuni\AnnonceBundle\Entity\MailExpiration;
use Tuni\AnnonceBundle\Form\MailExpirationType;
use Symfony\Component\HttpFoundation\Response;
use \DateTime;
/**
 * MailExpiration controller.
 *
 * @Route("/mailExpiration")
 */
class MailExpirationController extends Controller
{
    /**
     * Lists all MailExpiration entities.
     *
     * @Route("/", name="mailExpiration")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQueryBuilder();
        $query->select('a')
              ->from('TuniAnnonceBundle:MailExpiration', 'a')
              ->getQuery()
              ;
        $paginator  = $this->get('knp_paginator');
    $pagination = $paginator->paginate(
        $query,
        $this->get('request')->query->get('mailExpiration', 1)/*mailExpiration number*/,
        10/*limit per mailExpiration*/
    );
    $total = $query->select('COUNT(a)')
                    ->getQuery()
                    ->getSingleScalarResult();
        
        return array('page'=>'mailExpirations','pagination' => $pagination,'total' => $total);

    }

    /**
     * Creates a new MailExpiration entity.
     *
     * @Route("/", name="mailExpiration_create")
     * @Method("POST")
     * @Template("TuniAnnonceBundle:MailExpiration:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity  = new MailExpiration();
        $form = $this->createForm(new MailExpirationType(), $entity);
        $form->bind($request);
        $this->get('session')->setFlash(
            'notice',
            ' ERREUR ,Veuillez saisir de nouveau les informations  du mail d\'expiration ! '
        );
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $postDate = $request->request->get('dateExp');
                    $d = new DateTime($postDate);
                    $z = $d->format('Y-m-d H:i:s');

                    $entity->setDateSend($d);
            $em->persist($entity);
            $em->flush();

           
                        $this->get('session')->setFlash(
                                                    'notice',
                                                     'La mailExpiration a été crée avec succée'
                                                  );
            return $this->redirect($this->generateUrl('mailExpiration'));
            
        }

        return array('page'=>'mailExpirations',
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new MailExpiration entity.
     *
     * @Route("/new", name="mailExpiration_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new MailExpiration();
        $form   = $this->createForm(new MailExpirationType(), $entity);

        return array('page'=>'mailExpirations',
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a MailExpiration entity.
     *
     * @Route("/{id}", name="mailExpiration_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TuniAnnonceBundle:MailExpiration')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find MailExpiration entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array('page'=>'mailExpirations',
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing MailExpiration entity.
     *
     * @Route("/{id}/edit", name="mailExpiration_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TuniAnnonceBundle:MailExpiration')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find MailExpiration entity.');
        }

        $editForm = $this->createForm(new MailExpirationType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array('page'=>'mailExpirations',
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing MailExpiration entity.
     *
     * @Route("/{id}", name="mailExpiration_update")
     * @Method("GET")
     * @Template("TuniAnnonceBundle:MailExpiration:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TuniAnnonceBundle:MailExpiration')->find($id);
$this->get('session')->setFlash(
            'notice',
            ' ERREUR ,Veuillez saisir de nouveau les informations  du mail d\'expiration ! '
        );
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find MailExpiration entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new MailExpirationType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $postDate = $request->request->get('dateExp');
                    $d = new DateTime($postDate);
                    $z = $d->format('Y-m-d H:i:s');

                    $entity->setDateSend($d);
            $em->persist($entity);
            $em->flush();
             $this->get('session')->setFlash(
                                                    'notice',
                                                     'La mailExpiration a été modifié avec succée'
                                                  );
            return $this->redirect($this->generateUrl('mailExpiration_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a MailExpiration entity.
     *
     * @Route("/{id}", name="mailExpiration_delete")
     * @Method("GET")
     */
    public function deleteAction(Request $request, $id)
    {
        
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TuniAnnonceBundle:MailExpiration')->find($id);
            $this->get('session')->setFlash(
            'notice',
            ' ERREUR de supprission  du mail d\'expiration ! '
        );
           
            if (!$entity) {
                throw $this->createNotFoundException('Unable to find MailExpiration entity.');
            }

            $em->remove($entity);
            $em->flush();
        $this->get('session')->setFlash(
                                                    'notice',
                                                     'La mail Expiration a été supprimé avec succée'
                                                  );
       
        return $this->redirect($this->generateUrl('mailExpiration'));
    }

    /**
     * Creates a form to delete a MailExpiration entity by id.
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
     * @Route("/deleteliste", name="mailExpiration_deleteliste")
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
                ->getRepository('TuniAnnonceBundle:MailExpiration');
            
            $MailExpirations=$repository->findAll();
                    foreach ($MailExpirations as $MailExpiration) {
                    if(array_key_exists('admin_'.$MailExpiration->getId(), $_POST)){
                            
                        if($_POST['admin_'.$MailExpiration->getId()]){
                        $em->remove($MailExpiration);
                        $em->flush();
                        $exist=TRUE;
                        }
                 }
                   
            
            }
            $this->get('session')->setFlash(
            'notice',
            'Pas de Mail Expiration à supprimer!'
        );
           
           if($exist) 
            $this->get('session')->setFlash(
            'notice',
            'Les Mail Expirations ont été supprimés avec succée'
        );
           
                       return $response;  
     }}
}
