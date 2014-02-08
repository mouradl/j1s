<?php

namespace Tuni\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TaillePub
 *
 * @ORM\Table(name="taille_pub")
 * @ORM\Entity
 */
class TaillePub
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
     * @ORM\Column(name="taille", type="string", length=100, nullable=true)
     */
    private $taille;



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
     * Set taille
     *
     * @param string $taille
     * @return TaillePub
     */
    public function setTaille($taille)
    {
        $this->taille = $taille;
    
        return $this;
    }

    /**
     * Get taille
     *
     * @return string 
     */
    public function getTaille()
    {
        return $this->taille;
    }
}