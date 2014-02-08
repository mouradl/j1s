<?php

namespace Tuni\AnnonceBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Tuni\AnnonceBundle\Entity\Categorie;
use Tuni\AnnonceBundle\Entity\SousCategorie;
use Tuni\AnnonceBundle\Form\CategorieType;
use Tuni\AnnonceBundle\Form\SousCategorieType;
use Symfony\Component\HttpFoundation\Response;
/**
 * Categorie controller.
 *
 * @Route("/categorie")
 */
class CategorieController extends Controller
{
    /**
     * Lists all Categorie entities.
     *
     * @Route("/categorie", name="categorie")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        
         $em = $this->getDoctrine()->getManager();
        $query = $em->createQueryBuilder();
        $query->select('a')
              ->from('TuniAnnonceBundle:Categorie', 'a')
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
        $repository = $this->getDoctrine()
                                        ->getManager()
                                        ->getRepository('TuniAnnonceBundle:SousCategorie'); 
                         $SousCategories=$repository->findAll();
         
        return array('page'=>'categories','SousCategories'      => $SousCategories,'pagination' => $pagination,'total' => $total);
    }

    /**
     * Creates a new Categorie entity.
     *
     * @Route("/", name="categorie_create")
     * @Method("POST")
     * @Template("TuniAnnonceBundle:Categorie:new.html.twig")
     */
    public function createAction(Request $request)
    {   
                
               
        $entity  = new Categorie();
        $form = $this->createForm(new CategorieType(), $entity);
        //$formattr = $this->createForm(new SousCategorieType(), $entity);
        $form->bind($request);
        //$entity = $em->getRepository('TuniAnnonceBundle:Categorie')->find($id);
        $repository = $this->getDoctrine()
                                        ->getManager()
                                        ->getRepository('TuniAnnonceBundle:Attribut'); 
                         $attributs=$repository->findAll();
        
        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            if($entity->getIcon()!=NULL)
            $entity->uploadImage();
            $em->persist($entity);
            if($request->get('SouCat')){
                //var_dump($SouCats);
                $SouCats=$request->get('SouCat');
               // var_dump($SouCats);
                foreach ($SouCats as $SouCat) {
                    //var_dump($SouCat);
                    //echo '<br>';
                    
                    $SousCategorie  = new SousCategorie();
                    $SousCategorie->setNomSousCat($SouCat[1]);
                    $SousCategorie->setDescSousCat($SouCat[2]);
                    $SousCategorie->setCategorie($entity);
                    $em->persist($SousCategorie);
                    $em->flush();
                    if(array_key_exists(3, $SouCat))
                    {
                        foreach ($SouCat[3] as $attribut) {
                        $SousCategorie->addAttribut($repository->find(intval($attribut)));
                        }

                    }
                    
                }
            }
            $em->flush();
            $this->get('session')->setFlash(
                                                    'notice',
                                                     'La categorie a été crée avec succée'
                                                  );
            return $this->redirect($this->generateUrl('categorie'));
        }

