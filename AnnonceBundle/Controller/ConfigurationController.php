<?php

namespace Tuni\AnnonceBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Tuni\AnnonceBundle\Entity\Contact;
use Tuni\AnnonceBundle\Entity\Pays;
use Tuni\AnnonceBundle\Entity\Ville;
use Tuni\AnnonceBundle\Entity\Region;
use Tuni\AnnonceBundle\Entity\Categorie;
use Tuni\AnnonceBundle\Entity\SousCategorie;
use Tuni\AnnonceBundle\Entity\Attribut;
use Tuni\AnnonceBundle\Form\ContactType;
use Symfony\Component\HttpFoundation\Response;
/**
 * Attribut controller.
 *
 * @Route("/configuration")
 */
class ConfigurationController extends Controller
{
    /**
     * Lists all Attribut entities.
     *
     * @Route("/", name="Import")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        return array('page'=>'Import');
    }
     /**
     * Lists all Attribut entities.
     *
     * @Route("/importRegionVille", name="importRegionVille")
     * @Method("POST")
     * @Template()
     */
    public function importRegionVilleAction()
    {   try{
        $em = $this->getDoctrine()->getEntityManager();
    
	$this->get('session')->setFlash(
                                                    'notice',
                                                     'Erreur, Veuillez respecter le format du fichier'
                                                  );
    
        if ($_FILES['RegionVille_file']['size'] > 0) {
            set_time_limit(0);
    //get the csv file
    $file = $_FILES['RegionVille_file']['tmp_name'];
    $string= file_get_contents($file);
    $csvfileArray=$this->csvstring_to_array($string, ';','\n');
	foreach ($csvfileArray as $RegionVille) {
	$Pays = $RegionVille[0];
	$Region = $RegionVille[1];
	 $Ville=$RegionVille[2];
	$repository = $this->getDoctrine()
                                        ->getManager()
                                        ->getRepository('TuniAnnonceBundle:Pays'); 
                         $Paystmp=$repository->findOneBy(array('nomP' => $Pays));
                         if (!$Paystmp) {
                            $Paystmp=new Pays();
                            $Paystmp->setNomP($Pays);
                            $em->persist($Paystmp);
                            $em->flush();
                            
                         }
           $repository = $this->getDoctrine()
                                        ->getManager()
                                        ->getRepository('TuniAnnonceBundle:Pays'); 
                         $Paystmp=$repository->findOneBy(array('nomP' => $Pays));
            $repository = $this->getDoctrine()
                                        ->getManager()
                                        ->getRepository('TuniAnnonceBundle:Region'); 
                         $Regiontmp=$repository->findOneBy(array('nomReg' => $Region,'pays'=>$Paystmp->getId()));
		if (!$Regiontmp) {
            $Regiontmp=new Region();
            $Regiontmp->setnomReg($Region);
            $Regiontmp->setPays($Paystmp);
            $em->persist($Regiontmp);
            $em->flush();
                }
                $repository = $this->getDoctrine()
                                        ->getManager()
                                        ->getRepository('TuniAnnonceBundle:Region'); 
                         $Regiontmp=$repository->findOneBy(array('nomReg' => $Region,'pays'=>$Paystmp->getId()));
                $repository = $this->getDoctrine()
                                        ->getManager()
                                        ->getRepository('TuniAnnonceBundle:Ville'); 
                         $Villetmp=$repository->findOneBy(array('nomV' => $Ville,'region'=>$Regiontmp->getId()));
		if (!$Villetmp) {
            $Villetmp=new Ville();
            $Villetmp->setNomV($Ville);
            $Villetmp->setRegion($Regiontmp);
            $em->persist($Villetmp);
            $em->flush();
                }
            
    }
    $this->get('session')->setFlash(
                                                    'notice',
                                                     'Liste importée avec succée'
                                                  );
    return $this->redirect($this->generateUrl('listRegion'));
                }
     
                                         return   new Response($this->renderView('TuniAnnonceBundle:Configuration:index.html.twig', array('page'=>'Import')));
    }
 catch (Exception $e){
     $this->get('session')->setFlash(
                                                    'notice',
                                                     'Une erreur est apparue lors de l\'importaion des données'
                                                  );
         return $this->redirect($this->generateUrl('listRegion'));
 }
    }
    /**
     * Lists all Attribut entities.
     *
     * @Route("/importCategories", name="importCategories")
     * @Method("POST")
     * @Template()
     */
    public function importCategoriesAction()
    {   $em = $this->getDoctrine()->getEntityManager();
	$this->get('session')->setFlash(
                                                    'notice',
                                                     'Erreur, Veuillez respecter le format du fichier'
                                                  );
        if ($_FILES['Categories_file']['size'] > 0) {

    //get the csv file
    $file = $_FILES['Categories_file']['tmp_name'];
    $string= file_get_contents($file);
    $csvfileArray=$this->csvstring_to_array($string, ';','\n');
	foreach ($csvfileArray as $categorieImport) {
	$nom = $categorieImport[0];
	$desc = $categorieImport[1];
	$motcle =$categorieImport[2];
        $publie = $categorieImport[3];
	$nomScat = $categorieImport[4];
	$descScat = $categorieImport[5];
	$attributs =$categorieImport[6];
	$repository = $this->getDoctrine()
                                        ->getManager()
                                        ->getRepository('TuniAnnonceBundle:Categorie'); 
                         $Categorietmp=$repository->findOneBy(array('nomCat' => $nom));
                         if (!$Categorietmp) {
                            $Categorietmp=new Categorie();
                            $Categorietmp->setNomCat($nom);
                            $Categorietmp->setDescCat($desc);
                            $Categorietmp->setMotCles($motcle);
                            $Categorietmp->setIsPublished($publie);
                            $em->persist($Categorietmp);
                            $em->flush();
                            
                         }
           $repository = $this->getDoctrine()
                                        ->getManager()
                                        ->getRepository('TuniAnnonceBundle:Categorie'); 
                         $Categorietmp=$repository->findOneBy(array('nomCat' => $nom));
            $repository = $this->getDoctrine()
                                        ->getManager()
                                        ->getRepository('TuniAnnonceBundle:SousCategorie'); 
                         $SouCategorietmp=$repository->findOneBy(array('nomSousCat' => $nomScat,'categorie'=>$Categorietmp->getId()));
		if (!$SouCategorietmp) {
            $SouCategorietmp=new SousCategorie();
            $SouCategorietmp->setNomSousCat($nomScat);
            $SouCategorietmp->setDescSousCat($nomScat);
            $SouCategorietmp->setCategorie($Categorietmp);
            $listAttribut=  explode(",", $attributs);
            foreach ($listAttribut as $att) {
                $repository = $this->getDoctrine()
                                        ->getManager()
                                        ->getRepository('TuniAnnonceBundle:Attribut'); 
                         $Attributtmp=$repository->findOneBy(array('nom' => $att));
		if (!$Attributtmp) {
            $Attributtmp=new Attribut();
            $Attributtmp->setNom($att);
            $em->persist($Attributtmp);
            
                }
               $SouCategorietmp-> addAttribut($Attributtmp);
            }
            $em->persist($SouCategorietmp);
            $em->flush();
                }
                
            
    } $this->get('session')->setFlash(
                                                    'notice',
                                                     'Liste importée avec succée'
                                                  );
    return $this->redirect($this->generateUrl('categorie'));
          }
    
    return     new Response($this->renderView('TuniAnnonceBundle:Configuration:index.html.twig', array('page'=>'Import')));
    }
   public function csvstring_to_array($string, $CSV_SEPARATOR = ';', $CSV_ENCLOSURE = '"', $CSV_LINEBREAK = "\r\n") {
	$array1 = array(); //va contenir les lignes
	$array2= array(); //va contenir les champs ("zat" ou zaze ou """azer" ...)
	$arrayfinal= array(); //va contenir nos champs, correctement traités, avec une dimension par ligne.
	
	$array1=preg_split('#'.$CSV_LINEBREAK.'#',$string);//on éclate la chaine par ligne en array (une ligne par ligne)
	for($i=0;$i<count($array1);$i++){//pour chaque ligne de notre chaine
		for($o=0;$o<strlen($array1[$i]);$o++){//pour chaque caractère de la ligne
			if(preg_match('#^'.$CSV_ENCLOSURE.'#',substr($array1[$i],$o))){//si sa commence par un ENCLOSURE
				//on enregistre le mot jusqu'a qu'on trouve un seul ENCLOSURE suivie d'un SEPARATOR (donc qui commence pas par un ENCLOSURE)
				if(!preg_match('#^"(([^'.$CSV_ENCLOSURE.']*('.$CSV_ENCLOSURE.$CSV_ENCLOSURE.')?[^'.$CSV_ENCLOSURE.']*)*)'.$CSV_ENCLOSURE.$CSV_SEPARATOR.'#i',substr($array1[$i],$o,strlen($array1[$i])),$mot)){
					$mot[1]=substr(substr($array1[$i],$o,strlen($array1[$i])),1,-1);
				}$o+=2;
			}
			else{//sinon ...
				//on prend le mot (ne contenant pas SEPARATOR ou ENCLOSURE) jusqu'au prochain SEPARATOR
				if(!preg_match('#^([^'.$CSV_ENCLOSURE.$CSV_SEPARATOR.']*)'.$CSV_SEPARATOR.'#i',substr($array1[$i],$o,strlen($array1[$i])),$mot)){
					$mot[1]=substr($array1[$i],$o,strlen($array1[$i]));
				}
			}
		$o=$o+strlen($mot[1]);//on avance dans la ligne jusqu'au prochain mot
		$array2[$i][]=str_replace($CSV_ENCLOSURE.$CSV_ENCLOSURE,$CSV_ENCLOSURE,$mot[1]);//on transforme les double ENCLOSURE par des simple
		}
	}
  return $array2;
}

}
