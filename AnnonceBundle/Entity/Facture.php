<?php

namespace Tuni\AnnonceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Facture
 */
class Facture
{
    /**
     * @var string
     */
    private $statut;

    /**
     * @var boolean
     */
    private $taxInclu;

    /**
     * @var \DateTime
     */
    private $dateFacturaion;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Tuni\AnnonceBundle\Entity\Tva
     */
    private $tva;

    /**
     * @var \Tuni\AnnonceBundle\Entity\Methodepayement
     */
    private $methodepayement;

    /**
     * @var \Tuni\AnnonceBundle\Entity\Membre
     */
    private $membre;


    /**
     * Set statut
     *
     * @param string $statut
     * @return Facture
     */
    public function setStatut($statut)
    {
        $this->statut = $statut;

        return $this;
    }

    /**
     * Get statut
     *
     * @return string 
     */
    public function getStatut()
    {
        return $this->statut;
    }

    /**
     * Set taxInclu
     *
     * @param boolean $taxInclu
     * @return Facture
     */
    public function setTaxInclu($taxInclu)
    {
        $this->taxInclu = $taxInclu;

        return $this;
    }

    /**
     * Get taxInclu
     *
     * @return boolean 
     */
    public function getTaxInclu()
    {
        return $this->taxInclu;
    }

    /**
     * Set dateFacturaion
     *
     * @param \DateTime $dateFacturaion
     * @return Facture
     */
    public function setDateFacturaion($dateFacturaion)
    {
        $this->dateFacturaion = $dateFacturaion;

        return $this;
    }

    /**
     * Get dateFacturaion
     *
     * @return \DateTime 
     */
    public function getDateFacturaion()
    {
        return $this->dateFacturaion;
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
     * Set tva
     *
     * @param \Tuni\AnnonceBundle\Entity\Tva $tva
     * @return Facture
     */
    public function setTva(\Tuni\AnnonceBundle\Entity\Tva $tva = null)
    {
        $this->tva = $tva;

        return $this;
    }

    /**
     * Get tva
     *
     * @return \Tuni\AnnonceBundle\Entity\Tva 
     */
    public function getTva()
    {
        return $this->tva;
    }

    /**
     * Set methodepayement
     *
     * @param \Tuni\AnnonceBundle\Entity\Methodepayement $methodepayement
     * @return Facture
     */
    public function setMethodepayement(\Tuni\AnnonceBundle\Entity\Methodepayement $methodepayement = null)
    {
        $this->methodepayement = $methodepayement;

        return $this;
    }

    /**
     * Get methodepayement
     *
     * @return \Tuni\AnnonceBundle\Entity\Methodepayement 
     */
    public function getMethodepayement()
    {
        return $this->methodepayement;
    }

    /**
     * Set membre
     *
     * @param \Tuni\AnnonceBundle\Entity\Membre $membre
     * @return Facture
     */
    public function setMembre(\Tuni\AnnonceBundle\Entity\Membre $membre = null)
    {
        $this->membre = $membre;

        return $this;
    }

    /**
     * Get membre
     *
     * @return \Tuni\AnnonceBundle\Entity\Membre 
     */
    public function getMembre()
    {
        return $this->membre;
    }
}
