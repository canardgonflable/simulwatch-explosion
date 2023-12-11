<?php

declare(strict_types=1);

namespace App\Entity\Anime;

use App\Model\StudioInterface;
use App\Traits\AnimesTrait;
use App\Traits\MalIdTrait;
use App\Traits\NamingTrait;
use App\Traits\ResourceTrait;

/**
 * Class Studio
 * @package App\Entity
 *
 * @author  Clément Magnin <cma.asdoria@gmail.com>
 */
class Studio implements StudioInterface
{
    use ResourceTrait;
    use NamingTrait;
    use AnimesTrait;
    use MalIdTrait;
}
