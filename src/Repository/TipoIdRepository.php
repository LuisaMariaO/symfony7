<?php

namespace App\Repository;

use App\Entity\TipoId;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TipoId>
 *
 * @method TipoId|null find($id, $lockMode = null, $lockVersion = null)
 * @method TipoId|null findOneBy(array $criteria, array $orderBy = null)
 * @method TipoId[]    findAll()
 * @method TipoId[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TipoIdRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TipoId::class);
    }

//    /**
//     * @return TipoId[] Returns an array of TipoId objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?TipoId
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
