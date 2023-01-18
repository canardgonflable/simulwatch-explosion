<?php

declare(strict_types=1);

namespace App\Controller;

use Monofony\Contracts\Admin\Dashboard\DashboardStatisticsProviderInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

/**
 * Class DashboardController
 * @package App\Controller
 *
 * @author  Clément Magnin <cma.asdoria@gmail.com>
 */
class DashboardController
{
    /**
     * DashboardController constructor.
     *
     * @param DashboardStatisticsProviderInterface $statisticsProvider
     * @param Environment                          $twig
     */
    public function __construct(
        protected DashboardStatisticsProviderInterface $statisticsProvider,
        protected Environment $twig,
    ) {}

    /**
     * @return Response
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function indexAction(): Response
    {
        $statistics = $this->statisticsProvider->getStatistics();
        $content    = $this->twig->render('backend/index.html.twig', ['statistics' => $statistics]);

        return new Response($content);
    }
}
