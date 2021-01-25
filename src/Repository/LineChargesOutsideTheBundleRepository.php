<?php

namespace App\Repository;

use App\Entity\LineChargesOutsideTheBundle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @method LineChargesOutsideTheBundle|null find($id, $lockMode = null, $lockVersion = null)
 * @method LineChargesOutsideTheBundle|null findOneBy(array $criteria, array $orderBy = null)
 * @method LineChargesOutsideTheBundle[]    findAll()
 * @method LineChargesOutsideTheBundle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LineChargesOutsideTheBundleRepository extends ServiceEntityRepository implements PasswordUpgraderInterface
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LineChargesOutsideTheBundle::class);
    }

    /**
     * Used to upgrade (rehash) the user's password automatically over time.
     */
    public function upgradePassword(UserInterface $user, string $newEncodedPassword): void
    {
        if (!$user instanceof LineChargesOutsideTheBundle) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', \get_class($user)));
        }

        $user->setPassword($newEncodedPassword);
        $this->_em->persist($user);
        $this->_em->flush();
    }

    // /**
    //  * @return LineChargesOutsideTheBundle[] Returns an array of LineChargesOutsideTheBundle objects
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
    public function findOneBySomeField($value): ?LineChargesOutsideTheBundle
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
