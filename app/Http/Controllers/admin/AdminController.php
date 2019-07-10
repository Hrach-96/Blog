<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ProductImageGallery;
use App\Product;
use Validator;
use Redirect;
use App\User;
use Session;
use Crypt;
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
    //Add Product
    public function AddProduct()
    {
        return view('admin.product.AddProduct');
    }
    //Nwq Product
    public function NewProduct(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required|numeric',
        ]);
        if ($validator->fails())
        {
            toastr()->error('Something is wrong!');
            return Redirect::back()
                ->withErrors($validator) // send back all errors to the login form
                ->withInput();
        }else{
            $product = new Product();
            $product->name = request('name');
            $product->price = request('price');
            if(request('description')){
                $product->description = request('description');
            }
            if(request('main_image')){
                $product->main_image = parent::fileUpload(request('main_image'),'images/main_images');
            }
            if($product->save()){
                if(request('images_for_gallery')){
                    foreach (request('images_for_gallery') as $image_for_gallery){
                        $ProductImageGallery = new ProductImageGallery();
                        $ProductImageGallery->product_id = $product->id;
                        $ProductImageGallery->image = parent::fileUpload($image_for_gallery,'images/product_gallery');
                        $ProductImageGallery->save();
                    }
                }
                toastr()->Success('Done');
                return Redirect(route('admin.AddProduct'));
            }
        }
        return view('admin.product.AddProduct');
    }


    // edit product
    public function EditProduct($id){
        if($product = Product::find($id)){
            return view('admin.product.EditProduct',compact('product'));
        }
        toastr()->error('Something is wrong!');
        return Redirect::back();
    }

    // update product
    public function UpdateProduct(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'price' => 'required|numeric',
        ]);

        $id = Crypt::decrypt(request('id'));


        if ($validator->fails() || !Product::find($id))
        {
            toastr()->error('Something is wrong!');
            return Redirect::back()
                ->withErrors($validator) // send back all errors to the login form
                ->withInput();
        }else{



            $product = Product::find($id);
            $product->name = request('name');
            $product->price = request('price');
            if(request('description')){
                $product->description = request('description');
            }
            if(request('main_image')){
                unlink('images/main_images/'.$product->main_image);
                $product->main_image = parent::fileUpload(request('main_image'),'images/main_images');
            }
            if($product->save()){
                if(request('images_for_gallery')){
                    foreach (request('images_for_gallery') as $image_for_gallery){
                        $ProductImageGallery = new ProductImageGallery();
                        $ProductImageGallery->product_id = $product->id;
                        $ProductImageGallery->image = parent::fileUpload($image_for_gallery,'images/product_gallery');
                        $ProductImageGallery->save();
                    }
                }
                toastr()->Success('Done');
                return Redirect(route('admin.homepage'));
            }else{
                toastr()->error('Something is wrong!');
            }
        }
        return Redirect('/admin/homepage');
    }

    // delete product
    public function DeleteProduct($id){
        if ($product = Product::find($id)){
            $product->delete();
            toastr()->Success('Done');
        }else{
            toastr()->error('Something is wrong!');
        }
        return Redirect('/admin/homepage');
    }

    // update Gallery image
    public function GalleryUpdate(Request $request){
        if ( $id = Crypt::decrypt(request('id'))){
            if ($Gallery = ProductImageGallery::find($id)){
                $image_for_gallery = request('image_for_gallery');
                unlink('images/product_gallery/'.$Gallery->image);
                $new_image = parent::fileUpload($image_for_gallery,'images/product_gallery');
                $Gallery->image = $new_image;
                $Gallery->save();
                return response(['success' => true,'image' => $new_image]);
            }
        }
        return response(['success' => false]);
    }

    // delete Gallery image
    public function GalleryRemove(Request $request){
        if ( $id = Crypt::decrypt(request('id'))){
            if ($Gallery = ProductImageGallery::find($id)){
                $Gallery->delete();
                return response(['success' => true]);
            }
        }
        return response(['success' => false]);
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
        $AllProduct = Product::all();
        return view('admin.admin.homepage',compact(['AllProduct']));
    }
}
