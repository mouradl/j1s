<?php

namespace Tuni\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Temoignage
 */
class Temoignage
{
    /**
     * @var string
     */
    private $titre;

    /**
     * @var string
     */
    private $texte;

    /**
     * @var boolean
     */
    private $isPublier;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set titre
     *
     * @param string $titre
     * @return Temoignage
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
     * Set texte
     *
     * @param string $texte
     * @return Temoignage
     */
    public function setTexte($texte)
    {
        $this->texte = $texte;

        return $this;
    }

    /**
     * Get texte
     *
     * @return string 
     */
    public function getTexte()
    {
        return $this->texte;
    }

    /**
     * Set isPublier
     *
     * @param boolean $isPublier
     * @return Temoignage
     */
    public function setIsPublier($isPublier)
    {
        $this->isPublier = $isPublier;

        return $this;
    }

    /**
     * Get isPublier
     *
     * @return boolean 
     */
    public function getIsPublier()
    {
        return $this->isPublier;
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
