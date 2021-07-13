<?php

namespace App\Repository;

use App\Entity\Bibliothque;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Bibliothque|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bibliothque|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bibliothque[]    findAll()
 * @method Bibliothque[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BibliothqueRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Bibliothque::class);
    }

    // /**
    //  * @return Bibliothque[] Returns an array of Bibliothque objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Bibliothque
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
