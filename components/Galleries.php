<?php namespace Vdomah\Gallery\Components;

use Cms\Classes\ComponentBase;
use Vdomah\Gallery\Models\Gallery as GalleryModel;
use Vdomah\Gallery\Models\GalleryType as GalleryTypeModel;
use Lang;

class Galleries extends ComponentBase
{
    public $galleries;

    public function componentDetails()
    {
        return [
            'name'        => 'vdomah.gallery::lang.components.galleries.name',
            'description' => 'vdomah.gallery::lang.components.galleries.description'
        ];
    }

    public function defineProperties()
    {
        return [
            'type' => [
                'title'       => 'vdomah.gallery::lang.components.type',
                'description' => 'vdomah.gallery::lang.components.type_description',
                'type'        => 'dropdown',
                'default'     => '0',
            ],
        ];
    }

    public function getTypeOptions()
    {
        return GalleryTypeModel::lists('name', 'id');
    }

    public function prepareVars()
    {
        $query = GalleryModel::active();

        if ($this->property('type') > 0) {
            $query = $query->where('type_id', $this->property('type'));
        }

        $this->galleries = $this->page['galleries'] = $query->get();
    }

    public function onRun()
    {
        $this->prepareVars();
    }
}