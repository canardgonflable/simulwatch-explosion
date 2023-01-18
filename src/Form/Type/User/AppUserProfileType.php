<?php

declare(strict_types=1);

namespace App\Form\Type\User;

use App\Entity\User\AppUser;
use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Class AppUserProfileType
 * @package App\Form\Type\User
 *
 * @author  Clément Magnin <cma.asdoria@gmail.com>
 */
class AppUserProfileType extends AbstractResourceType
{
    public function __construct()
    {
        parent::__construct(AppUser::class, ['sylius']);
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     *
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('username', TextType::class, [
                'label' => 'sylius.form.app_user.username',
            ]);
    }

    public function getBlockPrefix(): string
    {
        return 'sylius_app_user_profile';
    }
}
