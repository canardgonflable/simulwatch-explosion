<?php

declare(strict_types=1);

namespace App\Entity\User;

use App\Model\AppUserInterface;
use Sylius\Component\Resource\Exception\UnexpectedTypeException;
use Sylius\Component\User\Model\User as BaseUser;

/**
 * Class AppUser
 * @package App\Entity\User
 *
 * @author  Clément Magnin <cma.asdoria@gmail.com>
 */
class AppUser extends BaseUser implements AppUserInterface
{
    /** @var string|null */
    protected ?string $avatar = null;

    /** @var string|null */
    protected ?string $discordId = null;

    /** @var string|null */
    protected ?string $accessToken = null;

    /**
     * @return string|null
     */
    public function getAvatar(): ?string
    {
        return "https://cdn.discordapp.com/avatars/{$this->discordId}/{$this->avatar}.webp";
    }

    /**
     * @param string|null $avatar
     */
    public function setAvatar(?string $avatar): void
    {
        $this->avatar = $avatar;
    }

    /**
     * @return string|null
     */
    public function getDiscordId(): ?string
    {
        return $this->discordId;
    }

    /**
     * @param string|null $discordId
     */
    public function setDiscordId(?string $discordId): void
    {
        $this->discordId = $discordId;
    }

    /**
     * @return string|null
     */
    public function getAccessToken(): ?string
    {
        return $this->accessToken;
    }

    /**
     * @param string|null $accessToken
     */
    public function setAccessToken(?string $accessToken): void
    {
        $this->accessToken = $accessToken;
    }
}
