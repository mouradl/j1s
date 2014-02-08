<?php

namespace Tuni\AdminBundle\Entity;

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
     * @ORM\Column(name="id_page", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idPage;

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
     * Get idPage
     *
     * @return integer 
     */
    public function getIdPage()
    {
        return $this->idPage;
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