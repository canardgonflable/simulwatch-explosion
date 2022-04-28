<?php

declare(strict_types=1);

namespace App\Entity;

use App\Model\BroadcastInterface;
use App\Traits\ResourceTrait;
use Sylius\Component\Resource\Model\ResourceInterface;

/**
 * Class Broadcast
 * @package App\Entity
 *
 * @author  Clément Magnin <cma.asdoria@gmail.com>
 */
class Broadcast implements BroadcastInterface, ResourceInterface
{
    use ResourceTrait;

    /** @var string|null */
    protected ?string $dayOfTheWeek;

    /** @var string|null */
    protected ?string $startTime;

    /**
     * @return string|null
     */
    public function getDayOfTheWeek(): ?string
    {
        return $this->dayOfTheWeek;
    }

    /**
     * @param string|null $dayOfTheWeek
     */
    public function setDayOfTheWeek(?string $dayOfTheWeek): void
    {
        $this->dayOfTheWeek = $dayOfTheWeek;
    }

    /**
     * @return string|null
     */
    public function getStartTime(): ?string
    {
        return $this->startTime;
    }

    /**
     * @param string|null $startTime
     */
    public function setStartTime(?string $startTime): void
    {
        $this->startTime = $startTime;
    }
}
