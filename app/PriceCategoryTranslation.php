<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PriceCategoryTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name',
   ];
}
