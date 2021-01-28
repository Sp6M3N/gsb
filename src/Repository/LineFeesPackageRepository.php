<?php

namespace App\Repository;

use App\Entity\LineFeesPackage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LineFeesPackage|null find($id, $lockMode = null, $lockVersion = null)
 * @method LineFeesPackage|null findOneBy(array $criteria, array $orderBy = null)
 * @method LineFeesPackage[]    findAll()
 * @method LineFeesPackage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LineFeesPackageRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LineFeesPackage::class);
    }

    // /**
    //  * @return LineFeesPackage[] Returns an array of LineFeesPackage objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LineFeesPackage
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
