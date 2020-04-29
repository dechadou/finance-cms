<?php

namespace App\Repository;

use App\Entity\Startup;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Startup|null find($id, $lockMode = null, $lockVersion = null)
 * @method Startup|null findOneBy(array $criteria, array $orderBy = null)
 * @method Startup[]    findAll()
 * @method Startup[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StartupRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Startup::class);
    }

    // /**
    //  * @return Startup[] Returns an array of Startup objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Startup
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
