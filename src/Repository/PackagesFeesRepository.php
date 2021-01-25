<?php

namespace App\Repository;

use App\Entity\PackagesFees;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PackagesFees|null find($id, $lockMode = null, $lockVersion = null)
 * @method PackagesFees|null findOneBy(array $criteria, array $orderBy = null)
 * @method PackagesFees[]    findAll()
 * @method PackagesFees[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PackagesFeesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PackagesFees::class);
    }

    // /**
    //  * @return PackagesFees[] Returns an array of PackagesFees objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PackagesFees
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
