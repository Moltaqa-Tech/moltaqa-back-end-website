<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;

class PortofolioCategory extends Model
{
    use Translatable;
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'status',
    ];

    public $translatedAttributes = ['name'];
}
