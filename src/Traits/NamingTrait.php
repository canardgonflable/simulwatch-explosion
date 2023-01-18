<?php

declare(strict_types=1);

namespace App\Traits;

use Doctrine\ORM\Mapping\Column;

/**
 * Trait NamingTrait
 * @package App\Traits
 *
 * @author  Clément Magnin <cma.asdoria@gmail.com>
 */
trait NamingTrait
{
    #[Column(type: 'string', nullable: true)]
    protected ?string $name = null;

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     *
     * @return void
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }
}
