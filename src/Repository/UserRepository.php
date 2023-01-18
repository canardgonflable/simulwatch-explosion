<?php

declare(strict_types=1);

namespace App\Repository;

use App\Entity\User\AppUser;
use App\Repository\Model\UserRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\NonUniqueResultException;
use Sylius\Bundle\UserBundle\Doctrine\ORM\UserRepository as BaseUserRepository;
use Sylius\Component\User\Model\UserInterface;

class UserRepository extends BaseUserRepository implements UserRepositoryInterface
{

    /**
     * UserRepository constructor.
     *
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(protected EntityManagerInterface $entityManager)
    {
        $meta = new ClassMetadata(AppUser::class);
        parent::__construct($entityManager, $meta);
    }

    /**
     * @param string $email
     *
     * @return UserInterface|null
     * @throws NonUniqueResultException
     */
    public function findOneByEmail(string $email): ?UserInterface
    {
        return $this->createQueryBuilder('o')
            ->innerJoin('o.customer', 'customer')
            ->andWhere('customer.emailCanonical = :email')
            ->setParameter('email', $email)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
