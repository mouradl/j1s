<?php

namespace Tuni\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MailExpiration
 */
class MailExpiration
{
    /**
     * @var string
     */
    private $objet;

    /**
     * @var string
     */
    private $message;

    /**
     * @var \DateTime
     */
    private $dateSend;

    /**
     * @var integer
     */
    private $id;


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
