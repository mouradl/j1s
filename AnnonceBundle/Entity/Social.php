<?php

namespace Tuni\AnnonceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Social
 *
 * @ORM\Table(name="social")
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity
 */
class Social
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
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=255, nullable=false)
     */
    private $url;

    
    /**
      * @var string
     * @Assert\File( maxSize = "1024k", mimeTypesMessage = "Please upload a valid Image")
     *
     * @ORM\Column(name="icon", type="string", length=255, nullable=false)
     */
    private $icon;

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
     * @return Social
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
     * Set url
     *
     * @param string $url
     * @return Social
     */
    public function setUrl($url)
    {
        $this->url = $url;
    
        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    
   
    
   
    /**
     * Set icon
     *
     * @param string $icon
     * @return Social
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
        return $this->getTmpUploadRootDir()."social/";
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
        //if (is_dir($this->getUploadRootDir()))rmdir($this->getUploadRootDir());
    }
    
    public function removeOldImage($oldicon)
    {
        if (file_exists($this->getUploadRootDir().$oldicon))unlink($this->getUploadRootDir().$oldicon);
        //if (is_dir($this->getUploadRootDir()))rmdir($this->getUploadRootDir());
    }
}