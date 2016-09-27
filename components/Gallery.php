<?php namespace Vdomah\Gallery\Components;

use Cms\Classes\ComponentBase;
use Vdomah\Gallery\Models\Gallery as GalleryModel;
use Lang;
use System\Models\File as FileModel;

class Gallery extends ComponentBase
{
    public $gallery;

    public $images = [];

    public function componentDetails()
    {
        return [
            'name'        => 'vdomah.gallery::lang.components.gallery.name',
            'description' => 'vdomah.gallery::lang.components.gallery.description'
        ];
    }

    public function defineProperties()
    {
        return [
            'slug' => [
                'title'       => 'rainlab.blog::lang.settings.post_slug',
                'description' => 'rainlab.blog::lang.settings.post_slug_description',
                'default'     => '{{ :slug }}',
                'type'        => 'string'
            ],
        ];
    }

    public function prepareVars()
    {
        $this->gallery = $this->page['gallery'] = GalleryModel::active()->where('slug', $this->property('slug'))->first();
        if ($this->gallery)
        $this->images = $this->page['images'] = FileModel::where('attachment_type', 'Vdomah\Gallery\Models\Gallery')
            ->where('attachment_id', $this->gallery->id)
            ->where('is_public', 1)
            ->orderBy('sort_order')
            ->paginate(10)
        ;
        //dd($this->images);
    }

    public function onRun()
    {
        $this->prepareVars();
    }

    public function onUpdatePicData()
    {
        $attrs = post('attrs');
        $file = FileModel::find(post('image_id'));
        foreach ($attrs as $attr=>$val) {
            $file->$attr = $val;
        }
        $file->save();

        if (\App::getLocale() == 'en') {
            $out = [
                'title' => $attrs['title'],
                'description' => $attrs['description'],
            ];
        } else {
            $out = [
                'title_uk' => $attrs['title_uk'],
                'description_uk' => $attrs['description_uk'],
            ];
        }

        return $out;
    }
}