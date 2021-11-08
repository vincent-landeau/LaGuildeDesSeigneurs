<?php

namespace App\Repository;

use App\Entity\PlayerController;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PlayerController|null find($id, $lockMode = null, $lockVersion = null)
 * @method PlayerController|null findOneBy(array $criteria, array $orderBy = null)
 * @method PlayerController[]    findAll()
 * @method PlayerController[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlayerControllerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PlayerController::class);
    }

    // /**
    //  * @return PlayerController[] Returns an array of PlayerController objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PlayerController
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
