<?php

declare(strict_types=1);

namespace App\Repository;

use App\Repository\Model\GenreRepositoryInterface;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;

/**
 * Class GenreRepository
 * @package App\Repository
 *
 * @author  Clément Magnin <cma.asdoria@gmail.com>
 */
class GenreRepository extends EntityRepository implements GenreRepositoryInterface
{

}
