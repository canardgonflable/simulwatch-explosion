<?php

declare(strict_types=1);

namespace App\DataTransformer;

use ApiPlatform\Core\DataTransformer\DataTransformerInterface;
use App\Message\AppUserIdAwareInterface;
use Monofony\Contracts\Core\Model\User\AppUserInterface;
use Sylius\Component\User\Model\UserInterface;
use Symfony\Component\Security\Core\Security;

/**
 * Class LoggedInAppUserIdAwareDataTransformer
 * @package App\DataTransformer
 *
 * @author  Clément Magnin <cma.asdoria@gmail.com>
 */
final class LoggedInAppUserIdAwareDataTransformer implements DataTransformerInterface
{
    /**
     * LoggedInAppUserIdAwareDataTransformer constructor.
     *
     * @param Security $security
     */
    public function __construct(
        protected Security $security
    )
    {}

    /**
     * @param        $object
     * @param string $to
     * @param array  $context
     *
     * @psalm-suppress MoreSpecificImplementedParamType
     *
     * @return AppUserIdAwareInterface
     */
    public function transform($object, string $to, array $context = []): AppUserIdAwareInterface
    {
        /** @var AppUserInterface|UserInterface $user */
        $user = $this->security->getUser();

        if (!$user instanceof AppUserInterface) {
            return $object;
        }

        $object->setAppUserId($user->getId());

        return $object;
    }

    /**
     * @param        $data
     * @param string $to
     * @param array  $context
     *
     * @return bool
     */
    public function supportsTransformation($data, string $to, array $context = []): bool
    {
        return is_a($context['input']['class'], AppUserIdAwareInterface::class, true);
    }
}
