<?php

namespace App\Repository;

use App\Entity\UserSnippet;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method UserSnippet|null find($id, $lockMode = null, $lockVersion = null)
 * @method UserSnippet|null findOneBy(array $criteria, array $orderBy = null)
 * @method UserSnippet[]    findAll()
 * @method UserSnippet[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UserSnippetRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, UserSnippet::class);
    }

    // /**
    //  * @return UserSnippet[] Returns an array of UserSnippet objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UserSnippet
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
