<?php

declare(strict_types=1);

namespace App\Model;

/**
 * Class BroadcastInterface
 * @package App\Model
 *
 * @author  Clément Magnin <cma.asdoria@gmail.com>
 */
interface BroadcastInterface
{
    /**
     * @return string|null
     */
    public function getDayOfTheWeek(): ?string;

    /**
     * @param string|null $dayOfTheWeek
     */
    public function setDayOfTheWeek(?string $dayOfTheWeek): void;

    /**
     * @return string|null
     */
    public function getStartTime(): ?string;

    /**
     * @param string|null $startTime
     */
    public function setStartTime(?string $startTime): void;
}
