<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BlogTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'title', 'brief_description', 'description',
   ];
}
