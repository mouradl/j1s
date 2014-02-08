<?php

namespace Tuni\AnnonceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StatutMembre
 *
 * @ORM\Table(name="statut_membre")
 * @ORM\Entity
 */
class StatutMembre
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
     * @ORM\Column(name="statut", type="string", length=100, nullable=false)
     */
    private $statut;
  /**
     * @var string
     *
     * @ORM\Column(name="libellet", type="string", length=100, nullable=false)
     */
    private $libellet;

    /**
     * @var \ConfigStatut
     *
     * @ORM\ManyToOne(targetEntity="ConfigStatut")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="config_statut_id", referencedColumnName="id")
     * })
     */
    private $configStatut;



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
     * Set statut
     *
     * @param string $statut
     * @return StatutMembre
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
     * Set libellet
     *
     * @param string $libellet
     * @return StatutMembre
     */
    public function setLibellet($libellet)
    {
        $this->libellet = $libellet;
    
        return $this;
    }

    /**
     * Get libellet
     *
     * @return string 
     */
    public function getLibellet()
    {
        return $this->libellet;
    }

    /**
     * Set configStatut
     *
     * @param \Tuni\AnnonceBundle\Entity\ConfigStatut $configStatut
     * @return StatutMembre
     */
    public function setConfigStatut(\Tuni\AnnonceBundle\Entity\ConfigStatut $configStatut = null)
    {
        $this->configStatut = $configStatut;
    
        return $this;
    }

    /**
     * Get configStatut
     *
     * @return \Tuni\AnnonceBundle\Entity\ConfigStatut 
     */
    public function getConfigStatut()
    {
        return $this->configStatut;
    }
}