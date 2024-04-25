<?php

namespace App\Repository;

use App\Entity\Symfotest;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Symfotest>
 *
 * @method Symfotest|null find($id, $lockMode = null, $lockVersion = null)
 * @method Symfotest|null findOneBy(array $criteria, array $orderBy = null)
 * @method Symfotest[]    findAll()
 * @method Symfotest[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SymfotestRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Symfotest::class);
    }

//    /**
//     * @return Symfotest[] Returns an array of Symfotest objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('s.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?Symfotest
//    {
//        return $this->createQueryBuilder('s')
//            ->andWhere('s.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
