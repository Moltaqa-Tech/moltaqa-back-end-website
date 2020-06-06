<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Builder;

class Portofolio extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id', 'title', 'description', 'status'
    ];

    public function images()
    {
        return $this->hasMany('App\PortofolioImage');
    }// end of images

    public function category()
    {
        return $this->belongsTo('App\PortofolioCategory');
    }// end of category
}
