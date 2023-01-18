<?php

declare(strict_types=1);

namespace App\Traits;

use App\Model\AnimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Trait AnimesTrait
 * @package App\Traits
 *
 * @author  Clément Magnin <cma.asdoria@gmail.com>
 */
trait AnimesTrait
{
    /** @var Collection */
    public Collection $animes;

    /**
     * @return void
     */
    public function initializeAnimesCollection(): void
    {
        $this->animes = new ArrayCollection();
    }

    /**
     * @return Collection
     */
    public function getAnimes(): Collection
    {
        return $this->animes;
    }

    /**
     * @return bool
     */
    public function hasAnimes(): bool
    {
        return !$this->animes->isEmpty();
    }

    /**
     * @param AnimeInterface $anime
     *
     * @return bool
     */
    public function hasAnime(AnimeInterface $anime): bool
    {
        return $this->animes->contains($anime);
    }

    /**
     * @param AnimeInterface $anime
     *
     * @return void
     */
    public function addAnime(AnimeInterface $anime): void
    {
        $this->animes->add($anime);
    }

    /**
     * @param AnimeInterface $anime
     *
     * @return void
     */
    public function removeAnime(AnimeInterface $anime): void
    {
        if ($this->hasAnime($anime)) {
            $this->animes->removeElement($anime);
        }
    }
}
