<?php

namespace Tuni\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Multichoix
 */
class Multichoix
{
    /**
     * @var string
     */
    private $val;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Tuni\FrontBundle\Entity\Attribut
     */
    private $attribut;


    /**
     * Set val
     *
     * @param string $val
     * @return Multichoix
     */
    public function setVal($val)
    {
        $this->val = $val;

        return $this;
    }

    /**
     * Get val
     *
     * @return string 
     */
    public function getVal()
    {
        return $this->val;
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
     * Set attribut
     *
     * @param \Tuni\FrontBundle\Entity\Attribut $attribut
     * @return Multichoix
     */
    public function setAttribut(\Tuni\FrontBundle\Entity\Attribut $attribut = null)
    {
        $this->attribut = $attribut;

        return $this;
    }

    /**
     * Get attribut
     *
     * @return \Tuni\FrontBundle\Entity\Attribut 
     */
    public function getAttribut()
    {
        return $this->attribut;
    }
}
