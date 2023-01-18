<?php

declare(strict_types=1);

namespace App\Entity\User;

use App\Entity\Media\File;
use App\Model\AdminAvatarInterface;
use SplFileInfo;

/**
 * Class AdminAvatar
 * @package App\Entity\User
 *
 * @author  Clément Magnin <cma.asdoria@gmail.com>
 */
class AdminAvatar extends File implements AdminAvatarInterface
{
    /**
     * @var SplFileInfo|null
     */
    #[\Symfony\Component\Validator\Constraints\File(maxSize: '6000000', mimeTypes: ['image/*'])]
    protected ?SplFileInfo $file = null;
}
