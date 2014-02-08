<?php

namespace Tuni\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Membre
 *
 * @ORM\Table(name="membre")
 * @ORM\HasLifecycleCallbacks
 * @ORM\Entity
 */
class Membre
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
     * @ORM\Column(name="civilite", type="string", length=30, nullable=false)
     */
    private $civilite;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=20, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=20, nullable=false)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="entreprise", type="string", length=100, nullable=true)
     */
    private $entreprise;

    /**
     * @var string
     *
     * @ORM\Column(name="siret", type="string", length=100, nullable=true)
     */
    private $siret;

    /**
     * @var integer
     *
     * @ORM\Column(name="age", type="integer", nullable=true)
     */
    private $age;

    /**
     * @var string
     *
     * @ORM\Column(name="tel", type="string", length=30, nullable=false)
     */
    private $tel;

    /**
     * @var boolean
     *
     * @ORM\Column(name="cache_phone", type="boolean", nullable=true)
     */
    private $cachePhone;

    /**
     * @var string
     *
     * @ORM\Column(name="fax", type="string", length=30, nullable=true)
     */
    private $fax;

     /**
     * @var string
     *
     * @ORM\Column(name="codepostal", type="integer", nullable=true)
     */
    private $codePostal;
       
    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255, nullable=false)
     */
    private $adresse;
    
    /**
     * @var string
     *
     * @ORM\Column(name="parrain", type="string", length=255, nullable=true)
     */
    private $parrain;
      /**
     * @var string
     *
     * @ORM\Column(name="filleul", type="string", length=255, nullable=true)
     */
    private $filleul;
    
    /**
     * @var string
     *
     * @ORM\Column(name="justificatifs", type="text", nullable=true)
     */
    private $justificatifs;
    
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="is_visible_justificatifs", type="boolean", nullable=true)
     */
    private $isVisbleJustificatifs;
    
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="is_confirmed_parrain", type="boolean", nullable=true)
     */
    private $isConfirmedParrain;
        
    /**
     * @var boolean
     *
     * @ORM\Column(name="ispreminum", type="boolean", nullable=true)
     */
    private $isPreminum;
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="registred_user", type="date", nullable=false)
     */
    private $registredUser;

    /**
      * @var string
     * @Assert\File( maxSize = "1024k", mimeTypesMessage = "Please upload a valid Image")
     *
     * @ORM\Column(name="logo", type="string", length=255, nullable=true)
     */
    private $logo;
    
    
    /**
      * @var string
     * @Assert\File( maxSize = "1024k", mimeTypesMessage = "Please upload a valid Image")
     *
     * @ORM\Column(name="pieceidentite", type="string", length=255, nullable=true)
     */
    private $pieceIdentite;

    /**
     * @var integer
     *
     * @ORM\Column(name="indice_confiance", type="integer", nullable=true)
     */
    private $indiceConfiance;
    
    /**
     * @var boolean
     *
     * @ORM\Column(name="is_not_fake", type="boolean", nullable=true)
     */
    private $isNotFake;
    
    /**
     * @var integer
     *
     * @ORM\Column(name="evaluation", type="integer", nullable=true)
     */
    
    private $evaluation;
        /**
     * @var integer
     *
     * @ORM\Column(name="numerocarte", type="integer", nullable=true)
     */
    private $numeroCarte;
