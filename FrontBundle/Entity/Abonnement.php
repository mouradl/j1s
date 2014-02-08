<?php

namespace Tuni\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Abonnement
 */
class Abonnement
{
    /**
     * @var string
     */
    private $nom;

    /**
     * @var string
     */
    private $description;

    /**
     * @var integer
     */
    private $typeMembre;

    /**
     * @var string
     */
    private $listeType;

    /**
     * @var integer
     */
    private $listeDure;

    /**
     * @var boolean
     */
    private $prioritaire;

    /**
     * @var integer
     */
    private $nombreImage;

    /**
     * @var boolean
     */
    private $video;

    /**
     * @var float
     */
    private $pixUnitaire;

    /**
     * @var integer
     */
    private $quantite;

    /**
     * @var float
     */
    private $prix;

    /**
     * @var integer
     */
    private $expiration;

    /**
     * @var boolean
     */
    private $active;

    /**
     * @var \DateTime
     */
    private $dateDebDisponible;

    /**
     * @var \DateTime
     */
    private $dateFinDisponible;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $promotion;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->promotion = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Abonnement
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
     * Set description
     *
     * @param string $description
     * @return Abonnement
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set typeMembre
     *
     * @param integer $typeMembre
     * @return Abonnement
     */
    public function setTypeMembre($typeMembre)
    {
        $this->typeMembre = $typeMembre;

        return $this;
    }

    /**
     * Get typeMembre
     *
     * @return integer 
     */
    public function getTypeMembre()
    {
        return $this->typeMembre;
    }

    /**
     * Set listeType
     *
     * @param string $listeType
     * @return Abonnement
     */
    public function setListeType($listeType)
    {
        $this->listeType = $listeType;

        return $this;
    }

    /**
     * Get listeType
     *
     * @return string 
     */
    public function getListeType()
    {
        return $this->listeType;
    }

    /**
     * Set listeDure
     *
     * @param integer $listeDure
     * @return Abonnement
     */
    public function setListeDure($listeDure)
    {
        $this->listeDure = $listeDure;

        return $this;
    }

    /**
     * Get listeDure
     *
     * @return integer 
     */
    public function getListeDure()
    {
        return $this->listeDure;
    }

    /**
     * Set prioritaire
     *
     * @param boolean $prioritaire
     * @return Abonnement
     */
    public function setPrioritaire($prioritaire)
    {
        $this->prioritaire = $prioritaire;

        return $this;
    }

    /**
     * Get prioritaire
     *
     * @return boolean 
     */
    public function getPrioritaire()
    {
        return $this->prioritaire;
    }

    /**
     * Set nombreImage
     *
     * @param integer $nombreImage
     * @return Abonnement
     */
    public function setNombreImage($nombreImage)
    {
        $this->nombreImage = $nombreImage;

        return $this;
    }

    /**
     * Get nombreImage
     *
     * @return integer 
     */
    public function getNombreImage()
    {
        return $this->nombreImage;
    }

    /**
     * Set video
     *
     * @param boolean $video
     * @return Abonnement
     */
    public function setVideo($video)
    {
        $this->video = $video;

        return $this;
    }

    /**
     * Get video
     *
     * @return boolean 
     */
    public function getVideo()
    {
        return $this->video;
    }

    /**
     * Set pixUnitaire
     *
     * @param float $pixUnitaire
     * @return Abonnement
     */
    public function setPixUnitaire($pixUnitaire)
    {
        $this->pixUnitaire = $pixUnitaire;

        return $this;
    }

    /**
     * Get pixUnitaire
     *
     * @return float 
     */
    public function getPixUnitaire()
    {
        return $this->pixUnitaire;
    }

    /**
     * Set quantite
     *
     * @param integer $quantite
     * @return Abonnement
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return integer 
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * Set prix
     *
     * @param float $prix
     * @return Abonnement
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return float 
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set expiration
     *
     * @param integer $expiration
     * @return Abonnement
     */
    public function setExpiration($expiration)
    {
        $this->expiration = $expiration;

        return $this;
    }

    /**
     * Get expiration
     *
     * @return integer 
     */
    public function getExpiration()
    {
        return $this->expiration;
    }

    /**
     * Set active
     *
     * @param boolean $active
     * @return Abonnement
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean 
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set dateDebDisponible
     *
     * @param \DateTime $dateDebDisponible
     * @return Abonnement
     */
    public function setDateDebDisponible($dateDebDisponible)
    {
        $this->dateDebDisponible = $dateDebDisponible;

        return $this;
    }

    /**
     * Get dateDebDisponible
     *
     * @return \DateTime 
     */
    public function getDateDebDisponible()
    {
        return $this->dateDebDisponible;
    }

    /**
     * Set dateFinDisponible
     *
     * @param \DateTime $dateFinDisponible
     * @return Abonnement
     */
    public function setDateFinDisponible($dateFinDisponible)
    {
        $this->dateFinDisponible = $dateFinDisponible;

        return $this;
    }

    /**
     * Get dateFinDisponible
     *
     * @return \DateTime 
     */
    public function getDateFinDisponible()
    {
        return $this->dateFinDisponible;
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
     * Add promotion
     *
     * @param \Tuni\FrontBundle\Entity\Promotion $promotion
     * @return Abonnement
     */
    public function addPromotion(\Tuni\FrontBundle\Entity\Promotion $promotion)
    {
        $this->promotion[] = $promotion;

        return $this;
    }

    /**
     * Remove promotion
     *
     * @param \Tuni\FrontBundle\Entity\Promotion $promotion
     */
    public function removePromotion(\Tuni\FrontBundle\Entity\Promotion $promotion)
    {
        $this->promotion->removeElement($promotion);
    }

    /**
     * Get promotion
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPromotion()
    {
        return $this->promotion;
    }
}
