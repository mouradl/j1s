<?php

namespace Tuni\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Membre
 */
class Membre
{
    /**
     * @var string
     */
    private $civilite;

    /**
     * @var string
     */
    private $nom;

    /**
     * @var string
     */
    private $prenom;

    /**
     * @var string
     */
    private $entreprise;

    /**
     * @var string
     */
    private $siret;

    /**
     * @var integer
     */
    private $age;

    /**
     * @var string
     */
    private $tel;

    /**
     * @var boolean
     */
    private $cachePhone;

    /**
     * @var string
     */
    private $fax;

    /**
     * @var string
     */
    private $adresse;

    /**
     * @var \DateTime
     */
    private $registredUser;

    /**
     * @var string
     */
    private $logo;

    /**
     * @var integer
     */
    private $indiceConfiance;

    /**
     * @var integer
     */
    private $evaluation;

    /**
     * @var string
     */
    private $parrain;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Tuni\FrontBundle\Entity\Utilisateur
     */
    private $utilisateur;

    /**
     * @var \Tuni\FrontBundle\Entity\StatutMembre
     */
    private $statutMembre;


    /**
     * Set civilite
     *
     * @param string $civilite
     * @return Membre
     */
    public function setCivilite($civilite)
    {
        $this->civilite = $civilite;

        return $this;
    }

    /**
     * Get civilite
     *
     * @return string 
     */
    public function getCivilite()
    {
        return $this->civilite;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Membre
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
     * Set prenom
     *
     * @param string $prenom
     * @return Membre
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set entreprise
     *
     * @param string $entreprise
     * @return Membre
     */
    public function setEntreprise($entreprise)
    {
        $this->entreprise = $entreprise;

        return $this;
    }

    /**
     * Get entreprise
     *
     * @return string 
     */
    public function getEntreprise()
    {
        return $this->entreprise;
    }

    /**
     * Set siret
     *
     * @param string $siret
     * @return Membre
     */
    public function setSiret($siret)
    {
        $this->siret = $siret;

        return $this;
    }

    /**
     * Get siret
     *
     * @return string 
     */
    public function getSiret()
    {
        return $this->siret;
    }

    /**
     * Set age
     *
     * @param integer $age
     * @return Membre
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get age
     *
     * @return integer 
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set tel
     *
     * @param string $tel
     * @return Membre
     */
    public function setTel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get tel
     *
     * @return string 
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * Set cachePhone
     *
     * @param boolean $cachePhone
     * @return Membre
     */
    public function setCachePhone($cachePhone)
    {
        $this->cachePhone = $cachePhone;

        return $this;
    }

    /**
     * Get cachePhone
     *
     * @return boolean 
     */
    public function getCachePhone()
    {
        return $this->cachePhone;
    }

    /**
     * Set fax
     *
     * @param string $fax
     * @return Membre
     */
    public function setFax($fax)
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * Get fax
     *
     * @return string 
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     * @return Membre
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get adresse
     *
     * @return string 
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set registredUser
     *
     * @param \DateTime $registredUser
     * @return Membre
     */
    public function setRegistredUser($registredUser)
    {
        $this->registredUser = $registredUser;

        return $this;
    }

    /**
     * Get registredUser
     *
     * @return \DateTime 
     */
    public function getRegistredUser()
    {
        return $this->registredUser;
    }

    /**
     * Set logo
     *
     * @param string $logo
     * @return Membre
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get logo
     *
     * @return string 
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set indiceConfiance
     *
     * @param integer $indiceConfiance
     * @return Membre
     */
    public function setIndiceConfiance($indiceConfiance)
    {
        $this->indiceConfiance = $indiceConfiance;

        return $this;
    }

    /**
     * Get indiceConfiance
     *
     * @return integer 
     */
    public function getIndiceConfiance()
    {
        return $this->indiceConfiance;
    }

    /**
     * Set evaluation
     *
     * @param integer $evaluation
     * @return Membre
     */
    public function setEvaluation($evaluation)
    {
        $this->evaluation = $evaluation;

        return $this;
    }

    /**
     * Get evaluation
     *
     * @return integer 
     */
    public function getEvaluation()
    {
        return $this->evaluation;
    }

    /**
     * Set parrain
     *
     * @param string $parrain
     * @return Membre
     */
    public function setParrain($parrain)
    {
        $this->parrain = $parrain;

        return $this;
    }

    /**
     * Get parrain
     *
     * @return string 
     */
    public function getParrain()
    {
        return $this->parrain;
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
     * Set utilisateur
     *
     * @param \Tuni\FrontBundle\Entity\Utilisateur $utilisateur
     * @return Membre
     */
    public function setUtilisateur(\Tuni\FrontBundle\Entity\Utilisateur $utilisateur = null)
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    /**
     * Get utilisateur
     *
     * @return \Tuni\FrontBundle\Entity\Utilisateur 
     */
    public function getUtilisateur()
    {
        return $this->utilisateur;
    }

    /**
     * Set statutMembre
     *
     * @param \Tuni\FrontBundle\Entity\StatutMembre $statutMembre
     * @return Membre
     */
    public function setStatutMembre(\Tuni\FrontBundle\Entity\StatutMembre $statutMembre = null)
    {
        $this->statutMembre = $statutMembre;

        return $this;
    }

    /**
     * Get statutMembre
     *
     * @return \Tuni\FrontBundle\Entity\StatutMembre 
     */
    public function getStatutMembre()
    {
        return $this->statutMembre;
    }
}
