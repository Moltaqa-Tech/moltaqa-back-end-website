<?php

namespace App;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use Translatable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'image_path', 'status', 'work_flow', 'locale'
    ];

    public $translatedAttributes = ['title', 'desc'];

    protected $appends = [
         'image_path_val',
    ];

    public function getImagePathValAttribute()
    {
        return asset('uploads/services/' . $this->image_path);
    }//end of get image path
}
