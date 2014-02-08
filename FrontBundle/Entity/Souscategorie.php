<?php

namespace Tuni\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Souscategorie
 */
class Souscategorie
{
    /**
     * @var string
     */
    private $nomSousCat;

    /**
     * @var string
     */
    private $descSousCat;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Tuni\FrontBundle\Entity\Categorie
     */
    private $categorieid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $attribut;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->attribut = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set nomSousCat
     *
     * @param string $nomSousCat
     * @return Souscategorie
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
     * @return Souscategorie
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set categorieid
     *
     * @param \Tuni\FrontBundle\Entity\Categorie $categorieid
     * @return Souscategorie
     */
    public function setCategorieid(\Tuni\FrontBundle\Entity\Categorie $categorieid = null)
    {
        $this->categorieid = $categorieid;

        return $this;
    }

    /**
     * Get categorieid
     *
     * @return \Tuni\FrontBundle\Entity\Categorie 
     */
    public function getCategorieid()
    {
        return $this->categorieid;
    }

    /**
     * Add attribut
     *
     * @param \Tuni\FrontBundle\Entity\Attribut $attribut
     * @return Souscategorie
     */
    public function addAttribut(\Tuni\FrontBundle\Entity\Attribut $attribut)
    {
        $this->attribut[] = $attribut;

        return $this;
    }

    /**
     * Remove attribut
     *
     * @param \Tuni\FrontBundle\Entity\Attribut $attribut
     */
    public function removeAttribut(\Tuni\FrontBundle\Entity\Attribut $attribut)
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
}