/**
     * @var \DateTime
     *
     * @ORM\Column(name="dateexpiration", type="date", nullable=true)
     */
    private $dateExpiration;
 
    /**
     * @var string
     *
     * @ORM\Column(name="codecvc", type="string", length=3, nullable=true)
     */
    private $codeCvc;
    
   
    /**
     * @var \StatutMembre
     *
     * @ORM\ManyToOne(targetEntity="StatutMembre")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="statut_membre_id", referencedColumnName="id")
     * })
     */
    private $statutMembre;

    /**
     * @var \Utilisateur
     *
     * @ORM\ManyToOne(targetEntity="Utilisateur")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="utilisateur_id", referencedColumnName="id")
     * })
     */
    private $utilisateur;



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
     * Set civilite
     *
     * @param string $civilite
     * @return Membre
     */
    public function setCivilite($civilite)
    {
        $this->civilite = $civilite;
    
        return $this;
    }

    /**
     * Get civilite
     *
     * @return string 
     */
    public function getCivilite()
    {
        return $this->civilite;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Membre
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    
        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     * @return Membre
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    
        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set entreprise
     *
     * @param string $entreprise
     * @return Membre
     */
    public function setEntreprise($entreprise)
    {
        $this->entreprise = $entreprise;
    
        return $this;
    }

    /**
     * Get entreprise
     *
     * @return string 
     */
    public function getEntreprise()
    {
        return $this->entreprise;
    }

    /**
     * Set siret
     *
     * @param string $siret
     * @return Membre
     */
    public function setSiret($siret)
    {
        $this->siret = $siret;
    
        return $this;
    }

    /**
     * Get siret
     *
     * @return string 
     */
    public function getSiret()
    {
        return $this->siret;
    }

    /**
     * Set age
     *
     * @param integer $age
     * @return Membre
     */
    public function setAge($age)
    {
        $this->age = $age;
    
        return $this;
    }

    /**
     * Get age
     *
     * @return integer 
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set indiceConfiance
     *
     * @param integer $indiceConfiance
     * @return Membre
     */
    public function setIndiceConfiance($indiceConfiance)
    {
        $this->indiceConfiance = $indiceConfiance;
    
        return $this;
    }

    /**
     * Get indiceConfiance
     *
     * @return integer 
     */
    public function getIndiceConfiance()
    {
        return $this->indiceConfiance;
    }

    /**
     * Set evaluation
     *
     * @param integer $evaluation
     * @return Membre
     */
    public function setEvaluation($evaluation)
    {
        $this->evaluation = $evaluation;
    
        return $this;
    }

    /**
     * Get evaluation
     *
     * @return integer 
     */
    public function getEvaluation()
    {
        return $this->evaluation;
    }
/**
     * Set numeroCarte
     *
     * @param integer $numeroCarte
     * @return Membre
     */
    public function setNumeroCarte($numeroCarte)
    {
        $this->numeroCarte = $numeroCarte;
    
        return $this;
    }

    /**
     * Get numeroCarte
     *
     * @return integer 
     */
    public function getNumeroCarte()
    {
        return $this->numeroCarte;
    }

    /**
     * Set tel
     *
     * @param string $tel
     * @return Membre
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
    
        return $this;
    }

    /**
     * Get tel
     *
     * @return string 
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set cachePhone
     *
     * @param boolean $cachePhone
     * @return Membre
     */
    public function setCachePhone($cachePhone)
    {
        $this->cachePhone = $cachePhone;
    
        return $this;
    }

    /**
     * Get cachePhone
     *
     * @return boolean 
     */
    public function getCachePhone()
    {
        return $this->cachePhone;
    }
    /**
     * Set isPreminum
     *
     * @param boolean $isPreminum
     * @return Membre
     */
    public function setIsPreminum($isPreminum)
    {
        $this->isPreminum = $isPreminum;
    
        return $this;
    }

    /**
     * Get isPreminum
     *
     * @return boolean 
     */
    public function getIsPreminum()
    {
        return $this->isPreminum;
    }
/**
     * Set isConfirmedParrain
     *
     * @param boolean $isConfirmedParrain
     * @return Membre
     */
    public function setIsConfirmedParrain($isConfirmedParrain)
    {
        $this->isConfirmedParrain = $isConfirmedParrain;
    
        return $this;
    }

    /**
     * Get isConfirmedParrain
     *
     * @return boolean 
     */
    public function getIsConfirmedParrain()
    {
        return $this->isConfirmedParrain;
    }
    
/**
     * Set isNotFake
     *
     * @param boolean $isNotFake
     * @return Membre
     */
    public function setIsNotFake($isNotFake)
    {
        $this->isNotFake = $isNotFake;
    
        return $this;
    }

    /**
     * Get isNotFake
     *
     * @return boolean 
     */
    public function getIsNotFake()
    {
        return $this->isNotFake;
    }

    /**
     * Set fax
     *
     * @param string $fax
     * @return Membre
     */
    public function setFax($fax)
    {
        $this->fax = $fax;
    
        return $this;
    }

    /**
     * Get fax
     *
     * @return string 
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     * @return Membre
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    
        return $this;
    }

    /**
     * Get adresse
     *
     * @return string 
     */
    public function getAdresse()
    {
        return $this->adresse;
    }
/**
     * Set parrain
     *
     * @param string $parrain
     * @return Membre
     */
    public function setParrain($parrain)
    {
        $this->parrain = $parrain;
    
        return $this;
    }

    /**
     * Get parrain
     *
     * @return string 
     */
    public function getParrain()
    {
        return $this->parrain;
    }
/**
     * Set filleul
     *
     * @param string $filleul
     * @return Membre
     */
    public function setFilleul($filleul)
    {
        $this->filleul = $filleul;
    
        return $this;
    }

    /**
     * Get filleul
     *
     * @return string 
     */
    public function getFilleul()
    {
        return $this->filleul;
    }
    /**
     * Set registredUser
     *
     * @param \DateTime $registredUser
     * @return Membre
     */
    public function setRegistredUser($registredUser)
    {
        $this->registredUser = $registredUser;
    
        return $this;
    }

    /**
     * Get registredUser
     *
     * @return \DateTime 
     */
    public function getRegistredUser()
    {
        return $this->registredUser;
    }
    /**
     * Set dateExpiration
     *
     * @param \DateTime $dateExpiration
     * @return Membre
     */
    public function setDateExpiration($dateExpiration)
    {
        $this->dateExpiration = $dateExpiration;
    
        return $this;
    }

    /**
     * Get dateExpiration
     *
     * @return \DateTime 
     */
    public function getDateExpiration()
    {
        return $this->dateExpiration;
    }
        /**
     * Set codeCvc
     *
     * @param string $codeCvc
     * @return Membre
     */
    public function setCodeCvc($codeCvc)
    {
        $this->codeCvc = $codeCvc;
    
        return $this;
    }
/**
     * Get codeCvc
     *
     * @return string 
     */
    public function getCodeCvc()
    {
        return $this->codeCvc;
    }
    /**
     * Set pieceIdentite
     *
     * @param string $pieceIdentite
     * @return Membre
     */
    public function setPieceIdentite($pieceIdentite)
    {
        $this->pieceIdentite = $pieceIdentite;
    
        return $this;
    }
/**
     * Get pieceIdentite
     *
     * @return string 
     */
    public function getPieceIdentite()
    {
        return $this->pieceIdentite;
    }
    
    /**
     * Set logo
     *
     * @param string $logo
     * @return Membre
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;
    
        return $this;
    }

    /**
     * Get logo
     *
     * @return string 
     */
    public function getLogo()
    {
        return $this->logo;
    }
/**
     * Set codePostal
     *
     * @param integer $codePostal
     * @return Membre
     */
    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;
    
        return $this;
    }

    /**
     * Get codePostal
     *
     * @return integer 
     */
    public function getCodePostal()
    {
        return $this->codePostal;
    }
    	
    /**
     * Set justificatifs
     *
     * @param string $justificatifs
     * @return Membre
     */
    public function setJustificatifs($justificatifs)
    {
        $this->justificatifs = $justificatifs;
    
        return $this;
    }
