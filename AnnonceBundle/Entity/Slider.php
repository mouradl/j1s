<?php

namespace Tuni\AnnonceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Slider
 *
 * @ORM\Table(name="slider")
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity
 */
class Slider
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
     * @ORM\Column(name="titre", type="string", length=255, nullable=false)
     */
    private $titre;

    /**
     * @var integer
     *
     * @ORM\Column(name="width", type="integer", nullable=false)
     */
    private $width;
    /**
     * @var integer
     *
     * @ORM\Column(name="height", type="integer", nullable=false)
     */
    private $height;

    /**
      * @var string
     * @Assert\File( maxSize = "1024k", mimeTypesMessage = "Please upload a valid Image")
     *
     * @ORM\Column(name="img", type="string", length=255, nullable=false)
     */
    private $img;

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
     * Set titre
     *
     * @param string $titre
     * @return Slider
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    
        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    
    /**
     * Set width
     *
     * @param integer $width
     * @return Slider
     */
    public function setWidth($width)
    {
        $this->width = $width;
    
        return $this;
    }

    /**
     * Get width
     *
     * @return integer 
     */
    public function getWidth()
    {
        return $this->width;
    }
   /**
     * Set height
     *
     * @param integer $height
     * @return Slider
     */
    public function setHeight($height)
    {
        $this->height = $height;
    
        return $this;
    }

    /**
     * Get height
     *
     * @return integer 
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set img
     *
     * @param string $img
     * @return Slider
     */
    public function setImg($img)
    {
        $this->img = $img;
    
        return $this;
    }

    /**
     * Get img
     *
     * @return string 
     */
    public function getImg()
    {
        return $this->img;
    }

    public function getFullImagePath() {
        return null === $this->img ? null : $this->getUploadRootDir(). $this->img;
    }
 
    protected function getUploadRootDir() {
        // the absolute directory path where uploaded documents should be saved
        return $this->getTmpUploadRootDir()."slider/".$this->id."/";
    }
 
    protected function getTmpUploadRootDir() {
        // the absolute directory path where uploaded documents should be saved
        return __DIR__ . '/../../../../web/upload/';
    }
 
  
    public function uploadImage() {
        // the file property can be empty if the field is not required
         if (isset($this->img)) {
            
        if (null === $this->img) {
            return;
        }
        if(!$this->id){
            $this->img->move($this->getTmpUploadRootDir(), $this->img->getClientOriginalName());
        }else{
            $this->img->move($this->getUploadRootDir(), $this->img->getClientOriginalName());
        }
         $this->setImg($this->img->getClientOriginalName());
         
        }
    }
 
    /**
     * @ORM\PostPersist()
     */
    public function moveImage()
    {
        if (null === $this->img) {
            return;
        }
        if(!is_dir($this->getUploadRootDir())){
            mkdir($this->getUploadRootDir());
        }
        copy($this->getTmpUploadRootDir().$this->img, $this->getFullImagePath());
        if (file_exists($this->getTmpUploadRootDir()))unlink($this->getTmpUploadRootDir().$this->img);
    }
 
    /**
     * @ORM\PreRemove()
     */
    public function removeImage()
    {   if (null === $this->img) {
            return;
        }
        if (file_exists($this->getFullImagePath()))unlink($this->getFullImagePath());
        if (is_dir($this->getUploadRootDir()))rmdir($this->getUploadRootDir());
    }
    
    public function removeOldImage($oldimg)
    {
        if (file_exists($this->getUploadRootDir().$oldimg))unlink($this->getUploadRootDir().$oldimg);
        //if (is_dir($this->getUploadRootDir()))rmdir($this->getUploadRootDir());
    }
}