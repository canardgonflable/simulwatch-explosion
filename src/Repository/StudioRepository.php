<?php

declare(strict_types=1);

namespace App\Repository;

use App\Repository\Model\StudioRepositoryInterface;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;

/**
 * Class StudioRepository
 * @package App\Repository
 *
 * @author  Clément Magnin <cma.asdoria@gmail.com>
 */
class StudioRepository extends EntityRepository implements StudioRepositoryInterface
{

}
