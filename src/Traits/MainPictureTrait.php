<?php

declare(strict_types=1);

namespace App\Traits;

use App\Model\MainPictureInterface;

/**
 * Trait MainPictureTrait
 * @package App\Traits
 *
 * @author  Clément Magnin <cma.asdoria@gmail.com>
 */
trait MainPictureTrait
{
    /** @var MainPictureInterface|null */
    protected ?MainPictureInterface $mainPicture = null;

    /**
     * @return MainPictureInterface|null
     */
    public function getMainPicture(): ?MainPictureInterface
    {
        return $this->mainPicture;
    }

    /**
     * @param MainPictureInterface|null $mainPicture
     */
    public function setMainPicture(?MainPictureInterface $mainPicture): void
    {
        $this->mainPicture = $mainPicture;
    }
}
