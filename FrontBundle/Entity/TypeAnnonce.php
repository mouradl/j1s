<?php

namespace Tuni\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypeAnnonce
 */
class TypeAnnonce
{
    /**
     * @var string
     */
    private $type;

    /**
     * @var integer
     */
    private $id;


    /**
     * Set type
     *
     * @param string $type
     * @return TypeAnnonce
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
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
