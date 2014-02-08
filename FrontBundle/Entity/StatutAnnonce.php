<?php

namespace Tuni\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * StatutAnnonce
 */
class StatutAnnonce
{
    /**
     * @var string
     */
    private $statut;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set statut
     *
     * @param string $statut
     * @return StatutAnnonce
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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
