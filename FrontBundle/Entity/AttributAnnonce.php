<?php

namespace Tuni\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AttributAnnonce
 */
class AttributAnnonce
{
    /**
     * @var string
     */
    private $valeur;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Tuni\FrontBundle\Entity\Annonce
     */
    private $annonce;

    /**
     * @var \Tuni\FrontBundle\Entity\Attribut
     */
    private $attribut;


    /**
     * Set valeur
     *
     * @param string $valeur
     * @return AttributAnnonce
     */
    public function setValeur($valeur)
    {
        $this->valeur = $valeur;

        return $this;
    }

    /**
     * Get valeur
     *
     * @return string 
     */
    public function getValeur()
    {
        return $this->valeur;
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
     * Set annonce
     *
     * @param \Tuni\FrontBundle\Entity\Annonce $annonce
     * @return AttributAnnonce
     */
    public function setAnnonce(\Tuni\FrontBundle\Entity\Annonce $annonce = null)
    {
        $this->annonce = $annonce;

        return $this;
    }

    /**
     * Get annonce
     *
     * @return \Tuni\FrontBundle\Entity\Annonce 
     */
    public function getAnnonce()
    {
        return $this->annonce;
    }

    /**
     * Set attribut
     *
     * @param \Tuni\FrontBundle\Entity\Attribut $attribut
     * @return AttributAnnonce
     */
    public function setAttribut(\Tuni\FrontBundle\Entity\Attribut $attribut = null)
    {
        $this->attribut = $attribut;

        return $this;
    }

    /**
     * Get attribut
     *
     * @return \Tuni\FrontBundle\Entity\Attribut 
     */
    public function getAttribut()
    {
        return $this->attribut;
    }
}
