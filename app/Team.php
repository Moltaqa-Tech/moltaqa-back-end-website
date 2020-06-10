<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'job_title', 'instagram_url', 'whatsapp_url', 'twitter_url', 'facebook_url', 'image_path', 'status', 'locale'
    ];

    protected $appends = [
        'image_path_val',
   ];

   public function getImagePathValAttribute()
   {
       return asset('uploads/teams/' . $this->image_path);
   }//end of get image path
}
