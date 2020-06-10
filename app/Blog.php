<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'brief_description', 'description', 'status', 'image_path', 'views_count', 'locale'
    ];

    protected $appends = [
        'image_path_val',
   ];

   public function getImagePathValAttribute()
   {
       return asset('uploads/blogs/' . $this->image_path);
   }//end of get image path

}
