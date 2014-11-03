<?php

namespace Laurent\BulletinBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Claroline\CoreBundle\Entity\User;
use Laurent\BulletinBundle\Entity\Periode;
use Laurent\SchoolBundle\Entity\Matiere;

class PeriodeEleveMatierePointRepository extends EntityRepository
{
    public function findPeriodeEleveMatiere(User $user, Periode $periode)
    {
        $em = $this->getEntityManager();
        $qb = $em->createQueryBuilder();
        $qb->select('pemp')
            ->from('Laurent\BulletinBundle\Entity\PeriodeEleveMatierePoint', 'pemp')
            ->where('pemp.periode = :periode')
            ->andWhere('pemp.eleve = :user')
            ->orderBy('pemp.position')
            ->setParameter('periode', $periode)
            ->setParameter('user', $user);
        $query = $qb->getQuery();
        return $results = $query->getResult();
    }

    public function findPeriodeMatiereEleve(Periode $periode, User $user, Matiere $matiere)
    {
        $em = $this->getEntityManager();
        $qb = $em->createQueryBuilder();
        $qb->select('pemp')
            ->from('Laurent\BulletinBundle\Entity\PeriodeEleveMatierePoint', 'pemp')
            ->where('pemp.periode = :periode')
            ->andWhere('pemp.eleve = :user')
            ->andWhere('pemp.matiere = :matiere')
            ->setParameter('periode', $periode)
            ->setParameter('user', $user)
            ->setParameter('matiere', $matiere);
        $query = $qb->getQuery();
        return $results = $query->getSingleResult();
    }
}