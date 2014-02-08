<?php

namespace Tuni\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AttributAnnonce
 *
 * @ORM\Table(name="attribut_annonce")
 * @ORM\Entity
 */
class AttributAnnonce
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
     * @ORM\Column(name="valeur", type="string", length=255, nullable=true)
     */
    private $valeur;

    /**
     * @var \Annonce
     *
     * @ORM\ManyToOne(targetEntity="Annonce")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="annonce_id", referencedColumnName="id")
     * })
     */
    private $annonce;

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
     * Set valeur
     *
     * @param string $valeur
     * @return AttributAnnonce
     */
    public function setValeur($valeur)
    {
        $this->valeur = $valeur;
    
        return $this;
    }

    /**
     * Get valeur
     *
     * @return string 
     */
    public function getValeur()
    {
        return $this->valeur;
    }

    /**
     * Set annonce
     *
     * @param \Tuni\AdminBundle\Entity\Annonce $annonce
     * @return AttributAnnonce
     */
    public function setAnnonce(\Tuni\AdminBundle\Entity\Annonce $annonce = null)
    {
        $this->annonce = $annonce;
    
        return $this;
    }

    /**
     * Get annonce
     *
     * @return \Tuni\AdminBundle\Entity\Annonce 
     */
    public function getAnnonce()
    {
        return $this->annonce;
    }

    /**
     * Set attribut
     *
     * @param \Tuni\AdminBundle\Entity\Attribut $attribut
     * @return AttributAnnonce
     */
    public function setAttribut(\Tuni\AdminBundle\Entity\Attribut $attribut = null)
    {
        $this->attribut = $attribut;
    
        return $this;
    }

    /**
     * Get attribut
     *
     * @return \Tuni\AdminBundle\Entity\Attribut 
     */
    public function getAttribut()
    {
        return $this->attribut;
    }
}