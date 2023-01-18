<?php

declare(strict_types=1);

namespace App\Model;

use App\Model\Aware\AnimesAwareInterface;
use DateTimeInterface;
use Sylius\Component\Resource\Model\ResourceInterface;

/**
 * Class SeasonInterface
 * @package App\Model
 *
 * @author  Clément Magnin <cma.asdoria@gmail.com>
 */
interface StartSeasonInterface extends
    AnimesAwareInterface,
    ResourceInterface
{
    /**
     * @return DateTimeInterface|null
     */
    public function getYear(): ?DateTimeInterface;

    /**
     * @param DateTimeInterface|null $year
     */
    public function setYear(?DateTimeInterface $year): void;

    /**
     * @return string|null
     */
    public function getSeason(): ?string;

    /**
     * @param string|null $season
     */
    public function setSeason(?string $season): void;
}
