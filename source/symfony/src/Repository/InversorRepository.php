<?php

namespace App\Repository;

use App\Entity\Inversor;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Inversor|null find($id, $lockMode = null, $lockVersion = null)
 * @method Inversor|null findOneBy(array $criteria, array $orderBy = null)
 * @method Inversor[]    findAll()
 * @method Inversor[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InversorRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Inversor::class);
    }

    // /**
    //  * @return Inversor[] Returns an array of Inversor objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Inversor
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
