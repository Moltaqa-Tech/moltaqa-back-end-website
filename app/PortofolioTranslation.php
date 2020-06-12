<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PortofolioTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'title', 'description'
   ];
}
