<?php

namespace Tuni\AnnonceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tva
 */
class Tva
{
    /**
     * @var integer
     */
    private $idPays;

    /**
     * @var float
     */
    private $pourcentage;

    /**
     * @var boolean
     */
    private $prixIncluTva;

    /**
     * @var boolean
     */
    private $active;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set idPays
     *
     * @param integer $idPays
     * @return Tva
     */
    public function setIdPays($idPays)
    {
        $this->idPays = $idPays;

        return $this;
    }

    /**
     * Get idPays
     *
     * @return integer 
     */
    public function getIdPays()
    {
        return $this->idPays;
    }

    /**
     * Set pourcentage
     *
     * @param float $pourcentage
     * @return Tva
     */
    public function setPourcentage($pourcentage)
    {
        $this->pourcentage = $pourcentage;

        return $this;
    }

    /**
     * Get pourcentage
     *
     * @return float 
     */
    public function getPourcentage()
    {
        return $this->pourcentage;
    }

    /**
     * Set prixIncluTva
     *
     * @param boolean $prixIncluTva
     * @return Tva
     */
    public function setPrixIncluTva($prixIncluTva)
    {
        $this->prixIncluTva = $prixIncluTva;

        return $this;
    }

    /**
     * Get prixIncluTva
     *
     * @return boolean 
     */
    public function getPrixIncluTva()
    {
        return $this->prixIncluTva;
    }

    /**
     * Set active
     *
     * @param boolean $active
     * @return Tva
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
}
