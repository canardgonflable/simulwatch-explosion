<?php

declare(strict_types=1);

namespace App\Dashboard\Statistics;

use App\Repository\CustomerRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
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
     * @param CustomerRepository $customerRepository
     * @param Environment        $twig
     */
    public function __construct(
        protected CustomerRepository $customerRepository,
        protected Environment $twig,
    ) {}

    /**
     * @return string
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     * @throws NoResultException
     * @throws NonUniqueResultException
     */
    public function generate(): string
    {
        $amountCustomers = $this->customerRepository->countCustomers();

        return $this->twig->render('backend/dashboard/statistics/_amount_of_customers.html.twig', [
            'amountOfCustomers' => $amountCustomers,
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
