<?php

namespace App\Repository;

use App\Entity\LocaleTemplates;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LocaleTemplates|null find($id, $lockMode = null, $lockVersion = null)
 * @method LocaleTemplates|null findOneBy(array $criteria, array $orderBy = null)
 * @method LocaleTemplates[]    findAll()
 * @method LocaleTemplates[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LocaleTemplatesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LocaleTemplates::class);
    }

    public function findLocale($locale, $default = 'en'): ?LocaleTemplates
    {
        $return = $this->createQueryBuilder('e')
            ->andWhere('e.locale = :locale')
            ->setParameter('locale', $locale)
            ->getQuery()
            ->getOneOrNullResult()
        ;

        if(is_null($return)){
            $return = $this->createQueryBuilder('e')
            ->andWhere('e.locale = :locale')
            ->setParameter('locale', $default)
            ->getQuery()
            ->getOneOrNullResult()
            ;
        }

        return $return;
    }

    // /**
    //  * @return LocaleTemplates[] Returns an array of LocaleTemplates objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LocaleTemplates
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
