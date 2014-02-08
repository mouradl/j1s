<?php

namespace Tuni\AnnonceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SousCategorie
 *
 * @ORM\Table(name="souscategorie")
 * @ORM\Entity
 */
class SousCategorie
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
     * @ORM\Column(name="nom_sous_cat", type="string", length=50, nullable=false)
     */
    private $nomSousCat;

    /**
     * @var string
     *
     * @ORM\Column(name="desc_sous_cat", type="string", length=100, nullable=true)
     */
    private $descSousCat;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="Attribut", inversedBy="sousCat")
     * @ORM\JoinTable(name="attribut_souscategorie",
     *   joinColumns={
     *     @ORM\JoinColumn(name="sous_cat_id", referencedColumnName="id")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="attribut_id", referencedColumnName="id")
     *   }
     * )
     */
    private $attribut;

    /**
     * @var \Categorie
     *
     * @ORM\ManyToOne(targetEntity="Categorie")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="categorieid", referencedColumnName="id")
     * })
     */
    private $categorie;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->attribut = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set nomSousCat
     *
     * @param string $nomSousCat
     * @return SousCategorie
     */
    public function setNomSousCat($nomSousCat)
    {
        $this->nomSousCat = $nomSousCat;
    
        return $this;
    }

    /**
     * Get nomSousCat
     *
     * @return string 
     */
    public function getNomSousCat()
    {
        return $this->nomSousCat;
    }

    /**
     * Set descSousCat
     *
     * @param string $descSousCat
     * @return SousCategorie
     */
    public function setDescSousCat($descSousCat)
    {
        $this->descSousCat = $descSousCat;
    
        return $this;
    }

    /**
     * Get descSousCat
     *
     * @return string 
     */
    public function getDescSousCat()
    {
        return $this->descSousCat;
    }

    /**
     * Add attribut
     *
     * @param \Tuni\AnnonceBundle\Entity\Attribut $attribut
     * @return SousCategorie
     */
    public function addAttribut(\Tuni\AnnonceBundle\Entity\Attribut $attribut)
    {
        $this->attribut[] = $attribut;
    
        return $this;
    }

    /**
     * Remove attribut
     *
     * @param \Tuni\AnnonceBundle\Entity\Attribut $attribut
     */
    public function removeAttribut(\Tuni\AnnonceBundle\Entity\Attribut $attribut)
    {
        $this->attribut->removeElement($attribut);
    }

    /**
     * Get attribut
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAttribut()
    {
        return $this->attribut;
    }

    /**
     * Set categorie
     *
     * @param \Tuni\AnnonceBundle\Entity\Categorie $categorie
     * @return SousCategorie
     */
    public function setCategorie(\Tuni\AnnonceBundle\Entity\Categorie $categorie = null)
    {
        $this->categorie = $categorie;
    
        return $this;
    }

    /**
     * Get categorie
     *
     * @return \Tuni\AnnonceBundle\Entity\Categorie 
     */
    public function getCategorie()
    {
        return $this->categorie;
    }
}