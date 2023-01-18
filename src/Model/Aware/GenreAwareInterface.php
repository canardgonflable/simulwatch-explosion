<?php

declare(strict_types=1);

namespace App\Model\Aware;

use App\Model\GenreInterface;

/**
 * Class GenreAwareInterface
 * @package App\Model\Aware
 *
 * @author  Clément Magnin <cma.asdoria@gmail.com>
 */
interface GenreAwareInterface
{
    /**
     * @return GenreInterface|null
     */
    public function getGenre(): ?GenreInterface;

    /**
     * @param GenreInterface|null $genre
     *
     * @return void
     */
    public function setGenre(?GenreInterface $genre): void;
}
