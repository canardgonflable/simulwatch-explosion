<?php

declare(strict_types=1);

namespace App\Entity\User;

use App\Model\AppUserInterface;
use App\Model\CustomerInterface;
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

    /** @var CustomerInterface|null */
    protected ?CustomerInterface $customer = null;

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

    /**
     * @return CustomerInterface|null
     */
    public function getCustomer(): ?CustomerInterface
    {
        return $this->customer;
    }

    /**
     * @param $customer
     *
     * @return void
     */
    public function setCustomer($customer): void
    {
        $this->customer = $customer;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->customer?->getEmail();

    }

    /**
     * @param string|null $email
     *
     * @return void
     */
    public function setEmail(?string $email): void
    {
        if (null === $this->customer) {
            throw new UnexpectedTypeException($this->customer, CustomerInterface::class);
        }

        $this->customer->setEmail($email);
    }

    /**
     * @return string|null
     */
    public function getEmailCanonical(): ?string
    {
        return $this->customer?->getEmailCanonical();
    }

    /**
     * @param string|null $emailCanonical
     *
     * @return void
     */
    public function setEmailCanonical(?string $emailCanonical): void
    {
        if (null === $this->customer) {
            throw new UnexpectedTypeException($this->customer, CustomerInterface::class);
        }

        $this->customer->setEmailCanonical($emailCanonical);
    }
}
