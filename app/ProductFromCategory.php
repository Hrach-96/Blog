<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductFromCategory extends Model
{
    //
    protected $table = 'product_from_category';

    public function GetProductInfo()
    {
        return $this->belongsTo('App\Product','product_id');
    }
}
