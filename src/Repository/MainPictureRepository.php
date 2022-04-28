<?php

declare(strict_types=1);

namespace App\Repository;

use App\Repository\Model\MainPictureRepositoryInterface;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;

/**
 * Class MainPictureRepository
 * @package App\Repository
 *
 * @author  Clément Magnin <cma.asdoria@gmail.com>
 */
class MainPictureRepository extends EntityRepository implements MainPictureRepositoryInterface
{

}
