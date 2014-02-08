<?php

namespace Tuni\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ConfigStatut
 */
class ConfigStatut
{
    /**
     * @var integer
     */
    private $dureeAnnonce;

    /**
     * @var integer
     */
    private $prix;

    /**
     * @var integer
     */
    private $nbrAudiovideo;

    /**
     * @var integer
     */
    private $nbrPic;

    /**
     * @var boolean
     */
    private $annonceUrg;

    /**
     * @var boolean
     */
    private $renouvellementAnnonce;

    /**
     * @var boolean
     */
    private $modifAnnonce;

    /**
     * @var boolean
     */
    private $majPic;

    /**
     * @var boolean
     */
    private $upVideo;

    /**
     * @var boolean
     */
    private $majVideo;

    /**
     * @var string
     */
    private $extAudio;

    /**
     * @var string
     */
    private $extVideo;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set dureeAnnonce
     *
     * @param integer $dureeAnnonce
     * @return ConfigStatut
     */
    public function setDureeAnnonce($dureeAnnonce)
    {
        $this->dureeAnnonce = $dureeAnnonce;

        return $this;
    }

    /**
     * Get dureeAnnonce
     *
     * @return integer 
     */
    public function getDureeAnnonce()
    {
        return $this->dureeAnnonce;
    }

    /**
     * Set prix
     *
     * @param integer $prix
     * @return ConfigStatut
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * Get prix
     *
     * @return integer 
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set nbrAudiovideo
     *
     * @param integer $nbrAudiovideo
     * @return ConfigStatut
     */
    public function setNbrAudiovideo($nbrAudiovideo)
    {
        $this->nbrAudiovideo = $nbrAudiovideo;

        return $this;
    }

    /**
     * Get nbrAudiovideo
     *
     * @return integer 
     */
    public function getNbrAudiovideo()
    {
        return $this->nbrAudiovideo;
    }

    /**
     * Set nbrPic
     *
     * @param integer $nbrPic
     * @return ConfigStatut
     */
    public function setNbrPic($nbrPic)
    {
        $this->nbrPic = $nbrPic;

        return $this;
    }

    /**
     * Get nbrPic
     *
     * @return integer 
     */
    public function getNbrPic()
    {
        return $this->nbrPic;
    }

    /**
     * Set annonceUrg
     *
     * @param boolean $annonceUrg
     * @return ConfigStatut
     */
    public function setAnnonceUrg($annonceUrg)
    {
        $this->annonceUrg = $annonceUrg;

        return $this;
    }

    /**
     * Get annonceUrg
     *
     * @return boolean 
     */
    public function getAnnonceUrg()
    {
        return $this->annonceUrg;
    }

    /**
     * Set renouvellementAnnonce
     *
     * @param boolean $renouvellementAnnonce
     * @return ConfigStatut
     */
    public function setRenouvellementAnnonce($renouvellementAnnonce)
    {
        $this->renouvellementAnnonce = $renouvellementAnnonce;

        return $this;
    }

    /**
     * Get renouvellementAnnonce
     *
     * @return boolean 
     */
    public function getRenouvellementAnnonce()
    {
        return $this->renouvellementAnnonce;
    }

    /**
     * Set modifAnnonce
     *
     * @param boolean $modifAnnonce
     * @return ConfigStatut
     */
    public function setModifAnnonce($modifAnnonce)
    {
        $this->modifAnnonce = $modifAnnonce;

        return $this;
    }

    /**
     * Get modifAnnonce
     *
     * @return boolean 
     */
    public function getModifAnnonce()
    {
        return $this->modifAnnonce;
    }

    /**
     * Set majPic
     *
     * @param boolean $majPic
     * @return ConfigStatut
     */
    public function setMajPic($majPic)
    {
        $this->majPic = $majPic;

        return $this;
    }

    /**
     * Get majPic
     *
     * @return boolean 
     */
    public function getMajPic()
    {
        return $this->majPic;
    }

    /**
     * Set upVideo
     *
     * @param boolean $upVideo
     * @return ConfigStatut
     */
    public function setUpVideo($upVideo)
    {
        $this->upVideo = $upVideo;

        return $this;
    }

    /**
     * Get upVideo
     *
     * @return boolean 
     */
    public function getUpVideo()
    {
        return $this->upVideo;
    }

    /**
     * Set majVideo
     *
     * @param boolean $majVideo
     * @return ConfigStatut
     */
    public function setMajVideo($majVideo)
    {
        $this->majVideo = $majVideo;

        return $this;
    }

    /**
     * Get majVideo
     *
     * @return boolean 
     */
    public function getMajVideo()
    {
        return $this->majVideo;
    }

    /**
     * Set extAudio
     *
     * @param string $extAudio
     * @return ConfigStatut
     */
    public function setExtAudio($extAudio)
    {
        $this->extAudio = $extAudio;

        return $this;
    }

    /**
     * Get extAudio
     *
     * @return string 
     */
    public function getExtAudio()
    {
        return $this->extAudio;
    }

    /**
     * Set extVideo
     *
     * @param string $extVideo
     * @return ConfigStatut
     */
    public function setExtVideo($extVideo)
    {
        $this->extVideo = $extVideo;

        return $this;
    }

    /**
     * Get extVideo
     *
     * @return string 
     */
    public function getExtVideo()
    {
        return $this->extVideo;
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
