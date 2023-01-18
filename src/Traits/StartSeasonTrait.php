<?php

declare(strict_types=1);

namespace App\Traits;

use App\Model\StartSeasonInterface;

/**
 * Trait StartSeasonTrait
 * @package App\Traits
 *
 * @author  Clément Magnin <cma.asdoria@gmail.com>
 */
trait StartSeasonTrait
{
    /** @var StartSeasonInterface|null */
    protected ?StartSeasonInterface $startSeason = null;

    /**
     * @return StartSeasonInterface|null
     */
    public function getStartSeason(): ?StartSeasonInterface
    {
        return $this->startSeason;
    }

    /**
     * @param StartSeasonInterface|null $startSeason
     */
    public function setStartSeason(?StartSeasonInterface $startSeason): void
    {
        $this->startSeason = $startSeason;
    }
}
