<?php namespace Vdomah\Gallery\Models;

use Model;

/**
 * Model
 */
class Gallery extends Model
{
    use \October\Rain\Database\Traits\Validation;

    /*
     * Validation
     */
    public $rules = [
    ];

    /*
     * Disable timestamps by default.
     * Remove this line if timestamps are defined in the database table.
     */
    public $timestamps = false;

    /**
     * @var string The database table used by the model.
     */
    public $table = 'vdomah_gallery_galleries';
    public $implement = ['@RainLab.Translate.Behaviors.TranslatableModel'];
    public $translatable = [
        'name',
    ];

    public $belongsTo = [
        'type' => [
            'Vdomah\Gallery\Models\GalleryType',
        ],
    ];

    public $attachMany = [
        'images' => [
            'System\Models\File',
        ],
    ];

    public $hasOne = [
        'cover' => [
            'System\Models\File',
        ],
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
}