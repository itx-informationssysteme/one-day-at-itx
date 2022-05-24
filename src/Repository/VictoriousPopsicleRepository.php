<?php

namespace App\Repository;

use App\Entity\VictoriousPopsicle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<VictoriousPopsicle>
 *
 * @method VictoriousPopsicle|null find($id, $lockMode = null, $lockVersion = null)
 * @method VictoriousPopsicle|null findOneBy(array $criteria, array $orderBy = null)
 * @method VictoriousPopsicle[]    findAll()
 * @method VictoriousPopsicle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VictoriousPopsicleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, VictoriousPopsicle::class);
    }

    public function add(VictoriousPopsicle $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(VictoriousPopsicle $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

//    /**
//     * @return VictoriousPopsicle[] Returns an array of VictoriousPopsicle objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('v.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?VictoriousPopsicle
//    {
//        return $this->createQueryBuilder('v')
//            ->andWhere('v.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}
