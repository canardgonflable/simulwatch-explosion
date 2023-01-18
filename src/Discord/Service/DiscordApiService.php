<?php

declare(strict_types=1);

namespace App\Discord\Service;

use App\Discord\Service\Model\DiscordApiServiceInterface;
use App\Entity\Customer\Customer;
use App\Entity\Discord\DiscordUser;
use App\Model\CustomerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

/**
 * Class DiscordApi
 * @package App\Api
 *
 * @author  Clément Magnin <cma.asdoria@gmail.com>
 */
class DiscordApiService
{
    public const AUTHORIZATION_URI = 'https://discord.com/api/oauth2/authorize';

    public const USERS_ME_ENDPOINT = 'https://discord.com/api/users/@me';

    /**
     * DiscordApiService constructor.
     *
     * @param HttpClientInterface $discordApiClient
     * @param SerializerInterface $serializer
     * @param string              $clientId
     * @param string              $redirectUri
     */
    public function __construct(
        protected HttpClientInterface $discordApiClient,
        protected SerializerInterface $serializer,
        protected string $clientId,
        protected string $redirectUri,
    ) {}

    /**
     * @param array $scope
     *
     * @return string
     */
    public function getAuthorizationUrl(array $scope): string
    {
        $queryParameters = http_build_query([
            'client_id' => $this->clientId,
            'redirect_uri' => $this->redirectUri,
            'response_type' => 'token',
            'scope' => implode(' ', $scope),
            'prompt' => 'none'
        ]);

        return self::AUTHORIZATION_URI . '?' . $queryParameters;
    }

    /**
     * @param string $accessToken
     *
     * @return DiscordUser
     * @throws ClientExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function fetchUser(string $accessToken): DiscordUser
    {
        $response = $this->discordApiClient->request(Request::METHOD_GET, self::USERS_ME_ENDPOINT, [
            'auth_bearer' => $accessToken
        ]);

        $data = $response->getContent();

        return $this->serializer->deserialize($data, DiscordUser::class, 'json');
    }
}
