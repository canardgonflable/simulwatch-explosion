<?php

declare(strict_types=1);

namespace App\Traits;

use App\Model\StudioInterface;

/**
 * Trait StudioTrait
 * @package App\Traits
 *
 * @author  Clément Magnin <cma.asdoria@gmail.com>
 */
trait StudioTrait
{
    /** @var StudioInterface|null */
    protected ?StudioInterface $studio = null;

    /**
     * @return StudioInterface|null
     */
    public function getStudio(): ?StudioInterface
    {
        return $this->studio;
    }

    /**
     * @param StudioInterface|null $studio
     */
    public function setStudio(?StudioInterface $studio): void
    {
        $this->studio = $studio;
    }
}
