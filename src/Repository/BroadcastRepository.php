<?php

declare(strict_types=1);

namespace App\Repository;

use App\Repository\Model\BroadcastRepositoryInterface;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;

/**
 * Class BroadcastRepository
 * @package App\Repository
 *
 * @author  Clément Magnin <cma.asdoria@gmail.com>
 */
class BroadcastRepository extends EntityRepository implements BroadcastRepositoryInterface
{

}
