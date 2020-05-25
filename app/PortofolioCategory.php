<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PortofolioCategory extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'status'
    ];
}
