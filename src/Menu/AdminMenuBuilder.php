<?php

declare(strict_types=1);

namespace App\Menu;

use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;
use Monofony\Component\Admin\Menu\AdminMenuBuilderInterface;

/**
 * Class AdminMenuBuilder
 * @package App\Menu
 *
 * @author  Clément Magnin <cma.asdoria@gmail.com>
 */
class AdminMenuBuilder implements AdminMenuBuilderInterface
{
    /**
     * AdminMenuBuilder constructor.
     *
     * @param FactoryInterface $factory
     */
    public function __construct(
        protected FactoryInterface $factory
    ) {}

    /**
     * @param array $options
     *
     * @return ItemInterface
     */
    public function createMenu(array $options): ItemInterface
    {
        $menu = $this->factory->createItem('root');

        $this->addAnimeSubMenu($menu);
        $this->addAppUserSubMenu($menu);
        $this->addConfigurationSubMenu($menu);

        return $menu;
    }


    /**
     * @param ItemInterface $menu
     *
     * @return void
     */
    private function addConfigurationSubMenu(ItemInterface $menu): void
    {
        $configuration = $menu
            ->addChild('configuration')
            ->setLabel('sylius.ui.configuration');

        $configuration->addChild('backend_admin_user', ['route' => 'sylius_backend_admin_user_index'])
            ->setLabel('sylius.ui.admin_users')
            ->setLabelAttribute('icon', 'lock');
    }

    /**
     * @param ItemInterface $menu
     *
     * @return void
     */
    private function addAnimeSubMenu(ItemInterface $menu): void
    {
        $anime = $menu
            ->addChild('anime')
            ->setLabel('sylius.ui.menu.anime');

        $anime->addChild('backend_anime', ['route' => 'sylius_backend_anime_index'])
            ->setLabel('sylius.ui.animes')
            ->setLabelAttribute('icon', 'tv');

        $anime->addChild('backend_studio', ['route' => 'sylius_backend_studio_index'])
            ->setLabel('sylius.ui.studios')
            ->setLabelAttribute('icon', 'building');

        $anime->addChild('backend_genre', ['route' => 'sylius_backend_genre_index'])
            ->setLabel('sylius.ui.genres')
            ->setLabelAttribute('icon', 'cubes');
    }

    /**
     * @param ItemInterface $menu
     *
     * @return void
     */
    private function addAppUserSubMenu(ItemInterface $menu): void{
        $appUser = $menu
            ->addChild('app_user')
            ->setLabel('sylius.ui.app_user');

        $appUser->addChild('backend_app_user', ['route' => 'sylius_backend_app_user_index'])
            ->setLabel('sylius.ui.app_users')
            ->setLabelAttribute('icon', 'users');
    }
}
