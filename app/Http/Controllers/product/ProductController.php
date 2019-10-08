<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ProductFromCategory;
use App\Product;

class ProductController extends Controller
{
    //
    public function productinfo(Request $request){
        $productInfo = Product::find(request('id'));
        return view('user.product.productinfo',compact('productInfo'));
    }
    //
    public function productfromcategory(Request $request){
        $products = ProductFromCategory::where('category_id',request('id'))->get();
        return view('user.product.productfromcategory',compact('products'));
    }
}
