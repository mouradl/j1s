<?php

namespace Tuni\AnnonceBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MailExpiration
 *
 * @ORM\Table(name="mail_expiration")
 * @ORM\Entity
 */
class MailExpiration
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
     * @ORM\Column(name="objet", type="string", length=100, nullable=false)
     */
    private $objet;

    /**
     * @var string
     *
     * @ORM\Column(name="message", type="text", nullable=false)
     */
    private $message;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_send", type="date", nullable=true)
     */
    private $dateSend;



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
     * Set objet
     *
     * @param string $objet
     * @return MailExpiration
     */
    public function setObjet($objet)
    {
        $this->objet = $objet;
    
        return $this;
    }

    /**
     * Get objet
     *
     * @return string 
     */
    public function getObjet()
    {
        return $this->objet;
    }

    /**
     * Set message
     *
     * @param string $message
     * @return MailExpiration
     */
    public function setMessage($message)
    {
        $this->message = $message;
    
        return $this;
    }

    /**
     * Get message
     *
     * @return string 
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set dateSend
     *
     * @param \DateTime $dateSend
     * @return MailExpiration
     */
    public function setDateSend($dateSend)
    {
        $this->dateSend = $dateSend;
    
        return $this;
    }

    /**
     * Get dateSend
     *
     * @return \DateTime 
     */
    public function getDateSend()
    {
        return $this->dateSend;
    }
}