<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PortofolioImage extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'portofolio_id', 'image_path'
    ];
}
