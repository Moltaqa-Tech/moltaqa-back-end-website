<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'desc', 'image_path', 'status', 'work_flow', 'locale'
    ];

    protected $appends = [
         'image_path_val',
    ];

    public function getImagePathValAttribute()
    {
        return asset('uploads/services/' . $this->image_path);
    }//end of get image path
}
