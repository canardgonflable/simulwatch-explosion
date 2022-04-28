<?php

declare(strict_types=1);

namespace App\Traits;

use App\Model\UserInterface;

/**
 * Class UserTrait
 * @package App\Traits
 *
 * @author  Clément Magnin <cma.asdoria@gmail.com>
 */
trait UserTrait
{
    /** @var UserInterface|null */
    protected ?UserInterface $user = null;

    /**
     * @return UserInterface|null
     */
    public function getUser(): ?UserInterface
    {
        return $this->user;
    }

    /**
     * @param UserInterface|null $user
     */
    public function setUser(?UserInterface $user): void
    {
        $this->user = $user;
    }
}
