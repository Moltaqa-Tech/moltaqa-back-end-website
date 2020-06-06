<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Support extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'description', 'location', 'email', 'phone', 'status', 'main_contact'
    ];
}
