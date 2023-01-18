<?php

declare(strict_types=1);


namespace App\Model;

use Monofony\Contracts\Core\Model\User\AppUserInterface as BaseAppUserInterface;

/**
 * Class AppUserInterface
 * @package App\Model
 *
 * @author  Clément Magnin <cma.asdoria@gmail.com>
 */
interface AppUserInterface extends BaseAppUserInterface
{
    /**
     * @return string|null
     */
    public function getAvatar(): ?string;

    /**
     * @param string|null $avatar
     */
    public function setAvatar(?string $avatar): void;

    /**
     * @return string|null
     */
    public function getDiscordId(): ?string;

    /**
     * @param string|null $discordId
     */
    public function setDiscordId(?string $discordId): void;

    /**
     * @return string|null
     */
    public function getAccessToken(): ?string;

    /**
     * @param string|null $accessToken
     */
    public function setAccessToken(?string $accessToken): void;
}
