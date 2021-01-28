<?php

namespace App\Repository;

use App\Entity\ExpenseSheet;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ExpenseSheet|null find($id, $lockMode = null, $lockVersion = null)
 * @method ExpenseSheet|null findOneBy(array $criteria, array $orderBy = null)
 * @method ExpenseSheet[]    findAll()
 * @method ExpenseSheet[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ExpenseSheetRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ExpenseSheet::class);
    }

    // /**
    //  * @return ExpenseSheet[] Returns an array of ExpenseSheet objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ExpenseSheet
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
