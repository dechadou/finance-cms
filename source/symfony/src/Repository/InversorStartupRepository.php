<?php

namespace App\Repository;

use App\Entity\InversorStartup;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method InversorStartup|null find($id, $lockMode = null, $lockVersion = null)
 * @method InversorStartup|null findOneBy(array $criteria, array $orderBy = null)
 * @method InversorStartup[]    findAll()
 * @method InversorStartup[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InversorStartupRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, InversorStartup::class);
    }

    // /**
    //  * @return InversorStartup[] Returns an array of InversorStartup objects
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
    public function findOneBySomeField($value): ?InversorStartup
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
