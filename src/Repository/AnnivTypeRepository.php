<?php

namespace App\Repository;

use App\Entity\AnnivType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<AnnivType>
 *
 * @method AnnivType|null find($id, $lockMode = null, $lockVersion = null)
 * @method AnnivType|null findOneBy(array $criteria, array $orderBy = null)
 * @method AnnivType[]    findAll()
 * @method AnnivType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AnnivTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AnnivType::class);
    }

    //    /**
    //     * @return AnnivType[] Returns an array of AnnivType objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('a')
    //            ->andWhere('a.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('a.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?AnnivType
    //    {
    //        return $this->createQueryBuilder('a')
    //            ->andWhere('a.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}
