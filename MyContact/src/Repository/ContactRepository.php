<?php

namespace App\Repository;

use App\Entity\Contact;
use App\Entity\ContactSearch;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Contact|null find($id, $lockMode = null, $lockVersion = null)
 * @method Contact|null findOneBy(array $criteria, array $orderBy = null)
 * @method Contact[]    findAll()
 * @method Contact[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContactRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Contact::class);
    }


    /**
     * @param ContactSearch $search
     * @return Query
     */
    public function findAllVisibleQuery(ContactSearch $search): Query
    {
        $query = $this->findVisibleQuery();

        if ($search->getFindContactByPrenom()){
            $query =$query
                ->andWhere('c.prenom = :findcontactprenom')
                ->setParameter('findcontactprenom',$search->getFindContactByPrenom());

        }
        if ($search->getFindContactByNom()){
        $query =$query
            ->andWhere('c.nom = :findcontactnom')
            ->setParameter('findcontactnom',$search->getFindContactByNom());

    }
        if ($search->getFindContactByNumero()){
        $query =$query
            ->andWhere('c.numero = :findcontactnumero')
            ->setParameter('findcontactnumero',$search->getFindContactByNumero());

    }
            return $query->getQuery();
    }

    /**
     * @return Contact[]
     */
    public function findLatest(): array
    {
        return $this->findVisibleQuery()
            ->setMaxResults(4)
            ->getQuery()
            ->getResult();
    }

    private function findVisibleQuery():QueryBuilder
    {
        return $this->createQueryBuilder('c')
            ->where('c.id > 0');

    }






    // /**
    //  * @return Contact[] Returns an array of Contact objects
    //  */
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

    /*
    public function findOneBySomeField($value): ?Contact
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
