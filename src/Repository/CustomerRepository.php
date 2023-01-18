<?php

declare(strict_types=1);

namespace App\Repository;

use App\Repository\Model\CustomerRepositoryInterface;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;

class CustomerRepository extends EntityRepository implements CustomerRepositoryInterface
{
    /**
     * @return int
     * @throws NoResultException
     * @throws NonUniqueResultException
     */
    public function countCustomers(): int
    {
        return (int)$this->createQueryBuilder('o')
            ->select('COUNT(o.id)')
            ->getQuery()
            ->getSingleScalarResult();
    }

    /**
     * @param int $count
     *
     * @return array
     */
    public function findLatest(int $count): array
    {
        return $this->createQueryBuilder('o')
            ->addSelect('user')
            ->leftJoin('o.user', 'user')
            ->addOrderBy('o.createdAt', 'DESC')
            ->setMaxResults($count)
            ->getQuery()
            ->getResult();
    }
}
