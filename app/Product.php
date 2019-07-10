<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $table = 'product';

    public function GalleryImages()
    {
        return $this->hasMany('App\ProductImageGallery','product_id','id');
    }
}
