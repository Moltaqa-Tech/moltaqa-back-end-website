<?php

namespace App;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use Translatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status', 'image_path', 'views_count', 'locale'
    ];


    public $translatedAttributes = [
        'title', 'brief_description', 'description',
    ];

    protected $appends = [
        'image_path_val',
   ];

   public function getImagePathValAttribute()
   {
       return asset('uploads/blogs/' . $this->image_path);
   }//end of get image path

}
