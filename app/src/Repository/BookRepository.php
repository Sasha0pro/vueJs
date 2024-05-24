<?php

namespace App\Repository;

use App\Entity\Book;
use App\Utils\Paginator;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\ORM\Query\Expr\Join;

/**
 * @extends ServiceEntityRepository<Book>
 *
 * @method Book|null find($id, $lockMode = null, $lockVersion = null)
 * @method Book|null findOneBy(array $criteria, array $orderBy = null)
 * @method Book[]    findAll()
 * @method Book[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BookRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Book::class);
    }

    public function findBookTwoAuthorAndN(int $page): Paginator
    {
        $qb = $this
            ->createQueryBuilder('b')
            ->where('b.title like \'%н%\'')
            ->join('b.users','u')
            ->having('count(u.id) > 1')
            ->orderBy('b.title', 'ASC')
            ->groupBy('b.id');

        return (new Paginator($qb))->pagination($page);
    }

    public function getList(int $page): Paginator
    {
        $qb = $this->createQueryBuilder('b')
            ->orderBy('b.title', 'ASC');

        return (new Paginator($qb))->pagination($page);
    }

    public function getByUser(int $page, $user): Paginator
    {
        $qb = $this->createQueryBuilder('b')
            ->join('b.users','u')
            ->where('u = :u')
            ->setParameter('u', $user)
            ->groupBy('b');

        return (new Paginator($qb))->pagination($page);
    }

    public function findBookForAuthorOrTitle(string $title = null, string $author = null)
    {
        $qb = $this->createQueryBuilder('b');

            if ($title !== null) {
                $qb->where('b.title = :title')
                    ->setParameter('title', $title);
            }

            if ($author !== null) {
                $qb->join('b.users', 'u', Join::WITH, 'u.username = :username')->setParameter('username', $author);
            }

            if ($title === null && $author === null) {
                return null;
            }

            return $qb->getQuery()->getResult();

        }


}
