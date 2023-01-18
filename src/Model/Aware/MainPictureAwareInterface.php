<?php

declare(strict_types=1);

namespace App\Model\Aware;

use App\Model\MainPictureInterface;

/**
 * Class MainPictureAwareInterface
 * @package App\Model\Aware
 *
 * @author  Clément Magnin <cma.asdoria@gmail.com>
 */
interface MainPictureAwareInterface
{
    /**
     * @return MainPictureInterface|null
     */
    public function getMainPicture(): ?MainPictureInterface;

    /**
     * @param MainPictureInterface|null $mainPicture
     */
    public function setMainPicture(?MainPictureInterface $mainPicture): void;
}
