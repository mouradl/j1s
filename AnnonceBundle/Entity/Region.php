<?php

namespace Tuni\AnnonceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Region
 *
 * @ORM\Table(name="region")
 * @ORM\Entity
 */
class Region
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
     * @ORM\Column(name="nom_reg", type="string", length=255, nullable=false)
     */
    private $nomReg;

  
    /**
     * @var \Pays
     *
     * @ORM\ManyToOne(targetEntity="Pays")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="pays_id", referencedColumnName="id")
     * })
     */
    private $pays;



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
     * Set nomReg
     *
     * @param string $nomReg
     * @return Region
     */
    public function setNomReg($nomReg)
    {
        $this->nomReg = $nomReg;
    
        return $this;
    }

    /**
     * Get nomReg
     *
     * @return string 
     */
    public function getNomReg()
    {
        return $this->nomReg;
    }
 /**
     * Set pays
     *
     * @param \Tuni\AnnonceBundle\Entity\Pays $pays
     * @return Region
     */
    public function setPays(\Tuni\AnnonceBundle\Entity\Pays $pays = null)
    {
        $this->pays = $pays;
    
        return $this;
    }

    /**
     * Get pays
     *
     * @return \Tuni\AnnonceBundle\Entity\Pays 
     */
    public function getPays()
    {
        return $this->pays;
    }
}