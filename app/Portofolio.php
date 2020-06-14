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
        'status',
    ];

    public $translatedAttributes = ['title', 'description'];

    public function images()
    {
        return $this->hasMany('App\PortofolioImage');
    }// end of images

    // public function category()
    // {
    //     return $this->belongsTo('App\PortofolioCategory');
    // }// end of category

    public function categories()
    {
        return $this->belongsToMany('App\PortofolioCategory', 'porto_category', 'porotofolio_id', 'category_id');
    }// end of categories
}
