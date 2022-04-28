<?php

declare(strict_types=1);

namespace App\Model;

use App\Model\Aware\AnimesAwareInterface;
use App\Model\Aware\MalIdAwareInterface;
use App\Model\Aware\NamingAwareInterface;

/**
 * Class StudioInterface
 * @package App\Model
 *
 * @author  Clément Magnin <cma.asdoria@gmail.com>
 */
interface StudioInterface extends
    NamingAwareInterface,
    AnimesAwareInterface,
    MalIdAwareInterface
{

}
