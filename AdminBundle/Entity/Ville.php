<?php

namespace Tuni\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ville
 *
 * @ORM\Table(name="ville")
 * @ORM\Entity
 */
class Ville
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
     * @ORM\Column(name="nom_v", type="string", length=255, nullable=false)
     */
    private $nomV;

 /**
     * @var \Region
     *
     * @ORM\ManyToOne(targetEntity="Region")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="region_id", referencedColumnName="id")
     * })
     */
    private $region;


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
     * Set region
     *
     * @param \Tuni\AdminBundle\Entity\Region $region
     * @return Ville
     */
    public function setRegion(\Tuni\AdminBundle\Entity\Region $region = null)
    {
        $this->region = $region;
    
        return $this;
    }

    /**
     * Get region
     *
     * @return \Tuni\AdminBundle\Entity\Region 
     */
    public function getRegion()
    {
        return $this->region;
    }
   
}