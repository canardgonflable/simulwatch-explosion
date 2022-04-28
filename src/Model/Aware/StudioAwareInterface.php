<?php

declare(strict_types=1);

namespace App\Model\Aware;

use App\Model\StudioInterface;

/**
 * Class StudioAwareInterface
 * @package App\Model\Aware
 *
 * @author  Clément Magnin <cma.asdoria@gmail.com>
 */
interface StudioAwareInterface
{
    /**
     * @return StudioInterface|null
     */
    public function getStudio(): ?StudioInterface;

    /**
     * @param StudioInterface|null $studio
     */
    public function setStudio(?StudioInterface $studio): void;
}
