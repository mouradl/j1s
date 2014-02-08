<?php

namespace Tuni\AnnonceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Promotion
 */
class Promotion
{
    /**
     * @var float
     */
    private $remise;

    /**
     * @var string
     */
    private $remiseType;

    /**
     * @var \DateTime
     */
    private $dateDebut;

    /**
     * @var \DateTime
     */
    private $dateFin;

    /**
     * @var boolean
     */
    private $active;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $abonnement;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->abonnement = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Set remise
     *
     * @param float $remise
     * @return Promotion
     */
    public function setRemise($remise)
    {
        $this->remise = $remise;

        return $this;
    }

    /**
     * Get remise
     *
     * @return float 
     */
    public function getRemise()
    {
        return $this->remise;
    }

    /**
     * Set remiseType
     *
     * @param string $remiseType
     * @return Promotion
     */
    public function setRemiseType($remiseType)
    {
        $this->remiseType = $remiseType;

        return $this;
    }

    /**
     * Get remiseType
     *
     * @return string 
     */
    public function getRemiseType()
    {
        return $this->remiseType;
    }

    /**
     * Set dateDebut
     *
     * @param \DateTime $dateDebut
     * @return Promotion
     */
    public function setDateDebut($dateDebut)
    {
        $this->dateDebut = $dateDebut;

        return $this;
    }

    /**
     * Get dateDebut
     *
     * @return \DateTime 
     */
    public function getDateDebut()
    {
        return $this->dateDebut;
    }

    /**
     * Set dateFin
     *
     * @param \DateTime $dateFin
     * @return Promotion
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;

        return $this;
    }

    /**
     * Get dateFin
     *
     * @return \DateTime 
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * Set active
     *
     * @param boolean $active
     * @return Promotion
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Add abonnement
     *
     * @param \Tuni\AnnonceBundle\Entity\Abonnement $abonnement
     * @return Promotion
     */
    public function addAbonnement(\Tuni\AnnonceBundle\Entity\Abonnement $abonnement)
    {
        $this->abonnement[] = $abonnement;

        return $this;
    }

    /**
     * Remove abonnement
     *
     * @param \Tuni\AnnonceBundle\Entity\Abonnement $abonnement
     */
    public function removeAbonnement(\Tuni\AnnonceBundle\Entity\Abonnement $abonnement)
    {
        $this->abonnement->removeElement($abonnement);
    }

    /**
     * Get abonnement
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getAbonnement()
    {
        return $this->abonnement;
    }
}
