<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;

class UserController extends Controller
{
    //
    public function Home(){
        $newest_products = Product::orderBy('id','DESC')->limit(8)->get();
    	return view('user.home',compact('newest_products'));
    }
}
