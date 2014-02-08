<?php

namespace Tuni\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TaillePub
 */
class TaillePub
{
    /**
     * @var string
     */
    private $taille;

    /**
     * @var integer
     */
    private $id;


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
