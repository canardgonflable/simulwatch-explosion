<?php

declare(strict_types=1);

namespace App\Discord\Authenticator;

use App\Model\CustomerInterface;
use App\Repository\Model\UserRepositoryInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Http\Authenticator\AbstractAuthenticator;
use Symfony\Component\Security\Http\Authenticator\Passport\Badge\UserBadge;
use Symfony\Component\Security\Http\Authenticator\Passport\Passport;
use Symfony\Component\Security\Http\Authenticator\Passport\SelfValidatingPassport;

/**
 * Class DiscordAuthenticator
 * @package App\Discord\Authenticator
 *
 * @author  Clément Magnin <cma.asdoria@gmail.com>
 */
class DiscordAuthenticator extends AbstractAuthenticator
{
    public const DISCORD_AUTH_KEY = 'discord-auth';

    /**
     * DiscordAuthenticator constructor.
     *
     * @param UserRepositoryInterface $userRepository
     * @param RouterInterface         $router
     */
    public function __construct(
        protected UserRepositoryInterface $userRepository,
        protected RouterInterface $router
    ) {}

    /**
     * @param Request $request
     *
     * @return bool|null
     */
    public function supports(Request $request): ?bool
    {
        return $request->attributes->get('_route') === 'sylius_frontend_oauth_discord_auth' && $this->isValidRequest($request);
    }

    /**
     * @param Request $request
     *
     * @return Passport
     */
    public function authenticate(Request $request): Passport
    {
        $accessToken = $request->query->get('accessToken');

        if (!$this->isValidRequest($request)) {
            throw new AuthenticationException('Invalid request');
        }

        if (null === $accessToken) {
            throw new AuthenticationException('No access token provided');
        }

        /** @var CustomerInterface $user */
        $user = $this->userRepository->findOneBy(['accessToken' => $accessToken]);

        if (!$user) {
            throw new AuthenticationException('Wrong access token');
        }

        $userBadge = new UserBadge($user->getEmailCanonical(), function () use ($user) {
            return $user;
        });

        $request->getSession()->remove(self::DISCORD_AUTH_KEY);

        return new SelfValidatingPassport($userBadge);
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
        return null;
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

        $session->remove(self::DISCORD_AUTH_KEY);
        $session->getFlashBag()->add('danger', $exception->getMessage());

        return new RedirectResponse($this->router->generate('app_frontend_login'));
    }

    /**
     * @param Request $request
     *
     * @return bool
     */
    private function isValidRequest(Request $request): bool
    {
        return true === $request->getSession()->get(self::DISCORD_AUTH_KEY);
    }
}
