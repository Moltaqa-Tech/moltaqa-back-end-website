<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PriceCategory extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'price', 'saved_price', 'price_type', 'status', 'locale'
    ];

    public function attrs()
    {
        return $this->belongsToMany("App\PriceAttr", 'attr_category', 'category_id' , 'attr_id')
                            ->withPivot("active");
    }
}
