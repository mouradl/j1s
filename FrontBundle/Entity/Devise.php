<?php

namespace Tuni\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Devise
 */
class Devise
{
    /**
     * @var string
     */
    private $code;

    /**
     * @var string
     */
    private $nom;

    /**
     * @var float
     */
    private $tauxChangeUsd;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set code
     *
     * @param string $code
     * @return Devise
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Devise
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
     * Set tauxChangeUsd
     *
     * @param float $tauxChangeUsd
     * @return Devise
     */
    public function setTauxChangeUsd($tauxChangeUsd)
    {
        $this->tauxChangeUsd = $tauxChangeUsd;

        return $this;
    }

    /**
     * Get tauxChangeUsd
     *
     * @return float 
     */
    public function getTauxChangeUsd()
    {
        return $this->tauxChangeUsd;
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
