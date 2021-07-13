<?php

namespace App\Repository;

use App\Entity\Referencier;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Referencier|null find($id, $lockMode = null, $lockVersion = null)
 * @method Referencier|null findOneBy(array $criteria, array $orderBy = null)
 * @method Referencier[]    findAll()
 * @method Referencier[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReferencierRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Referencier::class);
    }

    // /**
    //  * @return Referencier[] Returns an array of Referencier objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Referencier
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
