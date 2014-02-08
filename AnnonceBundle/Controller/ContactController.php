<?php

namespace Tuni\AnnonceBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Tuni\AnnonceBundle\Entity\Contact;
use Tuni\AnnonceBundle\Form\ContactType;
use Symfony\Component\HttpFoundation\Response;

/**
 * Contact controller.
 *
 * @Route("/contact")
 */
class ContactController extends Controller
{
    /**
     * Lists all Contact entities.
     *
     * @Route("/", name="contact")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        
          $em = $this->getDoctrine()->getManager();
        $query = $em->createQueryBuilder();
        $query->select('a')
              ->from('TuniAnnonceBundle:Contact', 'a')
                ->where("a.nom is not null AND a.message is not null ")
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
        
        return array('page'=>'contacts','pagination' => $pagination,'total' => $total);
    }
/**
     * Lists all Contact entities.
     *
     * @Route("/newsletter", name="newsletters")
     * @Method("GET")
     
     */
    public function newslettersAction()
    {
        
          $em = $this->getDoctrine()->getManager();
        $query = $em->createQueryBuilder();
        $query->select('a')
              ->from('TuniAnnonceBundle:Contact', 'a')
                ->where("a.nom is  null AND a.message is  null ")
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
         return $this->render('TuniAnnonceBundle:Contact:newsletters.html.twig',array('page'=>'newsletters','pagination' => $pagination,'total' => $total));
    
       
    }

    
    public function createAction(Request $request)
    {
        $entity  = new Contact();
         $this->get('session')->setFlash(
                                                    'notice',
                                                     'Erreur d\'envoi du message'
                                                  );
        if($request->isXmlHttpRequest()) // pour vérifier la présence d'une requete Ajax
        {
            $em = $this->getDoctrine()->getManager();
            $nom = $request->get('nom');
            $email = $request->get('email');
            $message = $request->get('msg');
            $entity->setEmail($email);
            $entity->setNom($nom);
            $entity->setMessage($message);
            $em->persist($entity);
            $em->flush();
            $response = new Response();
            $response->setContent('true');
            return $response;
        }
        $form = $this->createForm(new ContactType(), $entity);
        $form->bind($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
 $this->get('session')->setFlash(
                                                    'notice',
                                                     'Message envoyé avec succé'
                                                  );
           
        }
 return $this->redirect($this->generateUrl('tuni_annonce_contact'));
    }

    /**
     * Displays a form to create a new Contact entity.
     *
     * @Route("/new", name="contact_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Contact();
        $form   = $this->createForm(new ContactType(), $entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Contact entity.
     *
     * @Route("/{id}", name="contact_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TuniAnnonceBundle:Contact')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Contact entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array('page'=>'contact',
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Contact entity.
     *
     * @Route("/{id}/edit", name="contact_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TuniAnnonceBundle:Contact')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Contact entity.');
        }

        $editForm = $this->createForm(new ContactType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Contact entity.
     *
     * @Route("/{id}", name="contact_update")
     * @Method("PUT")
     * @Template("TuniAnnonceBundle:Contact:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TuniAnnonceBundle:Contact')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Contact entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new ContactType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('contact_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Contact entity.
     *
     * @Route("/{id}", name="contact_delete")
     * @Method("GET")
     */
    public function deleteAction(Request $request, $id)
    {
        
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TuniAnnonceBundle:Contact')->find($id);
 $this->get('session')->setFlash(
            'notice',
            ' ERREUR de supprission du contact ! '
        );
            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Contact entity.');
            }

            $em->remove($entity);
            $em->flush();
       $this->get('session')->setFlash(
                                                    'notice',
                                                     'Le contact a été supprimé avec succée'
                                                  );
       

        return $this->redirect($this->generateUrl('contact'));
    }
