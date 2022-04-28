<?php

declare(strict_types=1);

namespace App\Traits;

/**
 * Class MalIdTrait
 * @package App\Traits
 *
 * @author  Clément Magnin <cma.asdoria@gmail.com>
 */
trait MalIdTrait
{
    /** @var int|null */
    protected ?int $malId = null;

    /**
     * @return int|null
     */
    public function getMalId(): ?int
    {
        return $this->malId;
    }

    /**
     * @param int|null $malId
     */
    public function setMalId(?int $malId): void
    {
        $this->malId = $malId;
    }
}
