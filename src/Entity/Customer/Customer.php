<?php

declare(strict_types=1);

namespace App\Entity\Customer;

use App\Model\AppUserInterface;
use App\Model\CustomerInterface;
use Sylius\Component\Customer\Model\Customer as BaseCustomer;
use Sylius\Component\User\Model\UserInterface;
use Webmozart\Assert\Assert;

/**
 * Class Customer
 * @package App\Entity\Customer
 *
 * @author  Clément Magnin <cma.asdoria@gmail.com>
 */
class Customer extends BaseCustomer implements CustomerInterface
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
     *
     * @return void
     */
    public function setUser(?UserInterface $user): void
    {
        if ($this->user === $user) {
            return;
        }

        Assert::nullOrIsInstanceOf($user, AppUserInterface::class);

        $previousUser = $this->user;
        $this->user   = $user;

        if ($previousUser instanceof AppUserInterface) {
            $previousUser->setCustomer(null);
        }

        if ($user instanceof AppUserInterface) {
            $user->setCustomer($this);
        }
    }
}
