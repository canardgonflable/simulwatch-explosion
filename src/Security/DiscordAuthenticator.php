<?php

declare(strict_types=1);

namespace App\Security;

use App\Entity\User\AppUser;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use KnpU\OAuth2ClientBundle\Client\ClientRegistry;
use KnpU\OAuth2ClientBundle\Security\Authenticator\OAuth2Authenticator;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\SelfValidatingPassport;
use Symfony\Component\Security\Http\EntryPoint\AuthenticationEntryPointInterface;
use Wohali\OAuth2\Client\Provider\DiscordResourceOwner;

/**
 * Class DiscordAuthenticator
 * @package App\Security
 *
 * @author  Clément Magnin <cma.asdoria@gmail.com>
 */
final class DiscordAuthenticator extends OAuth2Authenticator implements AuthenticationEntryPointInterface
{
    /**
     * DiscordAuthenticator constructor.
     *
     * @param ClientRegistry         $clientRegistry
     * @param EntityManagerInterface $em
     * @param RouterInterface        $router
     * @param UserRepository         $userRepository
     */
    public function __construct(
        protected ClientRegistry $clientRegistry,
        protected EntityManagerInterface $em,
        protected RouterInterface $router,
        protected UserRepository $userRepository
    ) {}

    /**
     * @param Request                      $request
     * @param AuthenticationException|null $authException
     *
     * @return RedirectResponse
     */
    public function start(Request $request, AuthenticationException $authException = null): RedirectResponse
    {
        return new RedirectResponse($this->router->generate("sylius_frontend_oauth_discord_start"), Response::HTTP_TEMPORARY_REDIRECT);
    }

    /**
     * @param Request $request
     *
     * @return bool|null
     */
    public function supports(Request $request): ?bool
    {
        return $request->attributes->get("_route") === "sylius_frontend_oauth_discord_login";
    }

    /**
     * @param Request $request
     *
     * @return SelfValidatingPassport
     */
    public function authenticate(Request $request): SelfValidatingPassport
    {
        $client      = $this->clientRegistry->getClient("discord");
        $accessToken = $this->fetchAccessToken($client);

        return new SelfValidatingPassport(
            new UserBadge($accessToken->getToken(), function () use ($accessToken, $client) {
                /** @var DiscordResourceOwner $discordUser */
                $discordUser = $client->fetchUserFromToken($accessToken);

                $user = $this->userRepository->findOneBy(["discordId" => $discordUser->getId()]);

                if (null === $user) {
                    $user = new AppUser();
                    $user->setDiscordId($discordUser->getId());
                }
                $user->setAvatar($discordUser->getAvatarHash());

                $this->userRepository->add($user);

                return $user;
            })
        );
    }

    /**
     * @param Request        $request
     * @param TokenInterface $token
     * @param string         $firewallName
     *
     * @return Response|null
     */
    public function onAuthenticationSuccess(Request $request, TokenInterface $token, string $firewallName): ?Response
    {
        // redirect to user to your post authentication page (e.g. dashboard, home)
        return new RedirectResponse($this->router->generate('app_frontend_homepage'));
    }

    /**
     * @param Request                 $request
     * @param AuthenticationException $exception
     *
     * @return Response|null
     */
    public function onAuthenticationFailure(Request $request, AuthenticationException $exception): ?Response
    {
        /** @var Session $session */
        $session = $request->getSession();

        $session->getFlashBag()->add('danger', $exception->getMessage());

        return new RedirectResponse($this->router->generate('app_frontend_login'));
    }
}
