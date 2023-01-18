<?php

declare(strict_types=1);

namespace App\Entity\Media;

use App\Traits\ResourceTrait;
use DateTime;
use DateTimeImmutable;
use DateTimeInterface;
use Doctrine\ORM\Mapping as ORM;
use Monofony\Contracts\Core\Model\Media\FileInterface;
use SplFileInfo;
use Sylius\Component\Resource\Model\ResourceInterface;

/**
 * @ORM\MappedSuperclass
 */
abstract class File implements FileInterface, ResourceInterface
{
    use ResourceTrait;

    /** @var SplFileInfo|null */
    protected ?\SplFileInfo $file = null;

    /** @var string|null */
    protected ?string $path = null;

    /** @var DateTimeInterface|DateTimeImmutable */
    protected DateTimeInterface $createdAt;

    /** @var DateTimeInterface|null */
    protected ?DateTimeInterface $updatedAt = null;

    public function __construct()
    {
        $this->createdAt = new DateTimeImmutable();
    }

    /**
     * @return SplFileInfo|null
     */
    public function getFile(): ?SplFileInfo
    {
        return $this->file;
    }

    /**
     * @param SplFileInfo|null $file
     *
     * @return void
     */
    public function setFile(?SplFileInfo $file): void
    {
        $this->file = $file;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($file) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new DateTime('now');
        }
    }

    /**
     * @return string|null
     */
    public function getPath(): ?string
    {
        return $this->path;
    }

    /**
     * @param string|null $path
     *
     * @return void
     */
    public function setPath(?string $path): void
    {
        $this->path = $path;
    }

    /**
     * @return DateTimeInterface
     */
    public function getCreatedAt(): DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTimeInterface $createdAt): void
    {
        $this->createdAt = $createdAt;
    }
}
