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

    protected $appends = [
        'image_path_val',
   ];

   public function getImagePathValAttribute()
   {
       return asset('uploads/portofolios/' . $this->image_path);
   }//end of get image path
}
