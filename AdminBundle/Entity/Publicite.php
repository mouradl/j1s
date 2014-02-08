<?php

namespace Tuni\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Publicite
 *
 * @ORM\Table(name="publicite")
 * @ORM\Entity
 */
class Publicite
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
     * @ORM\Column(name="script", type="text", nullable=false)
     */
    private $script;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=100, nullable=false)
     */
    private $nom;

    /**
     * @var \TaillePub
     *
     * @ORM\ManyToOne(targetEntity="TaillePub")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="taille_pub_id", referencedColumnName="id")
     * })
     */
    private $taillePub;

    /**
     * @var \TypePub
     *
     * @ORM\ManyToOne(targetEntity="TypePub")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="type_pub_id", referencedColumnName="id")
     * })
     */
    private $typePub;



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
     * Set taillePub
     *
     * @param \Tuni\AdminBundle\Entity\TaillePub $taillePub
     * @return Publicite
     */
    public function setTaillePub(\Tuni\AdminBundle\Entity\TaillePub $taillePub = null)
    {
        $this->taillePub = $taillePub;
    
        return $this;
    }

    /**
     * Get taillePub
     *
     * @return \Tuni\AdminBundle\Entity\TaillePub 
     */
    public function getTaillePub()
    {
        return $this->taillePub;
    }

    /**
     * Set typePub
     *
     * @param \Tuni\AdminBundle\Entity\TypePub $typePub
     * @return Publicite
     */
    public function setTypePub(\Tuni\AdminBundle\Entity\TypePub $typePub = null)
    {
        $this->typePub = $typePub;
    
        return $this;
    }

    /**
     * Get typePub
     *
     * @return \Tuni\AdminBundle\Entity\TypePub 
     */
    public function getTypePub()
    {
        return $this->typePub;
    }
}