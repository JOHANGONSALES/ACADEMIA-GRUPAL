<?php

namespace App\Repository;

use App\Entity\Alumnoscruso;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Alumnoscruso>
 *
 * @method Alumnoscruso|null find($id, $lockMode = null, $lockVersion = null)
 * @method Alumnoscruso|null findOneBy(array $criteria, array $orderBy = null)
 * @method Alumnoscruso[]    findAll()
 * @method Alumnoscruso[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AlumnoscrusoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Alumnoscruso::class);
    }

    public function save(Alumnoscruso $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Alumnoscruso $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Alumnoscruso[] Returns an array of Alumnoscruso objects
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

//    public function findOneBySomeField($value): ?Alumnoscruso
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
