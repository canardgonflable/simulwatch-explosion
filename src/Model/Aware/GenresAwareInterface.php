<?php

declare(strict_types=1);

namespace App\Model\Aware;

use App\Model\GenreInterface;
use Doctrine\Common\Collections\Collection;

/**
 * Class GenresAwareInterface
 * @package App\Model\Aware
 *
 * @author  Clément Magnin <cma.asdoria@gmail.com>
 */
interface GenresAwareInterface
{
    /**
     * @return void
     */
    public function initializeGenresCollection(): void;

    /**
     * @return Collection
     */
    public function getGenres(): Collection;

    /**
     * @return bool
     */
    public function hasGenres(): bool;

    /**
     * @param GenreInterface $genre
     *
     * @return bool
     */
    public function hasGenre(GenreInterface $genre): bool;

    /**
     * @param GenreInterface $genre
     *
     * @return void
     */
    public function addGenre(GenreInterface $genre): void;

    /**
     * @param GenreInterface $genre
     *
     * @return void
     */
    public function removeGenre(GenreInterface $genre): void;
}
