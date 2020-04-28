<?php

namespace App\Repository;

use App\Entity\UserProjectDislike;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UserProjectDislike|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserProjectDislike|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserProjectDislike[]    findAll()
 * @method UserProjectDislike[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserProjectDislikeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserProjectDislike::class);
    }

    // /**
    //  * @return UserProjectDislike[] Returns an array of UserProjectDislike objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UserProjectDislike
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
