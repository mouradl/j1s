<?php

namespace Tuni\FrontBundle\Entity;

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
     * @var \Tuni\FrontBundle\Entity\Facture
     */
    private $facture;

    /**
     * @var \Tuni\FrontBundle\Entity\Abonnement
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
     * @param \Tuni\FrontBundle\Entity\Facture $facture
     * @return Lignefacture
     */
    public function setFacture(\Tuni\FrontBundle\Entity\Facture $facture = null)
    {
        $this->facture = $facture;

        return $this;
    }

    /**
     * Get facture
     *
     * @return \Tuni\FrontBundle\Entity\Facture 
     */
    public function getFacture()
    {
        return $this->facture;
    }

    /**
     * Set abonnement
     *
     * @param \Tuni\FrontBundle\Entity\Abonnement $abonnement
     * @return Lignefacture
     */
    public function setAbonnement(\Tuni\FrontBundle\Entity\Abonnement $abonnement = null)
    {
        $this->abonnement = $abonnement;

        return $this;
    }

    /**
     * Get abonnement
     *
     * @return \Tuni\FrontBundle\Entity\Abonnement 
     */
    public function getAbonnement()
    {
        return $this->abonnement;
    }
}
