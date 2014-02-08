<?php

namespace Tuni\AnnonceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pays
 *
 * @ORM\Table(name="pays")
 * @ORM\Entity
 */
class Pays
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
     * @ORM\Column(name="nom_p", type="string", length=255, nullable=false)
     */
    private $nomP;



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
     * Set nomP
     *
     * @param string $nomP
     * @return Pays
     */
    public function setNomP($nomP)
    {
        $this->nomP = $nomP;
    
        return $this;
    }

    /**
     * Get nomP
     *
     * @return string 
     */
    public function getNomP()
    {
        return $this->nomP;
    }
    
}