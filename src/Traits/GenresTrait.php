<?php

declare(strict_types=1);

namespace App\Traits;

use App\Model\GenreInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Trait GenresTrait
 * @package App\Traits
 *
 * @author  Clément Magnin <cma.asdoria@gmail.com>
 */
trait GenresTrait
{
    /** @var Collection */
    public Collection $genres;

    /**
     * @return void
     */
    public function initializeGenresCollection(): void
    {
        $this->genres = new ArrayCollection();
    }

    /**
     * @return Collection
     */
    public function getGenres(): Collection
    {
        return $this->genres;
    }

    /**
     * @return bool
     */
    public function hasGenres(): bool
    {
        return !$this->genres->isEmpty();
    }

    /**
     * @param GenreInterface $genre
     *
     * @return bool
     */
    public function hasGenre(GenreInterface $genre): bool
    {
        return $this->genres->contains($genre);
    }

    /**
     * @param GenreInterface $genre
     *
     * @return void
     */
    public function addGenre(GenreInterface $genre): void
    {
        $this->genres->add($genre);
    }

    /**
     * @param GenreInterface $genre
     *
     * @return void
     */
    public function removeGenre(GenreInterface $genre): void
    {
        if ($this->hasGenre($genre)) {
            $this->genres->removeElement($genre);
        }
    }
}
