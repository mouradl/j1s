<?php

namespace Tuni\AnnonceBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Tuni\AnnonceBundle\Entity\Page;
use Tuni\AnnonceBundle\Form\PageType;
use Symfony\Component\HttpFoundation\Response;

/**
 * Page controller.
 *
 * @Route("/page")
 */
class PageController extends Controller {

    /**
     * Lists all Page entities.
     *
     * @Route("/", name="page")
     * @Method("GET")
     * @Template()
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQueryBuilder();
        $query->select('a')
                ->from('TuniAnnonceBundle:Page', 'a')
                ->getQuery()
        ;
        $paginator = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
                $query, $this->get('request')->query->get('page', 1)/* page number */, 10/* limit per page */
        );
        $total = $query->select('COUNT(a)')
                ->getQuery()
                ->getSingleScalarResult();

        return array('page' => 'pages', 'pagination' => $pagination, 'total' => $total);
    }

    /**
     * Creates a new Page entity.
     *
     * @Route("/", name="page_create")
     * @Method("POST")
     * @Template("TuniAnnonceBundle:Page:new.html.twig")
     */
    public function createAction(Request $request) {
        $entity = new Page();
        $form = $this->createForm(new PageType(), $entity);
        $form->bind($request);
        $this->get('session')->setFlash(
                'notice', ' ERREUR ,Veuillez saisir de nouveau les informations de la page ! '
        );
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            $em->flush();
            $this->get('session')->setFlash(
                    'notice', 'La page a été crée avec succée'
            );
            return $this->redirect($this->generateUrl('page'));
        }

        return array('page' => 'pages',
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Page entity.
     *
     * @Route("/new", name="page_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction() {
        $entity = new Page();
        $form = $this->createForm(new PageType(), $entity);

        return array('page' => 'pages',
            'entity' => $entity,
            'form' => $form->createView(),
        );
    }

    /**
     * Finds and displays a Page entity.
     *
     * @Route("/{id}", name="page_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TuniAnnonceBundle:Page')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Page entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array('page' => 'pages',
            'entity' => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Page entity.
     *
     * @Route("/{id}/edit", name="page_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TuniAnnonceBundle:Page')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Page entity.');
        }

        $editForm = $this->createForm(new PageType(), $entity);
        $deleteForm = $this->createDeleteForm($id);

        return array('page' => 'pages',
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Page entity.
     *
     * @Route("/{id}", name="page_update")
     * @Method("GET")
     * @Template("TuniAnnonceBundle:Page:edit.html.twig")
     */
    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TuniAnnonceBundle:Page')->find($id);
        $this->get('session')->setFlash(
                'notice', ' ERREUR ,Veuillez saisir de nouveau les informations de la page ! '
        );
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Page entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new PageType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $em->persist($entity);
            $em->flush();
            $this->get('session')->setFlash(
                    'notice', 'La page a été modifié avec succée'
            );
            return $this->redirect($this->generateUrl('page'));
        }

        return array(
            'entity' => $entity,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Page entity.
     *
     * @Route("/{id}", name="page_delete")
     * @Method("GET")
     */
    public function deleteAction(Request $request, $id) {

        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('TuniAnnonceBundle:Page')->find($id);
        $this->get('session')->setFlash(
                'notice', ' ERREUR de supprission de la page ! '
        );

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Page entity.');
        }
        $Articles = $em->getRepository('TuniAnnonceBundle:Article')->findBy(array('page' => $id));

        if (!$Articles) {
            $em->remove($entity);
            $em->flush();
            $this->get('session')->setFlash(
                    'notice', 'La page a été supprimé avec succée'
            );
        } else {
            $this->get('session')->setFlash(
                    'notice', ' ERREUR,la page contient des articles ! '
            );
        }

        return $this->redirect($this->generateUrl('page'));
    }

    /**
     * Creates a form to delete a Page entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id) {
        return $this->createFormBuilder(array('id' => $id))
                        ->add('id', 'hidden')
                        ->getForm()
        ;
    }

    /**
     * .
     *
     * @Route("/deleteliste", name="page_deleteliste")
     * @Method("post")
     *
     * @Template()
     */
    public function deletelisteAction() {
        $request = $this->get('request');
        if ($request->isXMLHttpRequest()) {
        //if ('POST' == $request->getMethod())
            $response = new Response();

            $em = $this->getDoctrine()->getEntityManager();

            $exist = FALSE;
            $repository = $this->getDoctrine()
                    ->getEntityManager()
                    ->getRepository('TuniAnnonceBundle:Page');

            $Pages = $repository->findAll();
            foreach ($Pages as $Page) {
                if (array_key_exists('admin_' . $Page->getId(), $_POST)) {

                    if ($_POST['admin_' . $Page->getId()]) {
                        $Articles = $em->getRepository('TuniAnnonceBundle:Article')->findBy(array('page' => $Page->getId()));

        if (!$Articles) {
            $em->remove($Page);
            $em->flush();
            $exist = TRUE;
            
        } else {
            $this->get('session')->setFlash(
                     'notice'.$Page->getId(), 'ERREUR,la page "'.$Page->getNomPage().'" contient des articles !'
            );
        }
                        
                        
                    }
                }
            }
            $this->get('session')->setFlash(
                    'notice', 'Pas de Page à supprimer!'
            );

            if ($exist)
                $this->get('session')->setFlash(
                        'notice', 'Les Pages ont été supprimés avec succée'
                );

            return $response;
        }
    }

}
