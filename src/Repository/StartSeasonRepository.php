<?php

declare(strict_types=1);

namespace App\Repository;

use App\Repository\Model\StartSeasonRepositoryInterface;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;

/**
 * Class StartSeasonRepository
 * @package App\Repository
 *
 * @author  Clément Magnin <cma.asdoria@gmail.com>
 */
class StartSeasonRepository extends EntityRepository implements StartSeasonRepositoryInterface
{

}
