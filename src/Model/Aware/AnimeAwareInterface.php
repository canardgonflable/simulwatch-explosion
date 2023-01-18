<?php

declare(strict_types=1);

namespace App\Model\Aware;

use App\Model\AnimeInterface;

/**
 * Class AnimeAwareInterface
 * @package App\Model\Aware
 *
 * @author  Clément Magnin <cma.asdoria@gmail.com>
 */
interface AnimeAwareInterface
{
    /**
     * @return AnimeInterface|null
     */
    public function getAnime(): ?AnimeInterface;

    /**
     * @param AnimeInterface|null $anime
     *
     * @return void
     */
    public function setAnime(?AnimeInterface $anime): void;
}
