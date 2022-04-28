<?php

declare(strict_types=1);

namespace App\Traits;

/**
 * Trait ResourceTrait
 * @package App\Traits
 *
 * @author  Clément Magnin <cma.asdoria@gmail.com>
 */
trait ResourceTrait
{
    /** @var int|null  */
    protected ?int $id = null;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }
}
