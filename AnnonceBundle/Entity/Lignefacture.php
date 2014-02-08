<?php

namespace Tuni\AnnonceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Lignefacture
 */
class Lignefacture
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Tuni\AnnonceBundle\Entity\Facture
     */
    private $facture;

    /**
     * @var \Tuni\AnnonceBundle\Entity\Abonnement
     */
    private $abonnement;


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
     * Set facture
     *
     * @param \Tuni\AnnonceBundle\Entity\Facture $facture
     * @return Lignefacture
     */
    public function setFacture(\Tuni\AnnonceBundle\Entity\Facture $facture = null)
    {
        $this->facture = $facture;

        return $this;
    }

    /**
     * Get facture
     *
     * @return \Tuni\AnnonceBundle\Entity\Facture 
     */
    public function getFacture()
    {
        return $this->facture;
    }

    /**
     * Set abonnement
     *
     * @param \Tuni\AnnonceBundle\Entity\Abonnement $abonnement
     * @return Lignefacture
     */
    public function setAbonnement(\Tuni\AnnonceBundle\Entity\Abonnement $abonnement = null)
    {
        $this->abonnement = $abonnement;

        return $this;
    }

    /**
     * Get abonnement
     *
     * @return \Tuni\AnnonceBundle\Entity\Abonnement 
     */
    public function getAbonnement()
    {
        return $this->abonnement;
    }
}
