<?php

namespace Tuni\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pays
 */
class Pays
{
    /**
     * @var string
     */
    private $nomP;

    /**
     * @var integer
     */
    private $id;


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
