<?php

declare(strict_types=1);

namespace App\Traits;

use App\Model\StudioInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Trait StudiosTrait
 * @package App\Traits
 *
 * @author  Clément Magnin <cma.asdoria@gmail.com>
 */
trait StudiosTrait
{
    /** @var Collection */
    protected Collection $studios;

    /**
     * @return void
     */
    public function initializeStudiosCollection(): void
    {
        $this->studios = new ArrayCollection();
    }

    /**
     * @return Collection
     */
    public function getStudios(): Collection
    {
        return $this->studios;
    }

    /**
     * @return bool
     */
    public function hasStudios(): bool
    {
        return !$this->studios->isEmpty();
    }

    /**
     * @param StudioInterface $studio
     *
     * @return bool
     */
    public function hasStudio(StudioInterface $studio): bool
    {
        return $this->studios->contains($studio);
    }

    /**
     * @param StudioInterface $studio
     *
     * @return void
     */
    public function addStudio(StudioInterface $studio): void
    {
        $this->studios->add($studio);
    }

    /**
     * @param StudioInterface $studio
     *
     * @return void
     */
    public function removeStudio(StudioInterface $studio): void
    {
        if ($this->hasStudio($studio)) {
            $this->studios->removeElement($studio);
        }
    }
}
