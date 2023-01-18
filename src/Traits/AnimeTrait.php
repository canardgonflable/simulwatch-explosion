<?php

declare(strict_types=1);

namespace App\Traits;

use App\Model\AnimeInterface;

/**
 * Trait AnimeTrait
 * @package App\Traits
 *
 * @author  Clément Magnin <cma.asdoria@gmail.com>
 */
trait AnimeTrait
{
    /** @var AnimeInterface|null */
    protected ?AnimeInterface $anime = null;

    /**
     * @return AnimeInterface|null
     */
    public function getAnime(): ?AnimeInterface
    {
        return $this->anime;
    }

    /**
     * @param AnimeInterface|null $anime
     *
     * @return void
     */
    public function setAnime(?AnimeInterface $anime): void
    {
        $this->anime = $anime;
    }
}
