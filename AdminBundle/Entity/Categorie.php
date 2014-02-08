<?php

namespace Tuni\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categorie
 *
 * @ORM\Table(name="categorie")
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

}