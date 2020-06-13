<?php

namespace App;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
    use Translatable;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'phone', 'status', 'main_contact', 'locale'
    ];

    public $translatedAttributes = [
        'title', 'description', 'location',
    ];
}
