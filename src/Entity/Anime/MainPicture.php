<?php

declare(strict_types=1);

namespace App\Entity\Anime;

use App\Entity\Media\File;
use App\Model\MainPictureInterface;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Class MainPicture
 * @package App\Entity\Anime
 *
 * @author  Clément Magnin <cma.asdoria@gmail.com>
 */
class MainPicture extends File implements MainPictureInterface
{
    /**
     * @Vich\UploadableField(mapping="main_picture", fileNameProperty="path")
     */
    #[\Symfony\Component\Validator\Constraints\File(maxSize: '6000000', mimeTypes: ['image/*'])]
    protected ?\SplFileInfo $file = null;
}
