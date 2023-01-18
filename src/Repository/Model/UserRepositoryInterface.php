<?php

declare(strict_types=1);

namespace App\Repository\Model;

use Sylius\Component\User\Model\UserInterface;
use Sylius\Component\User\Repository\UserRepositoryInterface as BaseUserRepositoryInterface;

/**
 * Interface UserRepositoryInterface
 * @package App\Repository\Model
 *
 * @author  Clément Magnin <cma.asdoria@gmail.com>
 */
interface UserRepositoryInterface extends BaseUserRepositoryInterface
{
    /**
     * @param string $email
     *
     * @return UserInterface|null
     */
    public function findOneByEmail(string $email): ?UserInterface;
}
