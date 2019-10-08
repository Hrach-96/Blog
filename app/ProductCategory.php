<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    //
    protected $table = 'product_categorys';
    
    public function GetProductsForCategory()
    {
        return $this->hasMany('App\ProductFromCategory','category_id','id')->orderByRaw('RAND()')->take(8);
    }

}
