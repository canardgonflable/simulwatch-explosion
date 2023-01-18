<?php

declare(strict_types=1);

namespace App\Model;

use App\Model\Aware\BroadcastAwareInterface;
use App\Model\Aware\GenresAwareInterface;
use App\Model\Aware\MainPictureAwareInterface;
use App\Model\Aware\MalIdAwareInterface;
use App\Model\Aware\StartSeasonAwareInterface;
use App\Model\Aware\StudiosAwareInterface;
use DateTimeInterface;
use Sylius\Component\Resource\Model\ResourceInterface;

/**
 * Class AnimeInterface
 * @package App\Model
 *
 * @author  Clément Magnin <cma.asdoria@gmail.com>
 */
interface AnimeInterface extends
    GenresAwareInterface,
    StudiosAwareInterface,
    StartSeasonAwareInterface,
    BroadcastAwareInterface,
    MainPictureAwareInterface,
    MalIdAwareInterface,
    ResourceInterface
{
    /**
     * @return string|null
     */
    public function getTitle(): ?string;

    /**
     * @param string|null $title
     */
    public function setTitle(?string $title): void;

    /**
     * @return float|null
     */
    public function getSimulwatchScore(): ?float;

    /**
     * @param float|null $simulwatchScore
     */
    public function setSimulwatchScore(?float $simulwatchScore): void;

    /**
     * @return float|null
     */
    public function getMalScore(): ?float;

    /**
     * @param float|null $malScore
     */
    public function setMalScore(?float $malScore): void;

    /**
     * @return string|null
     */
    public function getSynopsis(): ?string;

    /**
     * @param string|null $synopsis
     */
    public function setSynopsis(?string $synopsis): void;

    /**
     * @return string|null
     */
    public function getMediaType(): ?string;

    /**
     * @param string|null $mediaType
     */
    public function setMediaType(?string $mediaType): void;

    /**
     * @return string|null
     */
    public function getStatus(): ?string;

    /**
     * @param string|null $status
     */
    public function setStatus(?string $status): void;

    /**
     * @return DateTimeInterface|null
     */
    public function getStartDate(): ?DateTimeInterface;

    /**
     * @param DateTimeInterface|null $startDate
     */
    public function setStartDate(?DateTimeInterface $startDate): void;

    /**
     * @return DateTimeInterface|null
     */
    public function getEndDate(): ?DateTimeInterface;

    /**
     * @param DateTimeInterface|null $endDate
     */
    public function setEndDate(?DateTimeInterface $endDate): void;

    /**
     * @return int|null
     */
    public function getNumberEpisodes(): ?int;

    /**
     * @param int|null $numberEpisodes
     */
    public function setNumberEpisodes(?int $numberEpisodes): void;

    /**
     * @return int|null
     */
    public function getAverageEpisodeDuration(): ?int;

    /**
     * @param int|null $averageEpisodeDuration
     */
    public function setAverageEpisodeDuration(?int $averageEpisodeDuration): void;

    /**
     * @return string|null
     */
    public function getRating(): ?string;

    /**
     * @param string|null $rating
     */
    public function setRating(?string $rating): void;
}
