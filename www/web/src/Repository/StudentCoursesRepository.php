<?php

namespace App\Repository;

use App\Entity\StudentCourses;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method StudentCourses|null find($id, $lockMode = null, $lockVersion = null)
 * @method StudentCourses|null findOneBy(array $criteria, array $orderBy = null)
 * @method StudentCourses[]    findAll()
 * @method StudentCourses[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StudentCoursesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StudentCourses::class);
    }

    // /**
    //  * @return StudentCourses[] Returns an array of StudentCourses objects
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
    public function findOneBySomeField($value): ?StudentCourses
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
