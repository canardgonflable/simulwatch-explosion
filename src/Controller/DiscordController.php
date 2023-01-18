<?php

declare(strict_types=1);

namespace App\Controller;

use App\Discord\Service\DiscordApiService;
use App\Entity\Customer\Customer;
use App\Entity\User\AppUser;
use App\Repository\Model\CustomerRepositoryInterface;
use App\Repository\Model\UserRepositoryInterface;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Sylius\Component\Resource\Factory\Factory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

/**
 * Class DiscordController
 * @package App\Controller
 *
 * @author  Clément Magnin <cma.asdoria@gmail.com>
 */
class DiscordController extends AbstractController
{
    /**
     * DiscordController constructor.
     *
     * @param DiscordApiService           $discordApiService
     * @param CustomerRepositoryInterface $customerRepository
     * @param UserRepositoryInterface     $userRepository
     */
    public function __construct(
        protected DiscordApiService $discordApiService,
        protected CustomerRepositoryInterface $customerRepository,
        protected UserRepositoryInterface $userRepository
    ) {}

    /**
     * @param Request $request
     *
     * @return Response
     */
    public function loginAction(Request $request): Response
    {
        $token = $request->request->get('token');

        if ($this->isCsrfTokenValid('discord-auth', $token)) {
            $request->getSession()->set('discord-auth', true);
            $scope = ['identify', 'email'];

            return $this->redirect($this->discordApiService->getAuthorizationUrl($scope));
        }

        return $this->redirectToRoute('app_frontend_login');
    }

    /**
     * @return Response
     */
    public function authAction(): Response
    {
        return $this->redirectToRoute('app_frontend_homepage');
    }

    /**
     * @param Request $request
     *
     * @return Response
     * @throws ClientExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ServerExceptionInterface
     * @throws TransportExceptionInterface
     */
    public function checkAction(Request $request): Response
    {
        $accessToken = $request->get('access_token');

        if (!$accessToken) {
            return $this->render('frontend/discord/check.html.twig');
        }

        $discordUser = $this->discordApiService->fetchUser($accessToken);

        $user = $this->userRepository->findOneBy(['discordId' => $discordUser->id]);

        if ($user) {
            return $this->redirectToRoute('sylius_frontend_oauth_discord_auth', [
                'accessToken' => $accessToken,
            ]);
        }

        $customer = new Customer();

        $customer->setEmail($discordUser->email);
        $customer->setEmailCanonical($discordUser->email);

        $this->customerRepository->add($customer);

        $appUser = new AppUser();

        $appUser->setCustomer($customer);
        $appUser->setEmail($discordUser->email);
        $appUser->setEmailCanonical($discordUser->email);
        $appUser->setAccessToken($accessToken);
        $appUser->setUsername($discordUser->username);
        $appUser->setAvatar($discordUser->avatar);
        $appUser->setDiscordId($discordUser->id);
        $appUser->setEnabled(true);

        $this->userRepository->add($appUser);

        return $this->redirectToRoute('sylius_frontend_oauth_discord_auth', [
            'accessToken' => $accessToken,
        ]);
    }
}
