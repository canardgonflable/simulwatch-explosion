<?php

declare(strict_types=1);

namespace App\Entity;

use App\Model\GenreInterface;
use App\Traits\AnimesTrait;
use App\Traits\MalIdTrait;
use App\Traits\NamingTrait;
use App\Traits\ResourceTrait;
use Sylius\Component\Resource\Model\ResourceInterface;

/**
 * Class Genre
 * @package App\Entity
 *
 * @author  Clément Magnin <cma.asdoria@gmail.com>
 */
class Genre implements GenreInterface, ResourceInterface
{
    use ResourceTrait;
    use NamingTrait;
    use AnimesTrait;
    use MalIdTrait;
}
