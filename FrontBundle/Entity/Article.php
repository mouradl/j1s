<?php

namespace Tuni\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Article
 */
class Article
{
    /**
     * @var string
     */
    private $titre;

    /**
     * @var string
     */
    private $img;

    /**
     * @var string
     */
    private $contenu;

    /**
     * @var string
     */
    private $direction;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Tuni\FrontBundle\Entity\Page
     */
    private $pageid;


    /**
     * Set titre
     *
     * @param string $titre
     * @return Article
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Set img
     *
     * @param string $img
     * @return Article
     */
    public function setImg($img)
    {
        $this->img = $img;

        return $this;
    }

    /**
     * Get img
     *
     * @return string 
     */
    public function getImg()
    {
        return $this->img;
    }

    /**
     * Set contenu
     *
     * @param string $contenu
     * @return Article
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;

        return $this;
    }

    /**
     * Get contenu
     *
     * @return string 
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * Set direction
     *
     * @param string $direction
     * @return Article
     */
    public function setDirection($direction)
    {
        $this->direction = $direction;

        return $this;
    }

    /**
     * Get direction
     *
     * @return string 
     */
    public function getDirection()
    {
        return $this->direction;
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
     * Set pageid
     *
     * @param \Tuni\FrontBundle\Entity\Page $pageid
     * @return Article
     */
    public function setPageid(\Tuni\FrontBundle\Entity\Page $pageid = null)
    {
        $this->pageid = $pageid;

        return $this;
    }

    /**
     * Get pageid
     *
     * @return \Tuni\FrontBundle\Entity\Page 
     */
    public function getPageid()
    {
        return $this->pageid;
    }
}
