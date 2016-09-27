<?php namespace Vdomah\Gallery;

use Backend;
use Event;
use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function registerComponents()
    {
        return [
            'Vdomah\Gallery\Components\Galleries' => 'galleries',
            'Vdomah\Gallery\Components\Gallery' => 'gallery',
        ];
    }

    public function registerSettings()
    {
    }

    public function boot()
    {
        Event::listen('backend.menu.extendItems', function($manager) {
            $manager->addSideMenuItems('Vdomah.Gallery', 'gallery', [
                'galleries' => [
                    'label'       => 'Galleries',
                    'icon'        => 'icon-th',
                    'code'        => 'galleries',
                    'owner'       => 'Vdomah.Gallery',
                    'url'         => Backend::url('vdomah/gallery/galleries'),
                    'order'       => 400
                ],
                'gallerytypes' => [
                    'label'       => 'Gallery Types',
                    'icon'        => 'icon-th',
                    'code'        => 'gallerytypes',
                    'owner'       => 'Vdomah.Gallery',
                    'url'         => Backend::url('vdomah/gallery/gallerytypes'),
                    'order'       => 400
                ],
            ]);
        });
    }
}
