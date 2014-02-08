<?php

namespace Tuni\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Paypal
 */
class Paypal
{
    /**
     * @var string
     */
    private $utilisateur;

    /**
     * @var string
     */
    private $password;

    /**
     * @var string
     */
    private $signature;

    /**
     * @var boolean
     */
    private $sandbox;

    /**
     * @var boolean
     */
    private $https;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Tuni\FrontBundle\Entity\Methodepayement
     */
    private $methodepayement;


    /**
     * Set utilisateur
     *
     * @param string $utilisateur
     * @return Paypal
     */
    public function setUtilisateur($utilisateur)
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * Get utilisateur
     *
     * @return string 
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return Paypal
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set signature
     *
     * @param string $signature
     * @return Paypal
     */
    public function setSignature($signature)
    {
        $this->signature = $signature;

        return $this;
    }

    /**
     * Get signature
     *
     * @return string 
     */
    public function getSignature()
    {
        return $this->signature;
    }

    /**
     * Set sandbox
     *
     * @param boolean $sandbox
     * @return Paypal
     */
    public function setSandbox($sandbox)
    {
        $this->sandbox = $sandbox;

        return $this;
    }

    /**
     * Get sandbox
     *
     * @return boolean 
     */
    public function getSandbox()
    {
        return $this->sandbox;
    }

    /**
     * Set https
     *
     * @param boolean $https
     * @return Paypal
     */
    public function setHttps($https)
    {
        $this->https = $https;

        return $this;
    }

    /**
     * Get https
     *
     * @return boolean 
     */
    public function getHttps()
    {
        return $this->https;
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
     * Set methodepayement
     *
     * @param \Tuni\FrontBundle\Entity\Methodepayement $methodepayement
     * @return Paypal
     */
    public function setMethodepayement(\Tuni\FrontBundle\Entity\Methodepayement $methodepayement = null)
    {
        $this->methodepayement = $methodepayement;

        return $this;
    }

    /**
     * Get methodepayement
     *
     * @return \Tuni\FrontBundle\Entity\Methodepayement 
     */
    public function getMethodepayement()
    {
        return $this->methodepayement;
    }
}
