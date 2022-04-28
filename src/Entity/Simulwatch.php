<?php

declare(strict_types=1);

namespace App\Entity;

use App\Model\SimulwatchInterface;
use App\Traits\ResourceTrait;
use DateTimeInterface;
use Sylius\Component\Resource\Model\ResourceInterface;

/**
 * Class Simulwatch
 * @package App\Entity
 *
 * @author  Clément Magnin <cma.asdoria@gmail.com>
 */
class Simulwatch implements SimulwatchInterface, ResourceInterface
{
    use ResourceTrait;

    /** @var DateTimeInterface */
    protected DateTimeInterface $startingDate;
}
