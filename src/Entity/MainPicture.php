<?php

declare(strict_types=1);

namespace App\Entity;

use App\Model\MainPictureInterface;
use App\Traits\ResourceTrait;
use Sylius\Component\Resource\Model\ResourceInterface;

/**
 * Class MainPicture
 * @package App\Entity
 *
 * @author  Clément Magnin <cma.asdoria@gmail.com>
 */
class MainPicture implements MainPictureInterface, ResourceInterface
{
    use ResourceTrait;

    /** @var string|null */
    protected ?string $medium;

    /** @var string|null */
    protected ?string $large;

    /**
     * @return string|null
     */
    public function getMedium(): ?string
    {
        return $this->medium;
    }

    /**
     * @param string|null $medium
     */
    public function setMedium(?string $medium): void
    {
        $this->medium = $medium;
    }

    /**
     * @return string|null
     */
    public function getLarge(): ?string
    {
        return $this->large;
    }

    /**
     * @param string|null $large
     */
    public function setLarge(?string $large): void
    {
        $this->large = $large;
    }
}
