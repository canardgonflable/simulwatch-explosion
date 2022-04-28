<?php

declare(strict_types=1);

namespace App\Repository;

use App\Repository\Model\SimulwatchRepositoryInterface;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;

/**
 * Class SimulwatchRepository
 * @package App\Repository
 *
 * @author  Clément Magnin <cma.asdoria@gmail.com>
 */
class SimulwatchRepository extends EntityRepository implements SimulwatchRepositoryInterface
{

}
