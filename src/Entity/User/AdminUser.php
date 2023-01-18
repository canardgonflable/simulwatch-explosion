<?php

declare(strict_types=1);

namespace App\Entity\User;

use App\Model\AdminUserInterface;
use Monofony\Contracts\Core\Model\User\AdminAvatarInterface;
use Sylius\Component\User\Model\User as BaseUser;

/**
 * Class AdminUser
 * @package App\Entity\User
 *
 * @author  Clément Magnin <cma.asdoria@gmail.com>
 */
class AdminUser extends BaseUser implements AdminUserInterface
{
    /** @var string|null */
    protected ?string $lastName = null;

    /** @var string|null */
    protected ?string $firstName = null;

    /** @var AdminAvatarInterface|null */
    protected ?AdminAvatarInterface $avatar = null;

    public function __construct()
    {
        parent::__construct();

        $this->roles = [self::DEFAULT_ADMIN_ROLE];
    }

    /**
     * @return string|null
     */
    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    /**
     * @param string|null $lastName
     *
     * @return void
     */
    public function setLastName(?string $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string|null
     */
    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    /**
     * @param string|null $firstName
     *
     * @return void
     */
    public function setFirstName(?string $firstName): void
    {
        $this->firstName = $firstName;
    }

    /**
     * @return AdminAvatarInterface|null
     */
    public function getAvatar(): ?AdminAvatarInterface
    {
        return $this->avatar;
    }

    /**
     * @param AdminAvatarInterface|null $avatar
     *
     * @return void
     */
    public function setAvatar(?AdminAvatarInterface $avatar): void
    {
        $this->avatar = $avatar;
    }
}
