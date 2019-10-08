<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class UserController extends Controller
{
    //
    public function Home(Request $request){
        $random_products = Product::orderByRaw("RAND()")->limit(12)->get();
        $products = Product::paginate(8);
        if ($request->ajax()) {
            if (!is_null(request('new'))){
                return view('user.product.seemore_new_product', compact('random_products'));
            }else{
                return view('user.product.seemore', compact('products'));
            }
        }
    	return view('user.home',compact('random_products','products'));
    }
}
