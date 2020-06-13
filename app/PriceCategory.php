<?php

namespace App;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class PriceCategory extends Model
{
    use Translatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'price', 'saved_price', 'price_type', 'status', 'locale'
    ];

    public $translatedAttributes = [
        'name'
    ];

    public function attrs()
    {
        return $this->belongsToMany("App\PriceAttr", 'attr_category', 'category_id' , 'attr_id')
                            ->withPivot(["active", "status"]);
    }

    public function activeAttrs()
    {
        return $this->belongsToMany("App\PriceAttr", 'attr_category', 'category_id' , 'attr_id')
                            ->where("status", 1)
                            ->withPivot(["active", "status"]);
    }
}
