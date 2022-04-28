<?php

declare(strict_types=1);

namespace App\Model\Aware;

use App\Model\StartSeasonInterface;

/**
 * Class SeasonAwareInterface
 * @package App\Model\Aware
 *
 * @author  Clément Magnin <cma.asdoria@gmail.com>
 */
interface StartSeasonAwareInterface
{
    /**
     * @return StartSeasonInterface|null
     */
    public function getStartSeason(): ?StartSeasonInterface;

    /**
     * @param StartSeasonInterface|null $StartSeason
     *
     * @return void
     */
    public function setStartSeason(?StartSeasonInterface $StartSeason): void;
}
