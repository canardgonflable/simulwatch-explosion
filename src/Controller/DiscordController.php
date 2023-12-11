<?php

declare(strict_types=1);

namespace App\Controller;

use KnpU\OAuth2ClientBundle\Client\ClientRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class DiscordController
 * @package App\Controller
 *
 * @author  Clément Magnin <cma.asdoria@gmail.com>
 */
final class DiscordController extends AbstractController
{
    /**
     * @param Request        $request
     * @param ClientRegistry $clientRegistry
     *
     * @return RedirectResponse
     */
    public function loginAction(Request $request, ClientRegistry $clientRegistry): RedirectResponse
    {
        return new RedirectResponse($this->generateUrl('app_frontend_login'));
    }

    /**
     * @param ClientRegistry $clientRegistry
     *
     * @return RedirectResponse
     */
    public function startAction(ClientRegistry $clientRegistry): RedirectResponse
    {
        return $clientRegistry->getClient("discord")->redirect(["identify"]);
    }
}
