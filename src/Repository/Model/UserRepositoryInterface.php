<?php

declare(strict_types=1);

namespace App\Repository\Model;

use Symfony\Component\Security\Core\User\PasswordUpgraderInterface;

/**
 * Class UserRepositoryInterface
 * @package App\Repository\Model
 *
 * @author  Clément Magnin <cma.asdoria@gmail.com>
 */
interface UserRepositoryInterface extends PasswordUpgraderInterface
{

}
