<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'comment', 'url', 'image_path', 'satisfied', 'status',
    ];

    protected $appends = [
        'image_path_val',
    ];

    public function getImagePathValAttribute()
    {
        return asset('uploads/reviews/' . $this->image_path);
    } //end of get image path
}
