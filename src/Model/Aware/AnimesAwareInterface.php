<?php

declare(strict_types=1);

namespace App\Model\Aware;

use App\Model\AnimeInterface;
use Doctrine\Common\Collections\Collection;

/**
 * Class AnimesAwareInterface
 * @package App\Model\Aware
 *
 * @author  Clément Magnin <cma.asdoria@gmail.com>
 */
interface AnimesAwareInterface
{
    /**
     * @return void
     */
    public function initializeAnimesCollection(): void;

    /**
     * @return Collection
     */
    public function getAnimes(): Collection;

    /**
     * @return bool
     */
    public function hasAnimes(): bool;

    /**
     * @param AnimeInterface $anime
     *
     * @return bool
     */
    public function hasAnime(AnimeInterface $anime): bool;

    /**
     * @param AnimeInterface $anime
     *
     * @return void
     */
    public function addAnime(AnimeInterface $anime): void;

    /**
     * @param AnimeInterface $anime
     *
     * @return void
     */
    public function removeAnime(AnimeInterface $anime): void;
}
