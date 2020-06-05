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
        'name', 'job_title', 'instagram_url', 'whatsapp_url', 'twitter_url', 'facebook_url', 'image_path', 'status'
    ];
}
