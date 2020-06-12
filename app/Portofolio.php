<?php

namespace App;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    use Translatable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id', 'status',
    ];

    public $translatedAttributes = ['title', 'description'];

    public function images()
    {
        return $this->hasMany('App\PortofolioImage');
    }// end of images

    public function category()
    {
        return $this->belongsTo('App\PortofolioCategory');
    }// end of category
}
