<?php

namespace Tuni\AdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ConfigStatut
 *
 * @ORM\Table(name="config_statut")
 * @ORM\Entity
 */
class ConfigStatut
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
     * @var integer
     *
     * @ORM\Column(name="duree_annonce", type="integer", nullable=false)
     */
    private $dureeAnnonce;

    /**
     * @var integer
     *
     * @ORM\Column(name="prix", type="integer", nullable=false)
     */
    private $prix;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbr_audiovideo", type="integer", nullable=false)
     */
    private $nbrAudiovideo;

    /**
     * @var integer
     *
     * @ORM\Column(name="nbr_pic", type="integer", nullable=false)
     */
    private $nbrPic;

    /**
     * @var boolean
     *
     * @ORM\Column(name="annonce_urg", type="boolean", nullable=false)
     */
    private $annonceUrg;

    /**
     * @var boolean
     *
     * @ORM\Column(name="renouvellement_annonce", type="boolean", nullable=false)
     */
    private $renouvellementAnnonce;

    /**
     * @var boolean
     *
     * @ORM\Column(name="modif_annonce", type="boolean", nullable=false)
     */
    private $modifAnnonce;

    /**
     * @var boolean
     *
     * @ORM\Column(name="maj_pic", type="boolean", nullable=false)
     */
    private $majPic;

    /**
     * @var boolean
     *
     * @ORM\Column(name="up_video", type="boolean", nullable=false)
     */
    private $upVideo;

    /**
     * @var boolean
     *
     * @ORM\Column(name="maj_video", type="boolean", nullable=false)
     */
    private $majVideo;

    /**
     * @var string
     *
     * @ORM\Column(name="ext_audio", type="string", length=255, nullable=false)
     */
    private $extAudio;

    /**
     * @var string
     *
     * @ORM\Column(name="ext_video", type="string", length=255, nullable=false)
     */
    private $extVideo;



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
}