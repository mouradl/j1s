<?php

namespace Tuni\AnnonceBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Tuni\AnnonceBundle\Entity\ServiceExpress;
use Tuni\AnnonceBundle\Form\ServiceExpressType;
use Symfony\Component\HttpFoundation\Response;

/**
 * ServiceExpress controller.
 *
 * @Route("/service-express")
 */
class ServiceExpressController extends Controller
{
    /**
     * Lists all ServiceExpress entities.
     *
     * @Route("/", name="service-express")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        
          $em = $this->getDoctrine()->getManager();
        $query = $em->createQueryBuilder();
        $query->select('a')
              ->from('TuniAnnonceBundle:ServiceExpress', 'a')
              
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
        
        return array('page'=>'service-express','pagination' => $pagination,'total' => $total);
    }

    /**
     * Finds and displays a ServiceExpress entity.
     *
     * @Route("/{id}", name="service-express_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TuniAnnonceBundle:ServiceExpress')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ServiceExpress entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array('page'=>'service-express',
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

 
    /**
     * Deletes a ServiceExpress entity.
     *
     * @Route("/{id}", name="service-express_delete")
     * @Method("GET")
     */
    public function deleteAction(Request $request, $id)
    {
        
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TuniAnnonceBundle:ServiceExpress')->find($id);
 $this->get('session')->setFlash(
            'notice',
            ' ERREUR de supprission du service express ! '
        );
            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ServiceExpress entity.');
            }

            $em->remove($entity);
            $em->flush();
       $this->get('session')->setFlash(
                                                    'notice',
                                                     'Le service express a été supprimé avec succée'
                                                  );
       

        return $this->redirect($this->generateUrl('service-express'));
    }

    /**
     * Creates a form to delete a ServiceExpress entity by id.
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
     * @Route("/deleteliste", name="service-express_deleteliste")
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
                ->getRepository('TuniAnnonceBundle:ServiceExpress');
            
            $ServiceExpress=$repository->findAll();
                    foreach ($ServiceExpress as $ServiceExpress) {
                    if(array_key_exists('admin_'.$ServiceExpress->getId(), $_POST)){
                            
                        if($_POST['admin_'.$ServiceExpress->getId()]){
                        $em->remove($ServiceExpress);
                        $em->flush();
                        $exist=TRUE;
                        }
                 }
                   
            
            }
            $this->get('session')->setFlash(
            'notice',
            'Pas de Service Express à supprimer!'
        );
           
           if($exist) 
            $this->get('session')->setFlash(
            'notice',
            'Les Services Express ont été supprimés avec succée'
        );
           
                       return $response;  
     }}

}
