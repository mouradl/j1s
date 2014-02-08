<?php

namespace Tuni\AnnonceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Multichoix
 *
 * @ORM\Table(name="multichoix")
 * @ORM\Entity
 */
class Multichoix
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
     * @ORM\Column(name="val", type="string", length=100, nullable=false)
     */
    private $val;

    /**
     * @var \Attribut
     *
     * @ORM\ManyToOne(targetEntity="Attribut")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="attribut_id", referencedColumnName="id")
     * })
     */
    private $attribut;



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
     * Set attribut
     *
     * @param \Tuni\AnnonceBundle\Entity\Attribut $attribut
     * @return Multichoix
     */
    public function setAttribut(\Tuni\AnnonceBundle\Entity\Attribut $attribut = null)
    {
        $this->attribut = $attribut;
    
        return $this;
    }

    /**
     * Get attribut
     *
     * @return \Tuni\AnnonceBundle\Entity\Attribut 
     */
    public function getAttribut()
    {
        return $this->attribut;
    }
}