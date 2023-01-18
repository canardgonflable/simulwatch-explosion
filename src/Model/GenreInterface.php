<?php

declare(strict_types=1);

namespace App\Model;

use App\Model\Aware\AnimesAwareInterface;
use App\Model\Aware\MalIdAwareInterface;
use App\Model\Aware\NamingAwareInterface;
use Sylius\Component\Resource\Model\ResourceInterface;

/**
 * Class GenreInterface
 * @package App\Model
 *
 * @author  Clément Magnin <cma.asdoria@gmail.com>
 */
interface GenreInterface extends
    NamingAwareInterface,
    AnimesAwareInterface,
    MalIdAwareInterface,
    ResourceInterface
{

}