        return array('page'=>'categories',
            'entity' => $entity,
             'attributs'=>$attributs,
            'form'   => $form->createView(),
        );
    }

    /**
     * Displays a form to create a new Categorie entity.
     *
     * @Route("/new", name="categorie_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Categorie();
        $form   = $this->createForm(new CategorieType(), $entity);
        $repository = $this->getDoctrine()
                                        ->getManager()
                                        ->getRepository('TuniAnnonceBundle:Attribut'); 
                         $attributs=$repository->findAll();
        

        return array('page'=>'categories',
            'entity' => $entity,
             'attributs'=>$attributs,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Categorie entity.
     *
     * @Route("/{id}", name="categorie_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TuniAnnonceBundle:Categorie')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Categorie entity.');
        }
$repository = $this->getDoctrine()
                                        ->getManager()
                                        ->getRepository('TuniAnnonceBundle:SousCategorie'); 
                         $SousCategories=$repository->findBy(array('categorie' => $entity->getId()));
        
        $deleteForm = $this->createDeleteForm($id);

        return array('page'=>'categories',
            'entity'      => $entity,
            'SousCategories'      => $SousCategories,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Categorie entity.
     *
     * @Route("/{id}/edit", name="categorie_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TuniAnnonceBundle:Categorie')->find($id);
        $repository = $this->getDoctrine()
                                        ->getManager()
                                        ->getRepository('TuniAnnonceBundle:SousCategorie'); 
                         $SousCategories=$repository->findBy(array('categorie' => $entity->getId()));
        
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Categorie entity.');
        }

        $editForm = $this->createForm(new CategorieType(), $entity);
        $deleteForm = $this->createDeleteForm($id);
        $repository = $this->getDoctrine()
                                        ->getManager()
                                        ->getRepository('TuniAnnonceBundle:Attribut'); 
                         $attributs=$repository->findAll();
        return array('page'=>'categories',
            'entity'      => $entity,
            'SousCategories'      => $SousCategories,
            'attributs'=>$attributs,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Edits an existing Categorie entity.
     *
     * @Route("/{id}", name="categorie_update")
     * @Method("POST")
     * @Template("TuniAnnonceBundle:Categorie:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('TuniAnnonceBundle:Categorie')->find($id);
        $oldIcon=$entity->getIcon();
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Categorie entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createForm(new CategorieType(), $entity);
        $editForm->bind($request);

        if ($editForm->isValid()) {
            $repositoryAttr = $this->getDoctrine()
                                        ->getManager()
                                        ->getRepository('TuniAnnonceBundle:Attribut'); 
           
             $repository = $this->getDoctrine()
                                        ->getManager()
                                        ->getRepository('TuniAnnonceBundle:SousCategorie'); 
                    $SousCategories=$repository->findBy(array('categorie' => $entity->getId()));
              if($entity->getIcon()!=NULL){
                    if($oldIcon!=NULL&&$oldIcon!="")
                        $entity->removeOldImage($oldIcon);
                    $entity->uploadImage();
                }else {
                    if($oldIcon!=NULL)
                        $entity->setIcon($oldIcon);
                }  
            $em->persist($entity);
            if($request->get('SouCat')){
                $SouCats=$request->get('SouCat');
             
                foreach ($SousCategories as $SousCateg) {
                         if(!isset($SouCats[$SousCateg->getId()]))
                        {   $em->remove($SousCateg);
                            $em->flush();
                            
                           //var_dump($SousCateg->getNomSousCat());
                            //echo '<br>'; 
                           
                        }
                    } //die();
                foreach ($SouCats as $SouCat) {
                    //var_dump($SouCat);
                    //echo '<br>';
                    if($SouCat[4]=="NULL")
                    {$SousCategorie  = new SousCategorie();
                    $SousCategorie->setNomSousCat($SouCat[1]);
                    $SousCategorie->setDescSousCat($SouCat[2]);
                    $SousCategorie->setCategorie($entity);
                    $em->persist($SousCategorie);
                    $em->flush();
                    if(array_key_exists(3, $SouCat))
                    {
                    foreach ($SouCat[3] as $attribut) {
                    $SousCategorie->addAttribut($repositoryAttr->find(intval($attribut)));
                    }
                    
                    }
                    }
                    else
                    {
                    $SousCategorie=$repository->find(intval ($SouCat[4]));
                    $SousCategorie->setNomSousCat($SouCat[1]);
                    $SousCategorie->setDescSousCat($SouCat[2]);
                    $SousCategorie->setCategorie($entity);
                    $listatt=array();
                    foreach ($SousCategorie->getAttribut()as $attrib) {
                        $listatt[]=$attrib->getId();
                        if(!array_key_exists(3, $SouCat))
                        $SousCategorie->removeAttribut($attrib);
                        elseif (!in_array("".$attrib->getId(), $SouCat[3]))
                                $SousCategorie->removeAttribut($attrib);
                        
                    }
                    if(array_key_exists(3, $SouCat))
                    {
                    foreach ($SouCat[3] as $attribut) {
                    if(!in_array(intval($attribut),$listatt))
                    $SousCategorie->addAttribut($repositoryAttr->find(intval($attribut)));
                    
                    }}
                    $em->persist($SousCategorie);
                    $em->flush();
                    
                    }
                }
           $this->get('session')->setFlash(
                                                    'notice',
                                                     'La categorie a été modifié avec succée'
                                                  );$redir=$this->generateUrl('categorie');
           }else {
            $this->get('session')->setFlash(
            'notice',
            ' Veuillez laisser aumoins une sous-categorie ! '
        );  $redir=$this->generateUrl('categorie_edit',array('id'=>$id));
            }
            $em->flush();
             
            return $this->redirect($redir);
        }
        $this->get('session')->setFlash(
            'notice',
            ' ERREUR ,Veuillez saisir de nouveau les informations de la categorie ! '
        );
         $SousCategories=$repository->findBy(array('categorie' => $entity->getId()));
                      $attributs=$repositoryAttr->findAll();
        return array(
            'entity'      => $entity,
            'SousCategories'      => $SousCategories,
            'attributs'=>$attributs,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Deletes a Categorie entity.
     *
     * @Route("/{id}", name="categorie_delete")
     * @Method("GET")
     */
    public function deleteAction(Request $request, $id)
    {
        
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('TuniAnnonceBundle:Categorie')->find($id);
$this->get('session')->setFlash(
            'notice',
            ' ERREUR de supprission de la categorie ! '
        );
            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Categorie entity.');
            }
            $repository = $this->getDoctrine()
                                        ->getManager()
                                        ->getRepository('TuniAnnonceBundle:SousCategorie'); 
            $SousCategories=$repository->findBy(array('categorie' => $entity->getId()));
               foreach ($SousCategories as $SousCategorie) {
                    $repository = $this->getDoctrine()
                ->getEntityManager()
                ->getRepository('TuniAnnonceBundle:Annonce');
            
            $Annonces=$repository->findAll();
                    foreach ($Annonces as $Annonce) {
                    if($Annonce->getSousCat()->getId()==$SousCategorie->getId()){
                        $em->remove($Annonce);
                        $em->flush();
                        
                        
                 }
                   
            
            }
                    $em->remove($SousCategorie);
                    $em->flush();
               }
            $em->remove($entity);
            $em->flush();
        $this->get('session')->setFlash(
                                                    'notice',
                                                     'La categorie a été supprimé avec succée'
                                                  );
       


        return $this->redirect($this->generateUrl('categorie'));
    }

    /**
     * Creates a form to delete a Categorie entity by id.
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
    public function removeSousCateg($SousCateg){
        
    }
        /**
     * .
     *
     * @Route("/deleteliste", name="categorie_deleteliste")
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
                ->getRepository('TuniAnnonceBundle:Categorie');
            
            $Categories=$repository->findAll();
                    foreach ($Categories as $Categorie) {
                    if(array_key_exists('admin_'.$Categorie->getId(), $_POST)){
                            
                        if($_POST['admin_'.$Categorie->getId()]){
                            $repository = $this->getDoctrine()
                                        ->getManager()
                                        ->getRepository('TuniAnnonceBundle:SousCategorie'); 
            $SousCategories=$repository->findBy(array('categorie' => $Categorie->getId()));
               foreach ($SousCategories as $SousCategorie) {
                    $repository = $this->getDoctrine()
                ->getEntityManager()
                ->getRepository('TuniAnnonceBundle:Annonce');
            
            $Annonces=$repository->findAll();
                    foreach ($Annonces as $Annonce) {
                    if($Annonce->getSousCat()->getId()==$SousCategorie->getId()){
                        $em->remove($Annonce);
                        $em->flush();
                        
                        
                 }
                   
            
            }
                    $em->remove($SousCategorie);
                    $em->flush();
               }
                        $em->remove($Categorie);
                        $em->flush();
                        $exist=TRUE;
                        }
                 }
                   
            
            }
            $this->get('session')->setFlash(
            'notice',
            'Pas de Categorie à supprimer!'
        );
           
           if($exist) 
            $this->get('session')->setFlash(
            'notice',
            'Les Categories ont été supprimés avec succée'
        );
           
                       return $response;  
     }}

}
