<?php

namespace App;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use Translatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'url', 'image_path', 'satisfied', 'status',
    ];

    public $translatedAttributes = [
        'comment'
    ];

    protected $appends = [
        'image_path_val',
    ];

    public function getImagePathValAttribute()
    {
        return asset('uploads/reviews/' . $this->image_path);
    } //end of get image path
}
