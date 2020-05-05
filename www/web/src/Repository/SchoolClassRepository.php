<?php

namespace App\Repository;

use App\Entity\SchoolClass;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method SchoolClass|null find($id, $lockMode = null, $lockVersion = null)
 * @method SchoolClass|null findOneBy(array $criteria, array $orderBy = null)
 * @method SchoolClass[]    findAll()
 * @method SchoolClass[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SchoolClassRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SchoolClass::class);
    }





    // /**
    //  * @return SchoolClass[] Returns an array of SchoolClass objects
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
    public function findOneBySomeField($value): ?SchoolClass
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
