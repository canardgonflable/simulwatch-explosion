<?php

declare(strict_types=1);

namespace App\Entity\Discord;

/**
 * Class DiscordUser
 * @package App\Model\Discord
 *
 * @author  Clément Magnin <cma.asdoria@gmail.com>
 */
class DiscordUser
{
    /** @var string */
    public string $id;

    /** @var string */
    public string $username;

    /** @var string */
    public string $avatar;

    /** @var string|null */
    public ?string $email;
}
