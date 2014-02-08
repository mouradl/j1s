<?php

namespace Tuni\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Annonce
 *
 * @ORM\Table(name="annonce")
 * @ORM\Entity
 */
class Annonce
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
     * @ORM\Column(name="titre_ann", type="string", length=30, nullable=false)
     */
    private $titreAnn;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=255, nullable=true)
     */
    private $adresse;

    /**
     * @var integer
     *
     * @ORM\Column(name="code_postal", type="integer", nullable=true)
     */
    private $codePostal;

    /**
     * @var integer
     *
     * @ORM\Column(name="prix_ann", type="integer", nullable=false)
     */
    private $prixAnn;

    /**
     * @var boolean
     *
     * @ORM\Column(name="prix_negociable", type="boolean", nullable=true)
     */
    private $prixNegociable;

    /**
     * @var string
     *
     * @ORM\Column(name="type_ann", type="string", length=100, nullable=false)
     */
    private $typeAnn;

    /**
     * @var string
     *
     * @ORM\Column(name="logo", type="string", length=255, nullable=true)
     */
    private $logo;

    /**
     * @var string
     *
     * @ORM\Column(name="desc_ann", type="text", nullable=false)
     */
    private $descAnn;

    /**
     * @var string
     *
     * @ORM\Column(name="mot_cles", type="string", length=30, nullable=false)
     */
    private $motCles;

    /**
     * @var string
     *
     * @ORM\Column(name="images_ann", type="string", length=20, nullable=false)
     */
    private $imagesAnn;

    /**
     * @var string
     *
     * @ORM\Column(name="vidieo_ann", type="string", length=35, nullable=true)
     */
    private $vidieoAnn;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_annonce", type="date", nullable=false)
     */
    private $dateAnnonce;

    /**
     * @var boolean
     *
     * @ORM\Column(name="publier", type="boolean", nullable=false)
     */
    private $publier;

    /**
     * @var \MailExpiration
     *
     * @ORM\ManyToOne(targetEntity="MailExpiration")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="mail_expiration_id", referencedColumnName="id")
     * })
     */
    private $mailExpiration;

    /**
     * @var \Membre
     *
     * @ORM\ManyToOne(targetEntity="Membre")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="membre_id", referencedColumnName="id")
     * })
     */
    private $membre;

    /**
     * @var \Devise
     *
     * @ORM\ManyToOne(targetEntity="Devise")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="devise_id", referencedColumnName="id")
     * })
     */
    private $devise;

    /**
     * @var \StatutAnnonce
     *
     * @ORM\ManyToOne(targetEntity="StatutAnnonce")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="statut_annonce_id", referencedColumnName="id")
     * })
     */
    private $statutAnnonce;

    /**
     * @var \Ville
     *
     * @ORM\ManyToOne(targetEntity="Ville")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="ville_id", referencedColumnName="id")
     * })
     */
    private $ville;

    /**
     * @var \SousCategorie
     *
     * @ORM\ManyToOne(targetEntity="SousCategorie")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="sous_cat_id", referencedColumnName="id")
     * })
     */
    private $sousCat;

