<?php

namespace Tuni\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StatutMembre
 */
class StatutMembre
{
    /**
     * @var string
     */
    private $statut;

    /**
     * @var string
     */
    private $libellet;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Tuni\FrontBundle\Entity\ConfigStatut
     */
    private $configStatut;


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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set configStatut
     *
     * @param \Tuni\FrontBundle\Entity\ConfigStatut $configStatut
     * @return StatutMembre
     */
    public function setConfigStatut(\Tuni\FrontBundle\Entity\ConfigStatut $configStatut = null)
    {
        $this->configStatut = $configStatut;

        return $this;
    }

    /**
     * Get configStatut
     *
     * @return \Tuni\FrontBundle\Entity\ConfigStatut 
     */
    public function getConfigStatut()
    {
        return $this->configStatut;
    }
}
