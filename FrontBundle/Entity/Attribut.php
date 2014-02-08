<?php

namespace Tuni\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Attribut
 */
class Attribut
{
    /**
     * @var string
     */
    private $nom;

    /**
     * @var string
     */
    private $unite;

    /**
     * @var string
     */
    private $libelle;

    /**
     * @var boolean
     */
    private $isRequired;

    /**
     * @var boolean
     */
    private $isSelectbox;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $sousCat;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->sousCat = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Add sousCat
     *
     * @param \Tuni\FrontBundle\Entity\Souscategorie $sousCat
     * @return Attribut
     */
    public function addSousCat(\Tuni\FrontBundle\Entity\Souscategorie $sousCat)
    {
        $this->sousCat[] = $sousCat;

        return $this;
    }

    /**
     * Remove sousCat
     *
     * @param \Tuni\FrontBundle\Entity\Souscategorie $sousCat
     */
    public function removeSousCat(\Tuni\FrontBundle\Entity\Souscategorie $sousCat)
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
}
