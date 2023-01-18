<?php

declare(strict_types=1);

namespace App\Form\Extension;

use Sylius\Bundle\CustomerBundle\Form\Type\CustomerProfileType;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class CustomerProfileTypeExtension
 * @package App\Form\Extension
 *
 * @author  Clément Magnin <cma.asdoria@gmail.com>
 */
class CustomerProfileTypeExtension extends AbstractTypeExtension
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     *
     * @return void
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstName', TextType::class, [
                'required' => false,
            ])
            ->add('lastName', TextType::class, [
                'required' => false,
            ]);
    }

    /**
     * @param OptionsResolver $resolver
     *
     * @return void
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'validation_groups' => ['sylius']
        ]);
    }

    /**
     * @return iterable
     */
    public static function getExtendedTypes(): iterable
    {
        return [CustomerProfileType::class];
    }
}
