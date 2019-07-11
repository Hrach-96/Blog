<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class UserController extends Controller
{
    //
    public function Home(Request $request){
        $newest_products = Product::orderBy('id','DESC')->paginate(8);
        $products = Product::paginate(8);
        if ($request->ajax()) {
            if (!is_null(request('new'))){
                return view('user.product.seemore_new_product', compact('newest_products'));
            }else{
                return view('user.product.seemore', compact('products'));
            }
        }
    	return view('user.home',compact('newest_products','products'));
    }
}
