<?php

namespace Tuni\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Devise
 *
 * @ORM\Table(name="devise")
 * @ORM\Entity
 */
class Devise
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=10, nullable=false)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=100, nullable=false)
     */
    private $nom;

    /**
     * @var float
     *
     * @ORM\Column(name="taux_change-usd", type="float", nullable=true)
     */
    private $tauxChangeUsd;



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
}