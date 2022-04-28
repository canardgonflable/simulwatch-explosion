<?php

declare(strict_types=1);

namespace App\Traits;

use App\Model\GenreInterface;

/**
 * Class GenreTrait
 * @package App\Traits
 *
 * @author  Clément Magnin <cma.asdoria@gmail.com>
 */
trait GenreTrait
{
    /** @var GenreInterface|null */
    protected ?GenreInterface $genre = null;

    /**
     * @return GenreInterface|null
     */
    public function getGenre(): ?GenreInterface
    {
        return $this->genre;
    }

    /**
     * @param GenreInterface|null $genre
     *
     * @return void
     */
    public function setGenre(?GenreInterface $genre): void
    {
        $this->genre = $genre;
    }
}
