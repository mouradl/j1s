<?php

namespace Tuni\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Methodepayement
 */
class Methodepayement
{
    /**
     * @var string
     */
    private $titre;

    /**
     * @var boolean
     */
    private $active;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set titre
     *
     * @param string $titre
     * @return Methodepayement
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set active
     *
     * @param boolean $active
     * @return Methodepayement
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return boolean 
     */
    public function getActive()
    {
        return $this->active;
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
