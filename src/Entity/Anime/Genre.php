<?php

declare(strict_types=1);

namespace App\Entity\Anime;

use App\Model\GenreInterface;
use App\Traits\AnimesTrait;
use App\Traits\MalIdTrait;
use App\Traits\NamingTrait;
use App\Traits\ResourceTrait;

/**
 * Class Genre
 * @package App\Entity
 *
 * @author  Clément Magnin <cma.asdoria@gmail.com>
 */
class Genre implements GenreInterface
{
    use ResourceTrait;
    use NamingTrait;
    use AnimesTrait;
    use MalIdTrait;
}
