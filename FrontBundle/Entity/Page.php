<?php

namespace Tuni\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Page
 */
class Page
{
    /**
     * @var string
     */
    private $nomPage;

    /**
     * @var string
     */
    private $motCles;

    /**
     * @var string
     */
    private $descriptionPage;

    /**
     * @var string
     */
    private $urlPage;

    /**
     * @var boolean
     */
    private $type;

    /**
     * @var integer
     */
    private $id;


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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
