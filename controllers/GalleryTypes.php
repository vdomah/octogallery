<?php namespace Vdomah\Gallery\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class GalleryTypes extends Controller
{
    public $implement = ['Backend\Behaviors\ListController','Backend\Behaviors\FormController',];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';
    public $reorderConfig = 'config_reorder.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Vdomah.Gallery', 'gallery', 'gallerytypes');
    }
}