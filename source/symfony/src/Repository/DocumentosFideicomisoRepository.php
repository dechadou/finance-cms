<?php

namespace App\Repository;

use App\Entity\DocumentosFideicomiso;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method DocumentosFideicomiso|null find($id, $lockMode = null, $lockVersion = null)
 * @method DocumentosFideicomiso|null findOneBy(array $criteria, array $orderBy = null)
 * @method DocumentosFideicomiso[]    findAll()
 * @method DocumentosFideicomiso[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DocumentosFideicomisoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, DocumentosFideicomiso::class);
    }

    // /**
    //  * @return DocumentosFideicomiso[] Returns an array of DocumentosFideicomiso objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DocumentosFideicomiso
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
