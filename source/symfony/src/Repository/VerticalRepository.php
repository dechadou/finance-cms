<?php

namespace App\Repository;

use App\Entity\Vertical;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Vertical|null find($id, $lockMode = null, $lockVersion = null)
 * @method Vertical|null findOneBy(array $criteria, array $orderBy = null)
 * @method Vertical[]    findAll()
 * @method Vertical[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VerticalRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Vertical::class);
    }

    // /**
    //  * @return Vertical[] Returns an array of Vertical objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Vertical
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
