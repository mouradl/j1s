<?php

namespace Tuni\AnnonceBundle\Entity;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * Categorie
 *
 * @ORM\Table(name="categorie")
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity
 */
class Categorie
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_cat", type="string", length=25, nullable=false)
     */
    private $nomCat;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_published", type="boolean", nullable=true)
     */
    private $isPublished;

    /**
     * @var string
     *
     * @ORM\Column(name="desc_cat", type="string", length=100, nullable=true)
     */
    private $descCat;

    /**
     * @var string
     *
     * @ORM\Column(name="mot_cles", type="string", length=30, nullable=false)
     */
    private $motCles;
    
    /**
      * @var string
     * @Assert\File( maxSize = "1024k", mimeTypesMessage = "Please upload a valid Image")
     *
     * @ORM\Column(name="icon", type="string", length=255, nullable=true)
     */
    private $icon;

    /**
    * @ORM\OneToMany(targetEntity="SousCategorie", mappedBy="categorie",cascade={"persist", "remove"})
    */
    public $SousCategories;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nomCat
     *
     * @param string $nomCat
     * @return Categorie
     */
    public function setNomCat($nomCat)
    {
        $this->nomCat = $nomCat;
    
        return $this;
    }

    /**
     * Get nomCat
     *
     * @return string 
     */
    public function getNomCat()
    {
        return $this->nomCat;
    }

    /**
     * Set isPublished
     *
     * @param boolean $isPublished
     * @return Categorie
     */
    public function setIsPublished($isPublished)
    {
        $this->isPublished = $isPublished;
    
        return $this;
    }

    /**
     * Get isPublished
     *
     * @return boolean 
     */
    public function getIsPublished()
    {
        return $this->isPublished;
    }

    /**
     * Set descCat
     *
     * @param string $descCat
     * @return Categorie
     */
    public function setDescCat($descCat)
    {
        $this->descCat = $descCat;
    
        return $this;
    }

    /**
     * Get descCat
     *
     * @return string 
     */
    public function getDescCat()
    {
        return $this->descCat;
    }

    /**
     * Set motCles
     *
     * @param string $motCles
     * @return Categorie
     */
    public function setMotCles($motCles)
    {
        $this->motCles = $motCles;
    
        return $this;
    }

    /**
     * Get motCles
     *
     * @return string 
     */
    public function getMotCles()
    {
        return $this->motCles;
    }
    /**
     * Set icon
     *
     * @param string $icon
     * @return Slider
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;
    
        return $this;
    }

    /**
     * Get icon
     *
     * @return string 
     */
    public function getIcon()
    {
        return $this->icon;
    }

    public function getFullImagePath() {
        return null === $this->icon ? null : $this->getUploadRootDir(). $this->icon;
    }
 
    protected function getUploadRootDir() {
        // the absolute directory path where uploaded documents should be saved
        return $this->getTmpUploadRootDir()."categorie/".$this->id."/";
    }
 
    protected function getTmpUploadRootDir() {
        // the absolute directory path where uploaded documents should be saved
        return __DIR__ . '/../../../../web/upload/';
    }
 
  
    public function uploadImage() {
        // the file property can be empty if the field is not required
         if (isset($this->icon)) {
            
        if (null === $this->icon) {
            return;
        }
        if(!$this->id){
            $this->icon->move($this->getTmpUploadRootDir(), $this->icon->getClientOriginalName());
        }else{
            $this->icon->move($this->getUploadRootDir(), $this->icon->getClientOriginalName());
        }
         $this->setIcon($this->icon->getClientOriginalName());
         
        }
    }
 
    /**
     * @ORM\PostPersist()
     */
    public function moveImage()
    {
        if (null === $this->icon) {
            return;
        }
        if(!is_dir($this->getUploadRootDir())){
            mkdir($this->getUploadRootDir());
        }
        copy($this->getTmpUploadRootDir().$this->icon, $this->getFullImagePath());
        if (file_exists($this->getTmpUploadRootDir()))unlink($this->getTmpUploadRootDir().$this->icon);
    }
 
    /**
     * @ORM\PreRemove()
     */
    public function removeImage()
    {   if (null === $this->icon) {
            return;
        }
        if (file_exists($this->getFullImagePath()))unlink($this->getFullImagePath());
        if (is_dir($this->getUploadRootDir()))rmdir($this->getUploadRootDir());
    }
    
    public function removeOldImage($oldicon)
    {
        if (file_exists($this->getUploadRootDir().$oldicon))unlink($this->getUploadRootDir().$oldicon);
        //if (is_dir($this->getUploadRootDir()))rmdir($this->getUploadRootDir());
    }
}