/**
     * Deletes a Contact entity.
     *
     * @Route("/{id}", name="newsletter_delete")
     * @Method("GET")
     */
    public function deletenewsletterAction(Request $request, $id)
    {
        
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TuniAnnonceBundle:Contact')->find($id);
 $this->get('session')->setFlash(
            'notice',
            ' ERREUR de supprission du newsletter ! '
        );
            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Contact entity.');
            }

            $em->remove($entity);
            $em->flush();
       $this->get('session')->setFlash(
                                                    'notice',
                                                     'Le newsletter a été supprimé avec succée'
                                                  );
       

        return $this->redirect($this->generateUrl('newsletters'));
    }

    /**
     * Creates a form to delete a Contact entity by id.
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
     * @Route("/deleteliste", name="contact_deleteliste")
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
                ->getRepository('TuniAnnonceBundle:Contact');
            
            $Contacts=$repository->findAll();
                    foreach ($Contacts as $Contact) {
                    if(array_key_exists('admin_'.$Contact->getId(), $_POST)){
                            
                        if($_POST['admin_'.$Contact->getId()]){
                        $em->remove($Contact);
                        $em->flush();
                        $exist=TRUE;
                        }
                 }
                   
            
            }
            $this->get('session')->setFlash(
            'notice',
            'Pas de Contact à supprimer!'
        );
           
           if($exist) 
            $this->get('session')->setFlash(
            'notice',
            'Les Contacts ont été supprimés avec succée'
        );
           
                       return $response;  
     }}
 /**
     * .
     *
     * @Route("/newsletter/deleteliste", name="newsletters_deleteliste")
     * @Method("post")
     *
     * @Template()
     */
    public function deletelisteNewsletterAction() {
        $request = $this->get('request');
	 if ($request->isXMLHttpRequest())
        //if ('POST' == $request->getMethod())
         {
             $response = new Response();
      
       $em = $this->getDoctrine()->getEntityManager();
       
          $exist=FALSE;
            $repository = $this->getDoctrine()
                ->getEntityManager()
                ->getRepository('TuniAnnonceBundle:Contact');
            
            $Contacts=$repository->findAll();
                    foreach ($Contacts as $Contact) {
                    if(array_key_exists('admin_'.$Contact->getId(), $_POST)){
                            
                        if($_POST['admin_'.$Contact->getId()]){
                        $em->remove($Contact);
                        $em->flush();
                        $exist=TRUE;
                        }
                 }
                   
            
            }
            $this->get('session')->setFlash(
            'notice',
            'Pas de Contact à supprimer!'
        );
           
           if($exist) 
            $this->get('session')->setFlash(
            'notice',
            'Les Contacts ont été supprimés avec succée'
        );
           
                       return $response;  
     }}
     /**
     * Displays a form to create a new Contact entity.
     *
     * @Route("/newsletter/mail", name="newsletters_Mail")
     * @Method("GET")
     * @Template()
     */
    public function mailNewsletterAction()
    {
         return $this->render('TuniAnnonceBundle:Contact:mailNewsletters.html.twig',array('page'=>'newsletters'));
    
    }
/**
     * Displays a form to create a new Contact entity.
     *
     * @Route("/newsletter/send", name="Mail_send")
     * @Method("POST")
     */
    public function sendMailNewsletterAction()
    {           $em = $this->getDoctrine()->getEntityManager();        
                $entitys = $em->getRepository('TuniAnnonceBundle:Contact')->findAll();

		
		foreach ($entitys as $entity) {
                
		
                $to = "mourad.lassoued.ing@gmail.com";
		
		$from = "contact@juste1service.leizart.com";
        $message = \Swift_Message::newInstance()
        ->setSubject($_POST['sujet'])
        ->setFrom($from)
        ->setTo($entity->getEmail())
        ->setBody(
            $_POST['message'],'text/html'
        )
    ;
    
                 $this->get('mailer')->send($message);
  }
		
                $this->get('session')->setFlash(
            'notice',
            'Mail été envoyé avec succée!'
        );
         return $this->redirect($this->generateUrl('newsletters_Mail'));
    
    }

}
