<?php

declare(strict_types=1);

namespace App\Repository\Model;

use Sylius\Component\Resource\Repository\RepositoryInterface;
interface CustomerRepositoryInterface extends RepositoryInterface
{
    /**
     * @return int
     */
    public function countCustomers(): int;

    /**
     * @param int $count
     *
     * @return array
     */
    public function findLatest(int $count): array;
}
