<?php

namespace Tuni\AnnonceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Attribut
 *
 * @ORM\Table(name="attribut")
 * @ORM\Entity
 */
class Attribut
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
     * @ORM\Column(name="nom", type="string", length=100, nullable=false)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="unite", type="string", length=30, nullable=true)
     */
    private $unite;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=100, nullable=true)
     */
    private $libelle;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_selectbox", type="boolean", nullable=true)
     */
    private $isSelectbox;
   /**
     * @var boolean
     *
     * @ORM\Column(name="is_required", type="boolean", nullable=true)
     */
    private $isRequired;

    /**
     * @var \Doctrine\Common\Collections\Collection
     **/
     // //ORM\ManyToMany(targetEntity="SousCategorie", mappedBy="attribut")
     
    private $sousCat;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->sousCat = new \Doctrine\Common\Collections\ArrayCollection();
    }
    

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
     * Set nom
     *
     * @param string $nom
     * @return Attribut
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
     * Set unite
     *
     * @param string $unite
     * @return Attribut
     */
    public function setUnite($unite)
    {
        $this->unite = $unite;
    
        return $this;
    }

    /**
     * Get unite
     *
     * @return string 
     */
    public function getUnite()
    {
        return $this->unite;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     * @return Attribut
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    
        return $this;
    }

    /**
     * Get libelle
     *
     * @return string 
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set isSelectbox
     *
     * @param boolean $isSelectbox
     * @return Attribut
     */
    public function setIsSelectbox($isSelectbox)
    {
        $this->isSelectbox = $isSelectbox;
    
        return $this;
    }

    /**
     * Get isSelectbox
     *
     * @return boolean 
     */
    public function getIsSelectbox()
    {
        return $this->isSelectbox;
    }

    /**
     * Set isRequired
     *
     * @param boolean $isRequired
     * @return Attribut
     */
    public function setIsRequired($isRequired)
    {
        $this->isRequired = $isRequired;
    
        return $this;
    }

    /**
     * Get isRequired
     *
     * @return boolean 
     */
    public function getIsRequired()
    {
        return $this->isRequired;
    }

    /**
     * Add sousCat
     *
     * @param \Tuni\AnnonceBundle\Entity\SousCategorie $sousCat
     * @return Attribut
     */
    public function addSousCat(\Tuni\AnnonceBundle\Entity\SousCategorie $sousCat)
    {
        $this->sousCat[] = $sousCat;
    
        return $this;
    }

    /**
     * Remove sousCat
     *
     * @param \Tuni\AnnonceBundle\Entity\SousCategorie $sousCat
     */
    public function removeSousCat(\Tuni\AnnonceBundle\Entity\SousCategorie $sousCat)
    {
        $this->sousCat->removeElement($sousCat);
    }

    /**
     * Get sousCat
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSousCat()
    {
        return $this->sousCat;
    }
    public function __toString() {
        return "$this->nom";
    }
}