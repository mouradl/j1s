<?php

namespace Tuni\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ville
 */
class Ville
{
    /**
     * @var string
     */
    private $nomV;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Tuni\FrontBundle\Entity\Region
     */
    private $region;


    /**
     * Set nomV
     *
     * @param string $nomV
     * @return Ville
     */
    public function setNomV($nomV)
    {
        $this->nomV = $nomV;

        return $this;
    }

    /**
     * Get nomV
     *
     * @return string 
     */
    public function getNomV()
    {
        return $this->nomV;
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
     * Set region
     *
     * @param \Tuni\FrontBundle\Entity\Region $region
     * @return Ville
     */
    public function setRegion(\Tuni\FrontBundle\Entity\Region $region = null)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * Get region
     *
     * @return \Tuni\FrontBundle\Entity\Region 
     */
    public function getRegion()
    {
        return $this->region;
    }
}
