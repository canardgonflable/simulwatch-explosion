<?php

declare(strict_types=1);

namespace App\Model\Aware;

/**
 * Class MalIdAwareInterface
 * @package App\Repository\Model
 *
 * @author  Clément Magnin <cma.asdoria@gmail.com>
 */
interface MalIdAwareInterface
{
    /**
     * @return int|null
     */
    public function getMalId(): ?int;

    /**
     * @param int|null $malId
     */
    public function setMalId(?int $malId): void;
}
