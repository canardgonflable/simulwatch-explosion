<?php

declare(strict_types=1);

namespace App\Model\Aware;

use App\Model\StudioInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Class StudiosAwareInterface
 * @package App\Model\Aware
 *
 * @author  Clément Magnin <cma.asdoria@gmail.com>
 */
interface StudiosAwareInterface
{
    /**
     * @return void
     */
    public function initializeStudiosCollection(): void;

    /**
     * @return Collection
     */
    public function getStudios(): Collection;

    /**
     * @return bool
     */
    public function hasStudios(): bool;

    /**
     * @param StudioInterface $studio
     *
     * @return bool
     */
    public function hasStudio(StudioInterface $studio): bool;

    /**
     * @param StudioInterface $studio
     *
     * @return void
     */
    public function addStudio(StudioInterface $studio): void;

    /**
     * @param StudioInterface $studio
     *
     * @return void
     */
    public function removeStudio(StudioInterface $studio): void;
}
