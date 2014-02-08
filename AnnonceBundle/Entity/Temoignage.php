<?php

namespace Tuni\AnnonceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Temoignage
 *
 * @ORM\Table(name="temoignage")
 * @ORM\Entity
 */
class Temoignage
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
     * @ORM\Column(name="titre", type="string", length=100, nullable=false)
     */
    private $titre;

    
    /**
     * @var string
     *
     * @ORM\Column(name="texte", type="string", length=1000, nullable=false)
     */
    private $texte;

   /**
     * @var boolean
     *
     * @ORM\Column(name="is_publier", type="boolean", nullable=true)
     */
    private $isPublier;

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
     * Set titre
     *
     * @param string $titre
     * @return Temoignage
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
     * Set texte
     *
     * @param string $texte
     * @return Temoignage
     */
    public function setTexte($texte)
    {
        $this->texte = $texte;
    
        return $this;
    }

    /**
     * Get texte
     *
     * @return string 
     */
    public function getTexte()
    {
        return $this->texte;
    }

   

    /**
     * Set isPublier
     *
     * @param boolean $isPublier
     * @return Temoignage
     */
    public function setIsPublier($isPublier)
    {
        $this->isPublier = $isPublier;
    
        return $this;
    }

    /**
     * Get isPublier
     *
     * @return boolean 
     */
    public function getIsPublier()
    {
        return $this->isPublier;
    }

    public function __toString() {
        return "$this->titre";
    }
}