<?php

namespace App\Repository;

use App\Entity\TestClinique;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method TestClinique|null find($id, $lockMode = null, $lockVersion = null)
 * @method TestClinique|null findOneBy(array $criteria, array $orderBy = null)
 * @method TestClinique[]    findAll()
 * @method TestClinique[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TestCliniqueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TestClinique::class);
    }

    // /**
    //  * @return TestClinique[] Returns an array of TestClinique objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TestClinique
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
