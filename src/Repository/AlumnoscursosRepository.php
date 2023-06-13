<?php

namespace App\Repository;

use App\Entity\Alumnoscursos;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Alumnoscursos>
 *
 * @method Alumnoscursos|null find($id, $lockMode = null, $lockVersion = null)
 * @method Alumnoscursos|null findOneBy(array $criteria, array $orderBy = null)
 * @method Alumnoscursos[]    findAll()
 * @method Alumnoscursos[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AlumnoscursosRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Alumnoscursos::class);
    }

    public function save(Alumnoscursos $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Alumnoscursos $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return Alumnoscursos[] Returns an array of Alumnoscursos objects
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

//    public function findOneBySomeField($value): ?Alumnoscursos
//    {
//        return $this->createQueryBuilder('a')
//            ->andWhere('a.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
