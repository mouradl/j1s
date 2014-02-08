<?php

namespace Tuni\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Annonce
 */
class Annonce
{
    /**
     * @var string
     */
    private $titreAnn;

    /**
     * @var string
     */
    private $adresse;

    /**
     * @var integer
     */
    private $codePostal;

    /**
     * @var string
     */
    private $prixAnn;

    /**
     * @var boolean
     */
    private $prixNegociable;

    /**
     * @var string
     */
    private $descAnn;

    /**
     * @var string
     */
    private $motCles;

    /**
     * @var string
     */
    private $imagesAnn;

    /**
     * @var string
     */
    private $vidieoAnn;

    /**
     * @var \DateTime
     */
    private $dateAnnonce;

    /**
     * @var \DateTime
     */
    private $dateLimite;

    /**
     * @var boolean
     */
    private $publier;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Tuni\FrontBundle\Entity\StatutAnnonce
     */
    private $statutAnnonce;

    /**
     * @var \Tuni\FrontBundle\Entity\MailExpiration
     */
    private $mailExpiration;

    /**
     * @var \Tuni\FrontBundle\Entity\Devise
     */
    private $devise;

    /**
     * @var \Tuni\FrontBundle\Entity\Membre
     */
    private $membre;

    /**
     * @var \Tuni\FrontBundle\Entity\Souscategorie
     */
    private $sousCat;

    /**
     * @var \Tuni\FrontBundle\Entity\Ville
     */
    private $ville;

    /**
     * @var \Tuni\FrontBundle\Entity\TypeAnnonce
     */
    private $typeAnnonce;


    /**
     * Set titreAnn
     *
     * @param string $titreAnn
     * @return Annonce
     */
    public function setTitreAnn($titreAnn)
    {
        $this->titreAnn = $titreAnn;

        return $this;
    }

