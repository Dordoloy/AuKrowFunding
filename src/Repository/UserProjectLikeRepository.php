<?php

namespace App\Repository;

use App\Entity\UserProjectLike;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UserProjectLike|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserProjectLike|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserProjectLike[]    findAll()
 * @method UserProjectLike[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserProjectLikeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UserProjectLike::class);
    }

    // /**
    //  * @return UserProjectLike[] Returns an array of UserProjectLike objects
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
    public function findOneBySomeField($value): ?UserProjectLike
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
