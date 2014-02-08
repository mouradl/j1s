<?php

namespace Tuni\AdminBundle\Entity\Repository;
use Doctrine\ORM\EntityRepository;

class StatutMembreRepository extends EntityRepository
{
    public function getAll()
    {
        return $this->_em->createQuery('SELECT s FROM Tuni\AdminBundle\Entity\StatutMembre s')
                         ->getResult();
    }
}