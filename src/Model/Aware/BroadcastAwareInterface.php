<?php

declare(strict_types=1);

namespace App\Model\Aware;

use App\Model\BroadcastInterface;

/**
 * Class BroadcastWareInterface
 * @package App\Model\Aware
 *
 * @author  Clément Magnin <cma.asdoria@gmail.com>
 */
interface BroadcastAwareInterface
{
    /**
     * @return BroadcastInterface|null
     */
    public function getBroadcast(): ?BroadcastInterface;

    /**
     * @param BroadcastInterface|null $broadcast
     *
     * @return void
     */
    public function setBroadcast(?BroadcastInterface $broadcast): void;
}
