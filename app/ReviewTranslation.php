<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReviewTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'comment',
   ];
}
