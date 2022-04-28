<?php

declare(strict_types=1);

namespace App\Model;

/**
 * Class MainPictureInterface
 * @package App\Model
 *
 * @author  Clément Magnin <cma.asdoria@gmail.com>
 */
interface MainPictureInterface
{
    /**
     * @return string|null
     */
    public function getMedium(): ?string;

    /**
     * @param string|null $medium
     */
    public function setMedium(?string $medium): void;

    /**
     * @return string|null
     */
    public function getLarge(): ?string;

    /**
     * @param string|null $large
     */
    public function setLarge(?string $large): void;
}
