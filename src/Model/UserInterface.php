<?php

declare(strict_types=1);

namespace App\Model;

use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface as BaseUserInterface;

/**
 * Class UserInterface
 * @package App\Model
 *
 * @author  Clément Magnin <cma.asdoria@gmail.com>
 */
interface UserInterface extends PasswordAuthenticatedUserInterface, BaseUserInterface
{

}