/**
     * @var \TypeAnnonce
     *
     * @ORM\ManyToOne(targetEntity="TypeAnnonce")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="typeannonceid", referencedColumnName="id")
     * })
     */
    private $typeAnnonce;



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
     * Set titreAnn
     *
     * @param string $titreAnn
     * @return Annonce
     */
    public function setTitreAnn($titreAnn)
    {
        $this->titreAnn = $titreAnn;
    
        return $this;
    }

    /**
     * Get titreAnn
     *
     * @return string 
     */
    public function getTitreAnn()
    {
        return $this->titreAnn;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     * @return Annonce
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
     * Set codePostal
     *
     * @param integer $codePostal
     * @return Annonce
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
     * Set prixAnn
     *
     * @param integer $prixAnn
     * @return Annonce
     */
    public function setPrixAnn($prixAnn)
    {
        $this->prixAnn = $prixAnn;
    
        return $this;
    }

    /**
     * Get prixAnn
     *
     * @return integer 
     */
    public function getPrixAnn()
    {
        return $this->prixAnn;
    }

    /**
     * Set prixNegociable
     *
     * @param boolean $prixNegociable
     * @return Annonce
     */
    public function setPrixNegociable($prixNegociable)
    {
        $this->prixNegociable = $prixNegociable;
    
        return $this;
    }

    /**
     * Get prixNegociable
     *
     * @return boolean 
     */
    public function getPrixNegociable()
    {
        return $this->prixNegociable;
    }

    /**
     * Set typeAnn
     *
     * @param string $typeAnn
     * @return Annonce
     */
    public function setTypeAnn($typeAnn)
    {
        $this->typeAnn = $typeAnn;
    
        return $this;
    }

    /**
     * Get typeAnn
     *
     * @return string 
     */
    public function getTypeAnn()
    {
        return $this->typeAnn;
    }

    /**
     * Set logo
     *
     * @param string $logo
     * @return Annonce
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
     * Set descAnn
     *
     * @param string $descAnn
     * @return Annonce
     */
    public function setDescAnn($descAnn)
    {
        $this->descAnn = $descAnn;
    
        return $this;
    }

    /**
     * Get descAnn
     *
     * @return string 
     */
    public function getDescAnn()
    {
        return $this->descAnn;
    }

    /**
     * Set motCles
     *
     * @param string $motCles
     * @return Annonce
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
     * Set imagesAnn
     *
     * @param string $imagesAnn
     * @return Annonce
     */
    public function setImagesAnn($imagesAnn)
    {
        $this->imagesAnn = $imagesAnn;
    
        return $this;
    }

    /**
     * Get imagesAnn
     *
     * @return string 
     */
    public function getImagesAnn()
    {
        return $this->imagesAnn;
    }

    /**
     * Set vidieoAnn
     *
     * @param string $vidieoAnn
     * @return Annonce
     */
    public function setVidieoAnn($vidieoAnn)
    {
        $this->vidieoAnn = $vidieoAnn;
    
        return $this;
    }

    /**
     * Get vidieoAnn
     *
     * @return string 
     */
    public function getVidieoAnn()
    {
        return $this->vidieoAnn;
    }

    /**
     * Set dateAnnonce
     *
     * @param \DateTime $dateAnnonce
     * @return Annonce
     */
    public function setDateAnnonce($dateAnnonce)
    {
        $this->dateAnnonce = $dateAnnonce;
    
        return $this;
    }

    /**
     * Get dateAnnonce
     *
     * @return \DateTime 
     */
    public function getDateAnnonce()
    {
        return $this->dateAnnonce;
    }

    /**
     * Set publier
     *
     * @param boolean $publier
     * @return Annonce
     */
    public function setPublier($publier)
    {
        $this->publier = $publier;
    
        return $this;
    }

    /**
     * Get publier
     *
     * @return boolean 
     */
    public function getPublier()
    {
        return $this->publier;
    }

    /**
     * Set mailExpiration
     *
     * @param \Tuni\AdminBundle\Entity\MailExpiration $mailExpiration
     * @return Annonce
     */
    public function setMailExpiration(\Tuni\AdminBundle\Entity\MailExpiration $mailExpiration = null)
    {
        $this->mailExpiration = $mailExpiration;
    
        return $this;
    }

    /**
     * Get mailExpiration
     *
     * @return \Tuni\AdminBundle\Entity\MailExpiration 
     */
    public function getMailExpiration()
    {
        return $this->mailExpiration;
    }

    /**
     * Set membre
     *
     * @param \Tuni\AdminBundle\Entity\Membre $membre
     * @return Annonce
     */
    public function setMembre(\Tuni\AdminBundle\Entity\Membre $membre = null)
    {
        $this->membre = $membre;
    
        return $this;
    }

    /**
     * Get membre
     *
     * @return \Tuni\AdminBundle\Entity\Membre 
     */
    public function getMembre()
    {
        return $this->membre;
    }

    /**
     * Set devise
     *
     * @param \Tuni\AdminBundle\Entity\Devise $devise
     * @return Annonce
     */
    public function setDevise(\Tuni\AdminBundle\Entity\Devise $devise = null)
    {
        $this->devise = $devise;
    
        return $this;
    }

    /**
     * Get devise
     *
     * @return \Tuni\AdminBundle\Entity\Devise 
     */
    public function getDevise()
    {
        return $this->devise;
    }

    /**
     * Set statutAnnonce
     *
     * @param \Tuni\AdminBundle\Entity\StatutAnnonce $statutAnnonce
     * @return Annonce
     */
    public function setStatutAnnonce(\Tuni\AdminBundle\Entity\StatutAnnonce $statutAnnonce = null)
    {
        $this->statutAnnonce = $statutAnnonce;
    
        return $this;
    }

    /**
     * Get statutAnnonce
     *
     * @return \Tuni\AdminBundle\Entity\StatutAnnonce 
     */
    public function getStatutAnnonce()
    {
        return $this->statutAnnonce;
    }

    /**
     * Set ville
     *
     * @param \Tuni\AdminBundle\Entity\Ville $ville
     * @return Annonce
     */
    public function setVille(\Tuni\AdminBundle\Entity\Ville $ville = null)
    {
        $this->ville = $ville;
    
        return $this;
    }

    /**
     * Get ville
     *
     * @return \Tuni\AdminBundle\Entity\Ville 
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set sousCat
     *
     * @param \Tuni\AdminBundle\Entity\SousCategorie $sousCat
     * @return Annonce
     */
    public function setSousCat(\Tuni\AdminBundle\Entity\SousCategorie $sousCat = null)
    {
        $this->sousCat = $sousCat;
    
        return $this;
    }

    /**
     * Get sousCat
     *
     * @return \Tuni\AdminBundle\Entity\SousCategorie 
     */
    public function getSousCat()
    {
        return $this->sousCat;
    }
    
    /**
     * Set typeAnnonce
     *
     * @param \Tuni\AdminBundle\Entity\TypeAnnonce $typeAnnonce
     * @return Categorie
     */
    public function setTypeAnnonce(\Tuni\AdminBundle\Entity\TypeAnnonce $typeAnnonce = null)
    {
        $this->typeAnnonce = $typeAnnonce;
    
        return $this;
    }

    /**
     * Get typeAnnonce
     *
     * @return \Tuni\AdminBundle\Entity\TypeAnnonce 
     */
    public function getTypeAnnonce()
    {
        return $this->typeAnnonce;
    }
}