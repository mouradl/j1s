<?php

namespace Tuni\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Publicite
 */
class Publicite
{
    /**
     * @var string
     */
    private $script;

    /**
     * @var string
     */
    private $nom;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Tuni\FrontBundle\Entity\TaillePub
     */
    private $taillePub;

    /**
     * @var \Tuni\FrontBundle\Entity\TypePub
     */
    private $typePub;


    /**
     * Set script
     *
     * @param string $script
     * @return Publicite
     */
    public function setScript($script)
    {
        $this->script = $script;

        return $this;
    }

    /**
     * Get script
     *
     * @return string 
     */
    public function getScript()
    {
        return $this->script;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Publicite
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string 
     */
    public function getNom()
    {
        return $this->nom;
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
     * Set taillePub
     *
     * @param \Tuni\FrontBundle\Entity\TaillePub $taillePub
     * @return Publicite
     */
    public function setTaillePub(\Tuni\FrontBundle\Entity\TaillePub $taillePub = null)
    {
        $this->taillePub = $taillePub;

        return $this;
    }

    /**
     * Get taillePub
     *
     * @return \Tuni\FrontBundle\Entity\TaillePub 
     */
    public function getTaillePub()
    {
        return $this->taillePub;
    }

    /**
     * Set typePub
     *
     * @param \Tuni\FrontBundle\Entity\TypePub $typePub
     * @return Publicite
     */
    public function setTypePub(\Tuni\FrontBundle\Entity\TypePub $typePub = null)
    {
        $this->typePub = $typePub;

        return $this;
    }

    /**
     * Get typePub
     *
     * @return \Tuni\FrontBundle\Entity\TypePub 
     */
    public function getTypePub()
    {
        return $this->typePub;
    }
}
