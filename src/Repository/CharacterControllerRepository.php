<?php

namespace App\Repository;

use App\Entity\CharacterController;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CharacterController|null find($id, $lockMode = null, $lockVersion = null)
 * @method CharacterController|null findOneBy(array $criteria, array $orderBy = null)
 * @method CharacterController[]    findAll()
 * @method CharacterController[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CharacterControllerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CharacterController::class);
    }

    // /**
    //  * @return CharacterController[] Returns an array of CharacterController objects
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
    public function findOneBySomeField($value): ?CharacterController
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
