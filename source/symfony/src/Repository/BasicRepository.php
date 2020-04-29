<?php

namespace App\Repository;

use App\Entity\Basic;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Basic|null find($id, $lockMode = null, $lockVersion = null)
 * @method Basic|null findOneBy(array $criteria, array $orderBy = null)
 * @method Basic[]    findAll()
 * @method Basic[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BasicRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Basic::class);
    }

    // /**
    //  * @return Basic[] Returns an array of Basic objects
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
    public function findOneBySomeField($value): ?Basic
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
