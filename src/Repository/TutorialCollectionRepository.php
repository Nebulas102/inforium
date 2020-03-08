<?php

namespace App\Repository;

use App\Entity\TutorialCollection;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TutorialCollection|null find($id, $lockMode = null, $lockVersion = null)
 * @method TutorialCollection|null findOneBy(array $criteria, array $orderBy = null)
 * @method TutorialCollection[]    findAll()
 * @method TutorialCollection[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TutorialCollectionRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TutorialCollection::class);
    }

    // /**
    //  * @return TutorialCollection[] Returns an array of TutorialCollection objects
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
    public function findOneBySomeField($value): ?TutorialCollection
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
