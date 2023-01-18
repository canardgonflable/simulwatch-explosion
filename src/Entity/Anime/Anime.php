<?php

declare(strict_types=1);

namespace App\Entity\Anime;

use App\Model\AnimeInterface;
use App\Traits\BroadcastTrait;
use App\Traits\GenresTrait;
use App\Traits\MainPictureTrait;
use App\Traits\MalIdTrait;
use App\Traits\ResourceTrait;
use App\Traits\StartSeasonTrait;
use App\Traits\StudiosTrait;
use DateTimeInterface;
use Sylius\Component\Resource\Model\ResourceInterface;

/**
 * Class Anime
 * @package App\Entity
 *
 * @author  Clément Magnin <cma.asdoria@gmail.com>
 */
class Anime implements AnimeInterface
{
    use ResourceTrait;
    use GenresTrait;
    use StudiosTrait;
    use StartSeasonTrait;
    use BroadcastTrait;
    use MainPictureTrait;
    use MalIdTrait;

    /** @var string|null */
    protected ?string $title = null;

    /** @var float|null */
    protected ?float $simulwatchScore = null;

    /** @var float|null */
    protected ?float $malScore = null;

    /** @var string|null */
    protected ?string $synopsis = null;

    /** @var string|null */
    protected ?string $mediaType = null;

    /** @var string|null */
    protected ?string $status = null;

    /** @var DateTimeInterface|null */
    protected ?DateTimeInterface $startDate = null;

    /** @var DateTimeInterface|null */
    protected ?DateTimeInterface $endDate = null;

    /** @var int|null */
    protected ?int $numberEpisodes = null;

    /** @var int|null */
    protected ?int $averageEpisodeDuration = null;

    /** @var string|null */
    protected ?string $rating = null;

    /**
     *
     */
    public function __construct()
    {
        $this->initializeGenresCollection();
        $this->initializeStudiosCollection();
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     */
    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    /**
     * @return float|null
     */
    public function getSimulwatchScore(): ?float
    {
        return $this->simulwatchScore;
    }

    /**
     * @param float|null $simulwatchScore
     */
    public function setSimulwatchScore(?float $simulwatchScore): void
    {
        $this->simulwatchScore = $simulwatchScore;
    }

    /**
     * @return float|null
     */
    public function getMalScore(): ?float
    {
        return $this->malScore;
    }

    /**
     * @param float|null $malScore
     */
    public function setMalScore(?float $malScore): void
    {
        $this->malScore = $malScore;
    }

    /**
     * @return string|null
     */
    public function getSynopsis(): ?string
    {
        return $this->synopsis;
    }

    /**
     * @param string|null $synopsis
     */
    public function setSynopsis(?string $synopsis): void
    {
        $this->synopsis = $synopsis;
    }

    /**
     * @return string|null
     */
    public function getMediaType(): ?string
    {
        return $this->mediaType;
    }

    /**
     * @param string|null $mediaType
     */
    public function setMediaType(?string $mediaType): void
    {
        $this->mediaType = $mediaType;
    }

    /**
     * @return string|null
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * @param string|null $status
     */
    public function setStatus(?string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getStartDate(): ?DateTimeInterface
    {
        return $this->startDate;
    }

    /**
     * @param DateTimeInterface|null $startDate
     */
    public function setStartDate(?DateTimeInterface $startDate): void
    {
        $this->startDate = $startDate;
    }

    /**
     * @return DateTimeInterface|null
     */
    public function getEndDate(): ?DateTimeInterface
    {
        return $this->endDate;
    }

    /**
     * @param DateTimeInterface|null $endDate
     */
    public function setEndDate(?DateTimeInterface $endDate): void
    {
        $this->endDate = $endDate;
    }

    /**
     * @return int|null
     */
    public function getNumberEpisodes(): ?int
    {
        return $this->numberEpisodes;
    }

    /**
     * @param int|null $numberEpisodes
     */
    public function setNumberEpisodes(?int $numberEpisodes): void
    {
        $this->numberEpisodes = $numberEpisodes;
    }

    /**
     * @return int|null
     */
    public function getAverageEpisodeDuration(): ?int
    {
        return $this->averageEpisodeDuration;
    }

    /**
     * @param int|null $averageEpisodeDuration
     */
    public function setAverageEpisodeDuration(?int $averageEpisodeDuration): void
    {
        $this->averageEpisodeDuration = $averageEpisodeDuration;
    }

    /**
     * @return string|null
     */
    public function getRating(): ?string
    {
        return $this->rating;
    }

    /**
     * @param string|null $rating
     */
    public function setRating(?string $rating): void
    {
        $this->rating = $rating;
    }
}
