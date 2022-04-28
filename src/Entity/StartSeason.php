<?php

declare(strict_types=1);

namespace App\Entity;

use App\Model\StartSeasonInterface;
use App\Traits\AnimesTrait;
use App\Traits\ResourceTrait;
use DateTimeInterface;
use Sylius\Component\Resource\Model\ResourceInterface;

/**
 * Class Season
 * @package App\Entity
 *
 * @author  Clément Magnin <cma.asdoria@gmail.com>
 */
class StartSeason implements StartSeasonInterface, ResourceInterface
{
    use ResourceTrait;
    use AnimesTrait;

    /** @var DateTimeInterface|null */
    protected ?DateTimeInterface $year;

    /** @var string|null */
    protected ?string $season;

    /**
     * @return DateTimeInterface|null
     */
    public function getYear(): ?DateTimeInterface
    {
        return $this->year;
    }

    /**
     * @param DateTimeInterface|null $year
     */
    public function setYear(?DateTimeInterface $year): void
    {
        $this->year = $year;
    }

    /**
     * @return string|null
     */
    public function getSeason(): ?string
    {
        return $this->season;
    }

    /**
     * @param string|null $season
     */
    public function setSeason(?string $season): void
    {
        $this->season = $season;
    }
}
