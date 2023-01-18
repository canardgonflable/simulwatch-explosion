<?php

declare(strict_types=1);

namespace App\Traits;

use App\Model\BroadcastInterface;

/**
 * Trait BroadcastTrait
 * @package App\Traits
 *
 * @author  Clément Magnin <cma.asdoria@gmail.com>
 */
trait BroadcastTrait
{
    /** @var BroadcastInterface|null */
    protected ?BroadcastInterface $broadcast = null;

    /**
     * @return BroadcastInterface|null
     */
    public function getBroadcast(): ?BroadcastInterface
    {
        return $this->broadcast;
    }

    /**
     * @param BroadcastInterface|null $broadcast
     *
     * @return void
     */
    public function setBroadcast(?BroadcastInterface $broadcast): void
    {
        $this->broadcast = $broadcast;
    }
}
