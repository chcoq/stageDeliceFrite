<?php

namespace App\Repository;

use App\Entity\Commandes;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Commandes|null find($id, $lockMode = null, $lockVersion = null)
 * @method Commandes|null findOneBy(array $criteria, array $orderBy = null)
 * @method Commandes[]    findAll()
 * @method Commandes[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CommandesRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Commandes::class);
    }


    public function byFacture($utilisateur)

    {
//        $utilisateur="David";
        $qb = $this->createQueryBuilder('c')
            ->select('c')
            ->where('c.user = :utilisateur')
            ->andWhere('c.valider = 1')
            ->andWhere('c.reference != 0')
            ->orderBy('c.id')
            ->setParameter('utilisateur', $utilisateur->getUsername())
            ->getQuery();

        return $qb->execute();
    }


//    /**
//     * @return Commande[] Returns an array of Commande objects
//     */
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
}
