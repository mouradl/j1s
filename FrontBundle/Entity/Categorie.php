<?php

namespace Tuni\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Categorie
 */
class Categorie
{
    /**
     * @var string
     */
    private $nomCat;

    /**
     * @var boolean
     */
    private $isPublished;

    /**
     * @var string
     */
    private $descCat;

    /**
     * @var string
     */
    private $motCles;

    /**
     * @var string
     */
    private $icon;

    /**
     * @var integer
     */
    private $id;


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
     * @return Categorie
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

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
