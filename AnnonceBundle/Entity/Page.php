<?php

namespace Tuni\AnnonceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Page
 *
 * @ORM\Table(name="page")
 * @ORM\Entity
 */
class Page
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
     * @ORM\Column(name="nom_page", type="text", nullable=false)
     */
    private $nomPage;

    /**
     * @var string
     *
     * @ORM\Column(name="mot_cles", type="string", length=50, nullable=false)
     */
    private $motCles;

    /**
     * @var string
     *
     * @ORM\Column(name="description_page", type="text", nullable=false)
     */
    private $descriptionPage;

    /**
     * @var string
     *
     * @ORM\Column(name="url_page", type="string", length=30, nullable=false)
     */
    private $urlPage;



    /**
     * @var boolean
     *
     * @ORM\Column(name="type", type="boolean", nullable=true)
     */
    private $type;

    /**
     * Get idPage
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nomPage
     *
     * @param string $nomPage
     * @return Page
     */
    public function setNomPage($nomPage)
    {
        $this->nomPage = $nomPage;
    
        return $this;
    }

    /**
     * Get nomPage
     *
     * @return string 
     */
    public function getNomPage()
    {
        return $this->nomPage;
    }

    /**
     * Set motCles
     *
     * @param string $motCles
     * @return Page
     */
    public function setMotCles($motCles)
    {
        $this->motCles = $motCles;
    
        return $this;
    }

    /**
     * Get motCles
     *
     * @return string 
     */
    public function getMotCles()
    {
        return $this->motCles;
    }

    /**
     * Set type
     *
     * @param boolean $type
     * @return Page
     */
    public function setType($type)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return boolean 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set descriptionPage
     *
     * @param string $descriptionPage
     * @return Page
     */
    public function setDescriptionPage($descriptionPage)
    {
        $this->descriptionPage = $descriptionPage;
    
        return $this;
    }

    /**
     * Get descriptionPage
     *
     * @return string 
     */
    public function getDescriptionPage()
    {
        return $this->descriptionPage;
    }

    /**
     * Set urlPage
     *
     * @param string $urlPage
     * @return Page
     */
    public function setUrlPage($urlPage)
    {
        $this->urlPage = $urlPage;
    
        return $this;
    }

    /**
     * Get urlPage
     *
     * @return string 
     */
    public function getUrlPage()
    {
        return $this->urlPage;
    }
}