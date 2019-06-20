<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Redirect;
use App\User;
use Session;
use Hash;

class AdminController extends Controller
{
    //
    public function login(){
    	return view('admin.login');
    }
    // Admin Login Check
    public function LoginAdmin(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|max:255',
            'password' => 'required|min:6',

        ]);
        if ($validator->fails())
        {
            toastr()->error('Something is wrong!');
            return Redirect::back()
                ->withErrors($validator) // send back all errors to the login form
                ->withInput();
        }else{
            $check = $this->checkLogin(request('email'),request('password'));
            if ($check){
                return Redirect('/admin/homepage');
            }
            else{
                return Redirect::back();
            }
        }

    }
    //logout
    public function logout()
    {
        Session::forget('userData');
        return Redirect('/admin/OUi2WZVgIzsSNwjGuilKkXb1TI5L');
    }
//    Check Admin
    public function checkLogin($email,$password){
        $user = User::where(['email' => $email])->first();
        if(!empty($user)){
            if(Hash::check($password, $user->password) ){
                Session::put('userData', $user);
                return true;
            }
            toastr()->error('Password is wrong!');
            return false;
        }
        toastr()->error('Email is wrong!');
        return false;
    }
//    Admin Homepage
    public function Homepage(){
        return view('admin.admin.homepage');
    }
}
