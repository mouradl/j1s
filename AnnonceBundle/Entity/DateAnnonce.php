<?php

namespace Tuni\AnnonceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * DateAnnonce
 *
 * @ORM\Table(name="date_annonce")
 * @ORM\Entity
 */
class DateAnnonce
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
     * @ORM\Column(name="date_deb", type="string", length=30, nullable=false)
     */
    private $dateDeb;

    /**
     * @var string
     *
     * @ORM\Column(name="date_fin", type="string", length=30, nullable=false)
     */
    private $dateFin;

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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set dateDeb
     *
     * @param string $dateDeb
     * @return DateAnnonce
     */
    public function setDateDeb($dateDeb)
    {
        $this->dateDeb = $dateDeb;
    
        return $this;
    }

    /**
     * Get dateDeb
     *
     * @return string 
     */
    public function getDateDeb()
    {
        return $this->dateDeb;
    }

    /**
     * Set dateFin
     *
     * @param string $dateFin
     * @return DateAnnonce
     */
    public function setDateFin($dateFin)
    {
        $this->dateFin = $dateFin;
    
        return $this;
    }

    /**
     * Get dateFin
     *
     * @return string 
     */
    public function getDateFin()
    {
        return $this->dateFin;
    }

    /**
     * Set annonce
     *
     * @param \Tuni\AnnonceBundle\Entity\Annonce $annonce
     * @return DateAnnonce
     */
    public function setAnnonce(\Tuni\AnnonceBundle\Entity\Annonce $annonce = null)
    {
        $this->annonce = $annonce;
    
        return $this;
    }

    /**
     * Get annonce
     *
     * @return \Tuni\AnnonceBundle\Entity\Annonce 
     */
    public function getAnnonce()
    {
        return $this->annonce;
    }
}