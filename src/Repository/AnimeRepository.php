<?php

declare(strict_types=1);

namespace App\Repository;

use App\Repository\Model\AnimeRepositoryInterface;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;

/**
 * Class AnimeRepository
 * @package App\Repository
 *
 * @author  Clément Magnin <cma.asdoria@gmail.com>
 */
class AnimeRepository extends EntityRepository implements AnimeRepositoryInterface
{

}
