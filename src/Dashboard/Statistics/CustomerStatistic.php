<?php

declare(strict_types=1);

namespace App\Dashboard\Statistics;

use App\Repository\Model\UserRepositoryInterface;
use Monofony\Component\Admin\Dashboard\Statistics\StatisticInterface;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

/**
 * Class CustomerStatistic
 * @package App\Dashboard\Statistics
 *
 * @author  Clément Magnin <cma.asdoria@gmail.com>
 */
class CustomerStatistic implements StatisticInterface
{
    /**
     * CustomerStatistic constructor.
     *
     * @param UserRepositoryInterface $customerRepository
     * @param Environment             $twig
     */
    public function __construct(
        protected UserRepositoryInterface $userRepository,
        protected Environment $twig,
    ) {}

    /**
     * @return string
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function generate(): string
    {
        $amountUsers = count($this->userRepository->findAll());

        return $this->twig->render('backend/dashboard/statistics/_amount_of_users.html.twig', [
            'amountOfUsers' => $amountUsers,
        ]);
    }

    /**
     * @return int
     */
    public static function getDefaultPriority(): int
    {
        return -1;
    }
}
