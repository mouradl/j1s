<?php

namespace Tuni\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Region
 */
class Region
{
    /**
     * @var string
     */
    private $nomReg;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Tuni\FrontBundle\Entity\Pays
     */
    private $pays;


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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set pays
     *
     * @param \Tuni\FrontBundle\Entity\Pays $pays
     * @return Region
     */
    public function setPays(\Tuni\FrontBundle\Entity\Pays $pays = null)
    {
        $this->pays = $pays;

        return $this;
    }

    /**
     * Get pays
     *
     * @return \Tuni\FrontBundle\Entity\Pays 
     */
    public function getPays()
    {
        return $this->pays;
    }
}
