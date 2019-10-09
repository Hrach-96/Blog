<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductKgPrice extends Model
{
    //
    protected $table = 'product_kg_price';
    public function GetProductAdditionalInfo()
    {
        return $this->belongsTo('App\Product','product_id');
    }
}
