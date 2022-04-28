<?php

declare(strict_types=1);

namespace App\Model\Aware;

use App\Model\UserInterface;

/**
 * Class UserAwareInterface
 * @package App\Model\Aware
 *
 * @author  Clément Magnin <cma.asdoria@gmail.com>
 */
interface UserAwareInterface
{
    /**
     * @return UserInterface|null
     */
    public function getUser(): ?UserInterface;

    /**
     * @param UserInterface|null $user
     */
    public function setUser(?UserInterface $user): void;
}