/**
     * Get justificatifs
     *
     * @return string 
     */
    public function getJustificatifs()
    {
        return $this->justificatifs;
    }
    /**
     * Set isVisbleJustificatifs
     *
     * @param boolean $isVisbleJustificatifs
     * @return Membre
     */
    public function setIsVisbleJustificatifs($isVisbleJustificatifs)
    {
        $this->isVisbleJustificatifs = $isVisbleJustificatifs;
    
        return $this;
    }

    /**
     * Get isVisbleJustificatifs
     *
     * @return boolean 
     */
    public function getIsVisbleJustificatifs()
    {
        return $this->isVisbleJustificatifs;
    }
    /**
     * Set statutMembre
     *
     * @param \Tuni\AdminBundle\Entity\StatutMembre $statutMembre
     * @return Membre
     */
    public function setStatutMembre(\Tuni\AdminBundle\Entity\StatutMembre $statutMembre = null)
    {
        $this->statutMembre = $statutMembre;
    
        return $this;
    }

    /**
     * Get statutMembre
     *
     * @return \Tuni\AdminBundle\Entity\StatutMembre 
     */
    public function getStatutMembre()
    {
        return $this->statutMembre;
    }

    /**
     * Set utilisateur
     *
     * @param \Tuni\AdminBundle\Entity\Utilisateur $utilisateur
     * @return Membre
     */
    public function setUtilisateur(\Tuni\AdminBundle\Entity\Utilisateur $utilisateur = null)
    {
        $this->utilisateur = $utilisateur;
    
        return $this;
    }

    /**
     * Get utilisateur
     *
     * @return \Tuni\AdminBundle\Entity\Utilisateur 
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }
    public function getFullImagePath() {
        return null === $this->logo ? null : $this->getUploadRootDir(). $this->logo;
    }
 
    protected function getUploadRootDir() {
        // the absolute directory path where uploaded documents should be saved
        return $this->getTmpUploadRootDir().$this->getId()."/";
    }
 
    protected function getTmpUploadRootDir() {
        // the absolute directory path where uploaded documents should be saved
        return __DIR__ . '/../../../../web/upload/logo/';
    }
 
  
    public function uploadImage() {
        // the file property can be empty if the field is not required
         if (isset($this->logo)) {
            
        if (null === $this->logo) {
            return;
        }
        if(!$this->id){
            $this->logo->move($this->getTmpUploadRootDir(), $this->logo->getClientOriginalName());
        }else{
            $this->logo->move($this->getUploadRootDir(), $this->logo->getClientOriginalName());
        }
         $this->setLogo($this->logo->getClientOriginalName());
         
        }
    }
 
    /**
     * @ORM\PostPersist()
     */
    public function moveImage()
    {
        if (null === $this->logo) {
            return;
        }
        if(!is_dir($this->getUploadRootDir())){
            mkdir($this->getUploadRootDir());
        }
        copy($this->getTmpUploadRootDir().$this->logo, $this->getFullImagePath());
        if (file_exists($this->getTmpUploadRootDir()))unlink($this->getTmpUploadRootDir().$this->logo);
    }
 
    /**
     * @ORM\PreRemove()
     */
    public function removeImage()
    {   if (null === $this->logo) {
            return;
        }
        if (file_exists($this->getFullImagePath()))unlink($this->getFullImagePath());
        if (is_dir($this->getUploadRootDir()))rmdir($this->getUploadRootDir());
    }
    
    public function removeOldImage($oldlogo)
    {
        if (file_exists($oldlogo))unlink($this->getUploadRootDir().$oldlogo);
        //if (is_dir($this->getUploadRootDir()))rmdir($this->getUploadRootDir());
    }
    function __toString()
{
    return sprintf('%s  %s', $this->nom, $this->prenom);
}
}