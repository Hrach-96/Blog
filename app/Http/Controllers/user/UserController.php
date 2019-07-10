<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class UserController extends Controller
{
    //
    public function Home(Request $request){
        $newest_products = Product::orderBy('id','DESC')->limit(8)->get();
        $products = Product::paginate(8);
        if ($request->ajax()) {

            return view('user.product.seemore', compact('products'));
        }
    	return view('user.home',compact('newest_products','products'));
    }
}