    /**
     * Get titreAnn
     *
     * @return string 
     */
    public function getTitreAnn()
    {
        return $this->titreAnn;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     * @return Annonce
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
     * Set codePostal
     *
     * @param integer $codePostal
     * @return Annonce
     */
    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    /**
     * Get codePostal
     *
     * @return integer 
     */
    public function getCodePostal()
    {
        return $this->codePostal;
    }

    /**
     * Set prixAnn
     *
     * @param string $prixAnn
     * @return Annonce
     */
    public function setPrixAnn($prixAnn)
    {
        $this->prixAnn = $prixAnn;

        return $this;
    }

    /**
     * Get prixAnn
     *
     * @return string 
     */
    public function getPrixAnn()
    {
        return $this->prixAnn;
    }

    /**
     * Set prixNegociable
     *
     * @param boolean $prixNegociable
     * @return Annonce
     */
    public function setPrixNegociable($prixNegociable)
    {
        $this->prixNegociable = $prixNegociable;

        return $this;
    }

    /**
     * Get prixNegociable
     *
     * @return boolean 
     */
    public function getPrixNegociable()
    {
        return $this->prixNegociable;
    }

    /**
     * Set descAnn
     *
     * @param string $descAnn
     * @return Annonce
     */
    public function setDescAnn($descAnn)
    {
        $this->descAnn = $descAnn;

        return $this;
    }

    /**
     * Get descAnn
     *
     * @return string 
     */
    public function getDescAnn()
    {
        return $this->descAnn;
    }

    /**
     * Set motCles
     *
     * @param string $motCles
     * @return Annonce
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
     * Set imagesAnn
     *
     * @param string $imagesAnn
     * @return Annonce
     */
    public function setImagesAnn($imagesAnn)
    {
        $this->imagesAnn = $imagesAnn;

        return $this;
    }

    /**
     * Get imagesAnn
     *
     * @return string 
     */
    public function getImagesAnn()
    {
        return $this->imagesAnn;
    }

    /**
     * Set vidieoAnn
     *
     * @param string $vidieoAnn
     * @return Annonce
     */
    public function setVidieoAnn($vidieoAnn)
    {
        $this->vidieoAnn = $vidieoAnn;

        return $this;
    }

    /**
     * Get vidieoAnn
     *
     * @return string 
     */
    public function getVidieoAnn()
    {
        return $this->vidieoAnn;
    }

    /**
     * Set dateAnnonce
     *
     * @param \DateTime $dateAnnonce
     * @return Annonce
     */
    public function setDateAnnonce($dateAnnonce)
    {
        $this->dateAnnonce = $dateAnnonce;

        return $this;
    }

    /**
     * Get dateAnnonce
     *
     * @return \DateTime 
     */
    public function getDateAnnonce()
    {
        return $this->dateAnnonce;
    }

    /**
     * Set dateLimite
     *
     * @param \DateTime $dateLimite
     * @return Annonce
     */
    public function setDateLimite($dateLimite)
    {
        $this->dateLimite = $dateLimite;

        return $this;
    }

    /**
     * Get dateLimite
     *
     * @return \DateTime 
     */
    public function getDateLimite()
    {
        return $this->dateLimite;
    }

    /**
     * Set publier
     *
     * @param boolean $publier
     * @return Annonce
     */
    public function setPublier($publier)
    {
        $this->publier = $publier;

        return $this;
    }

    /**
     * Get publier
     *
     * @return boolean 
     */
    public function getPublier()
    {
        return $this->publier;
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
     * Set statutAnnonce
     *
     * @param \Tuni\FrontBundle\Entity\StatutAnnonce $statutAnnonce
     * @return Annonce
     */
    public function setStatutAnnonce(\Tuni\FrontBundle\Entity\StatutAnnonce $statutAnnonce = null)
    {
        $this->statutAnnonce = $statutAnnonce;

        return $this;
    }

    /**
     * Get statutAnnonce
     *
     * @return \Tuni\FrontBundle\Entity\StatutAnnonce 
     */
    public function getStatutAnnonce()
    {
        return $this->statutAnnonce;
    }

    /**
     * Set mailExpiration
     *
     * @param \Tuni\FrontBundle\Entity\MailExpiration $mailExpiration
     * @return Annonce
     */
    public function setMailExpiration(\Tuni\FrontBundle\Entity\MailExpiration $mailExpiration = null)
    {
        $this->mailExpiration = $mailExpiration;

        return $this;
    }

    /**
     * Get mailExpiration
     *
     * @return \Tuni\FrontBundle\Entity\MailExpiration 
     */
    public function getMailExpiration()
    {
        return $this->mailExpiration;
    }

    /**
     * Set devise
     *
     * @param \Tuni\FrontBundle\Entity\Devise $devise
     * @return Annonce
     */
    public function setDevise(\Tuni\FrontBundle\Entity\Devise $devise = null)
    {
        $this->devise = $devise;

        return $this;
    }

    /**
     * Get devise
     *
     * @return \Tuni\FrontBundle\Entity\Devise 
     */
    public function getDevise()
    {
        return $this->devise;
    }

    /**
     * Set membre
     *
     * @param \Tuni\FrontBundle\Entity\Membre $membre
     * @return Annonce
     */
    public function setMembre(\Tuni\FrontBundle\Entity\Membre $membre = null)
    {
        $this->membre = $membre;

        return $this;
    }

    /**
     * Get membre
     *
     * @return \Tuni\FrontBundle\Entity\Membre 
     */
    public function getMembre()
    {
        return $this->membre;
    }

    /**
     * Set sousCat
     *
     * @param \Tuni\FrontBundle\Entity\Souscategorie $sousCat
     * @return Annonce
     */
    public function setSousCat(\Tuni\FrontBundle\Entity\Souscategorie $sousCat = null)
    {
        $this->sousCat = $sousCat;

        return $this;
    }

    /**
     * Get sousCat
     *
     * @return \Tuni\FrontBundle\Entity\Souscategorie 
     */
    public function getSousCat()
    {
        return $this->sousCat;
    }

    /**
     * Set ville
     *
     * @param \Tuni\FrontBundle\Entity\Ville $ville
     * @return Annonce
     */
    public function setVille(\Tuni\FrontBundle\Entity\Ville $ville = null)
    {
        $this->ville = $ville;

        return $this;
    }

    /**
     * Get ville
     *
     * @return \Tuni\FrontBundle\Entity\Ville 
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set typeAnnonce
     *
     * @param \Tuni\FrontBundle\Entity\TypeAnnonce $typeAnnonce
     * @return Annonce
     */
    public function setTypeAnnonce(\Tuni\FrontBundle\Entity\TypeAnnonce $typeAnnonce = null)
    {
        $this->typeAnnonce = $typeAnnonce;

        return $this;
    }

    /**
     * Get typeAnnonce
     *
     * @return \Tuni\FrontBundle\Entity\TypeAnnonce 
     */
    public function getTypeAnnonce()
    {
        return $this->typeAnnonce;
    }
}
